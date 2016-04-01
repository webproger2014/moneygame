
//> Подписываемся на события
//Показ товаров
$('.genre li a').click(function () {
   var id = $(this).attr('genre_id');
   $.ajax({
       type: "POST",
       async: true,
       url: '?service=shop&controller=Ajax&action=retProducts&id=' + id,
       dataType: 'json',
       success: function (data) {
            if (data['success'] == 0) {
                $('.content').html(data['messages']);
            } else {
                showProducts(data['products']);
            }
        }
    });   
});

//Показ подкатегорий
$('.categories li a').click(function () {
   var li = $(this).parent(),
       ul = $(li).children('.subcategories');
   
   if ($(ul).html() != '') {
       ul.slideToggle(100);
   }
});

//Показ жанров
 $('.subcategories li a').click(function () {
   var li = $(this).parent(),
       ul = $(li).children('ul'); 
       
       if ($(ul).children('li').text() != '') {
           $(ul).slideToggle(100);
       }      
}); 

//>Для меню поиска
//Поиск товара
$("div.search > input[type=text]").keyup(function () {
    var msg  = $(this).val();
        
       if (msg != '') {
           $.ajax({
            type: "POST",
            async: true,
            url: '?service=shop&controller=product&action=search&msg=' + msg,
            dataType: 'json',
            success: function (data) {
             if (data['success'] == 1) {
                 showProducts(data['products']);
             } else {
                 $('.content').html(data['messages']);  
             }
            }
           });    
        }
});
//<
//Добавить в корзину
function addProduct(self, id) {
   $.ajax({
       type: "POST",
       async: true,
       url: '?service=shop&controller=Cart&action=setProduct&id=' + id,
       dataType: 'json',
       success: function (data) {
          var price = $('.product_' + id + ' .price').text(),
              summa = parseFloat($('#summa').text()) + parseFloat(price),
              len = parseInt($('#lenproducts').text());
          
          //> Подсчитываем количество товаров в корзине
          len++;
          $('#lenproducts').text(len);
          //<    
          if ($('#summa')) {
              $('#summa').text(summa);
          }   
           
          $(self).css('display', 'none');
          $('.removeproduct_' + id).css('display', 'block');
        }
    }); 
}

//Удалить из корзины
 function removProduct(self, id) {
   $.ajax({
       type: "POST",
       async: true,
       url: '?service=shop&controller=Cart&action=removProduct&id=' + id,
       dataType: 'json',
       success: function (data) {
          var price = $('.product_' + id + ' .price').text(),
              summa = parseFloat($('#summa').text()) - parseFloat(price),
              len = parseInt($('#lenproducts').text());
              
              //> Подсчитываем количество товаров в корзине
              len--;
              $('#lenproducts').text(len);
              //<
  
          if ($('#summa')) {
              $('#summa').text(summa);
          }
          
          $(self).css('display', 'none');
          $('.addproduct_' + id).css('display', 'block');
        }
    }); 
}
//<

function showProducts(products) {
   //Отчищаем контент    
   $('.content').html('');
   for (var s = 0; s < products.length; s++) {
       var id = products[s]['id'],
           images = products[s]['images'],
           price = products[s]['price'],
           name = products[s]['name'],
           index = products[s]['id'],
           cat = products[s]['category_id'];
   
       $('.content').append("<div class='product' id='"+id+"'>");
       $('#' + id).append("<img width='250' src='www/images/product/"+images+"'>");
       $('#' + id).append('<p>Цена: '+ price + '</p>');
       $('#' + id).append('<p>Название: '+ name + '</p>');
       $('#' + id).append('<p>ID: '+ index + '</p>');
       var href = '?service=shop&controller=product&action=pageProduct&cat='+cat+'&id='+id;
       $('#' + id).append("<a href='" + href +"' target='_blank'>Подробнее</a>");
   }
}
