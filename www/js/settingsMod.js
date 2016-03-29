//Выводит ошибки при проверке инпутов
function getError(data, id) {
    $(id).html(data['messages']);
}

 //> Бан user аккаунтов
    //>Вешаем обработчики событий на input
          $('.ban input').click(function () {
              if (this.checked == false) {
                  checkValBanned();
              }
              
             /* if (this.checked == true) {
                  alert('Аккаунт разбанен');
              }*/
          });
          
          //Возвращаем данные о пользователе
          $('.steam input').keyup(function () {
              $.ajax({
                  type: "POST",
                  async: true,
                  url: '?controller=admin&action=infoUser',
                  data: {steam: this.value},
                  dataType: 'json',
                  success: function (data) {
                      getError(data, '#errorSteam');
                      if (data['success'] == 1) {
                         //Отображаем данные о пользователе
                         showInfoUser(data['infoUs']);
                      }
                      
                      if (data['success'] == 0) {
                         //Скрываем данные
                         hideInfoUser();
                      }
                  }
              });
          });
     //<
     
     //Проверяем инпуты
     function checkValBanned() {
         var steam = $('.item-name.steam input').val(),
             cause = $('.item-name.cause-banned input').val(),
             date = $('.item-name.unbanned input').val();
         
         //Разбаниваем аккаунт
         if (steam != '' && cause == '' && date == '') {
             unbannedUser(steam);
         } 
        
        //Отправляем на бан
        if (steam != '' && cause != '' && date != '') {
             bannedUser(steam, cause, date);
        } 
     }
     
     function unbannedUser(steam) {
        $.ajax({
            type: "POST",
            async: true,
            url: '?controller=admin&action=unbannedUser',
            data: {steam: steam},
            dataType: 'json',
            success: function (data) {
                getError(data, '#error');
                l(data);
                if (data['success'] == 1) {
                    hideInfoUser();
                }
                      
                if (data['success'] == 0) {
                 //Вывод ошибки
                }
            }
        });         
     }

     function bannedUser(steam, cause, date) {
        $.ajax({
            type: "POST",
            async: true,
            url: '?controller=admin&action=bannedUser',
            data: {'steam': steam, 'cause': cause, 'date': date},
            dataType: 'json',
            success: function (data) {
                getError(data, '#error');
                l(data);
                if (data['success'] == 1) {
                    hideInfoUser();
                }
                      
                if (data['success'] == 0) {
                 //Вывод ошибки
                }
            }
        });         
     }

     function showInfoUser(data) {
         //Отображаем данные если заблокирован
         if (data['ban'] == 1) {
          $('.ban-author').html(data['whoBanned']);
          $('.cause-banned input').val(data['causeBan']);
          $('.unbanned input').val(data['exitBanDateTime']);
         }
         
         //Отчищаем инпуты если не заблокирован
         if (data['ban'] == 0) {
          $('.ban-author').html('');
          $('.cause-banned input').val('');
          $('.unbanned input').val('');          
         }
        
        $('.ban input')[0].checked = true;
        $('.ban-items').show(200);
     }
     
     function hideInfoUser() {
         //Отчищаем инпуты
          $('.ban-author').html('');
          $('.cause-banned input').val('');
          $('.unbanned input').val('');          
         
          $('.ban input')[0].checked = false;
          $('.ban-items').hide(100);
     }
   //<


    function exitAccount() {
       $.ajax({
        type: "GET",
        async: true,
        url: "?controller=admin&action=exitAccount",
        success: function () {
            location.href = '?controller=FormsAdm&action=login';
        }
       });    
    }
    
    //Загрузка файла ajax avatars
    uploadFile({
        action: '?controller=Admin&action=updateAvatars', //Отправка параметра
        id: 'avatrs', //ID блока загрузки файла
        type: 'json', //по умолчанию string
        onSuccess: function(data) {
        getError(data, '#errorNick');
            if (data['success'] == 1) {
                //Меняем аватарку
                $('.menu-avatar').css({
                    'background-image': 'url(www/images/avatars/' + data['namefile'] +'?'+ Math.random() + ')'
                });
            }
        }
});
