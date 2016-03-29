//Выводит ошибки при проверке инпутов
function getError(data, id) {
    $(id).html(data['messages']);
}

 //> Бан user аккаунтов
    //>Вешаем обработчики событий на input
          $('.ban input').click(function () {
              if (this.checked == true) {
                  alert('Аккаунт забанен');
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
                         console.log('Не судьба');
                         hideInfoUser();
                      }
                  }
              });
          });
     //<
     
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

//>functions panels administrations
 //>methods in forms create account
 //Проверка email
 $('.item-name.email input').keyup(function () {
        $.ajax({
            type: "POST",
            async: true,
            url: '?controller=admin&action=checkEmailAdm',
            data: {email: this.value},
            dataType: 'json',
            success: function (data) {
                getError(data, '#errorEmail');
            }      
    });
 });
 
 
$('.create-account').click(function () {
   var email = $('.item-name.email input').val(),
       psw   = $('.item-name.password input').val(),
       levels = $('.item-name.levels input')[0].checked; 
  if (levels == true) {
      levels = 1; //Адмиинистратор
   } else {
      levels = 2;//Модератор
   }
   
    $.ajax({
      type: "POST",
      async: true,
      url: '?controller=admin&action=accountCreate',
      data: {email: email, psw: psw, lvl: levels},
      dataType: 'json',
      success: function (data) {            
                if (data['success'] == 0) {
                    getError(data, '#errorEmail');
                }
                
                if (data['success'] == 1) {
                    alert('Аккаунт создан, дальше надо оформить всё красиво!\n\
                           Вывод success и ошибок');
                }
      }      
    });   
});

//Инпут для удаления аккаунта адм/мод
 $('.item-name.delAccount input').keyup(function () {
    $.ajax({
      type: "POST",
      async: true,
      url: '?controller=admin&action=getInfoAccount',
      data: {email: this.value},
      dataType: 'json',
      success: function (data) { 
          getError(data, '#emailDel');
        if (data['success'] == 0) { 
            $('.striped.contenttable-del').css('display', 'none');
        }
                
        if (data['success'] == 1) {
          showAccount(data['infous'][0]);
        }
      }      
    });      
 });
 
//Показывает пользователя для удаления
function showAccount(data) {
     $('.del-account.ids').text(data['ID']);
     $('.del-account.avatars img').attr('src', 'www/images/avatars/' + data['avatars']);
     $('.del-account.email').text(data['email']);
     $('.del-account.dateReg').text(data['dateReg']);
     if (data['levels'] == 1) {
         $('.del-account.rang a').text('Понизить');
         $('.del-account.rang a').unbind('click');
         $('.del-account.rang a').click(function () {
             runkMod(this);
         });
     } else {
         $('.del-account.rang a').text('Повысить');
         $('.del-account.rang a').unbind('click');
         $('.del-account.rang a').click(function () {
             runkAdmin(this);
         });
     }  
     $('.striped.contenttable-del').css('display', 'table');
 }
 
 
 //<
 
 
 //> Манипуляция аккаунтам
//Удаление выбраного аккаунта
$('.table-accounts td:nth-child(6) a').click(function () {
   var td = $(this).parent(), id, imgs, email;
   
   id    = $(td).siblings(':nth-child(1)').html();
   imgs  = $(td).siblings(':nth-child(2)').html();
   email = $(td).siblings(':nth-child(3)').html();

   //Передаём данные об аккаунте в таблицу модалки
   $('.del-account-modal.ids').html(id); 
   $('.del-account-modal.avatars').html(imgs);
   $('.del-account-modal.email').html(email);
   //Отображение модалки
   $('div.modal-background.del').addClass('is-visible');
});

//> Отмена удаления аккаунта
$('.modal-close').click(function () {
   $('div.modal-background').removeClass('is-visible');
});

$('.modal-buttons li:nth-child(2) a').click(function () {
   $('div.modal-background').removeClass('is-visible');
});
//Подтверждаеи удаление
$('.modal-buttons li:nth-child(1) a').click(function () {
    var id = $('.del-account-modal.ids').html(); 
    delAccount(id);
    $('div.modal-background').removeClass('is-visible');
    $('.striped.contenttable-del').css('display', 'none');
});
//<
function delAccount(id) {
    $.ajax({
      type: "POST",
      async: true,
      url: '?controller=admin&action=delAccount',
      data: {id: id},
      dataType: 'json',
      success: function (data) {  
        if (data['success'] == 1) {
          $('#' + id).remove();
        }
      }      
    });
}

//> Повышение ранга до администратора
$('.table-accounts.mod td:nth-child(5) a').click(function () {
    runkAdmin(this);
});

function runkAdmin(self) {
   var td = $(self).parent(), id, imgs, email;
   
   id    = $(td).siblings(':nth-child(1)').html();
   imgs  = $(td).siblings(':nth-child(2)').html();
   email = $(td).siblings(':nth-child(3)').html();

   //Передаём данные об аккаунте в таблицу модалки
   $('.runkmod-account-modal.ids').html(id); 
   $('.runkmod-account-modal.avatars').html(imgs);
   $('.runkmod-account-modal.email').html(email);
   //Отображение модалки
   $('div.modal-background.rung-adm').addClass('is-visible');    
}
//Подтверждаем повышение ранга
$('.modal-buttons.runk-adm li:nth-child(1) a').click(function () {
    var id = $('.runkmod-account-modal.ids').html();
     setRunkAdm(id);
    $('div.modal-background.rung-adm').removeClass('is-visible');
});

function setRunkAdm(id) {
    $.ajax({
      type: "POST",
      async: true,
      url: '?controller=admin&action=setRunkAdm',
      data: {id: id},
      dataType: 'json',
      success: function (data) {  
        if (data['success'] == 1) {
          console.log('Данномму аккаунту присвоен ранг адинистратора')
        }
      }      
    });
}
//<

 //> Понижение ранга до модератора
$('.table-accounts.admin td:nth-child(5) a').click(function () {
    runkMod(this);
});

function runkMod(self) {
   var td = $(self).parent(), id, imgs, email;
   
   id    = $(td).siblings(':nth-child(1)').html();
   imgs  = $(td).siblings(':nth-child(2)').html();
   email = $(td).siblings(':nth-child(3)').html();

   //Передаём данные об аккаунте в таблицу модалки
   $('.runkadm-account-modal.ids').html(id); 
   $('.runkadm-account-modal.avatars').html(imgs);
   $('.runkadm-account-modal.email').html(email);
   //Отображение модалки
   $('div.modal-background.rung-mod').addClass('is-visible');    
}
//Подтверждаем понижение ранга
$('.modal-buttons.runk-mod li:nth-child(1) a').click(function () {
    var id = $('.runkadm-account-modal.ids').html();
     setRunkMod(id);
    $('div.modal-background.rung-mod').removeClass('is-visible');
});

function setRunkMod(id) {
    $.ajax({
      type: "POST",
      async: true,
      url: '?controller=admin&action=setRunkMod',
      data: {id: id},
      dataType: 'json',
      success: function (data) {  
        if (data['success'] == 1) {
          console.log('Данномму аккаунту присвоен ранг модератора');
        }
      }      
    });
}
//<
//<
//<


//Функции страницыы настройки 


function createInputEmail(self) {
        var input = $(self).find('input')[0];
        if (!input) {
            var email = $(self).text();
            
            $(self).text('');
            $(self).append("<input id='email' type='text'>");
            
            $('#email').focus();
            $('#email').val(email);      
            $('#email').keyup(function (eventObject) {
             //Отправляем ajax  на проверку email
              var valInput = $('#email').val();
              if (valInput == '' || (valInput == email)) {
                $('#errorEmail').text('');
              } else {
                   //Отслеживаем enter
                  if (eventObject.which == 13) {
                      settingsEmail('?controller=admin&action=setEmailAdm', self)
                  } else {
                      settingsEmail('?controller=admin&action=checkEmailAdm', self);
                  }
              }              
         });
         
         //Удаляем инпут
          $('#email').blur(function () {
            var valInput = $('#email').val();
            if (valInput == '' || (valInput == email)) {
               $(self).text(email);
            } else {
              //Отправляем ajax на сохранение
              settingsEmail('?controller=admin&action=setEmailAdm', self);
            }              
          });
       }
    }
    
     //Проверка/сохранение email
    function settingsEmail(href, self) {
        var email = $('#email').val();
        $.ajax({
            type: "POST",
            async: true,
            url: href,
            data: {email: email},
            dataType: 'json',
            success: function (data) {
                getError(data, '#errorEmail');
                if (data['save'] == 1) {
                  $(self).text(email);
                }
            }      
       });
   } 
   
   function createInputPsw(self) {
        var input = $(self).find('input')[0];
        if (!input) {
            var psw = $(self).text();
            
            $(self).text('');
            $(self).append("<input id='psw' type='text'>");
            
            $('#psw').focus();
            $('#psw').val(psw);      
            $('#psw').keyup(function (eventObject) {
             //Отправляем ajax  на проверку email
              var valInput = $('#psw').val();
              if (valInput == '' || (valInput == psw)) {
                $('#errorPsw').text('');
              } else {
                   //Отслеживаем enter
                  if (eventObject.which == 13) {
                      settingsPsw('?controller=admin&action=setPswAdm', self)
                  } 
              }              
         });
         
         //Удаляем инпут
          $('#psw').blur(function () {
            var valInput = $('#psw').val();
            if (valInput == '' || (valInput == psw)) {
               $(self).text(psw);
            } else {
              //Отправляем ajax на сохранение
              settingsPsw('?controller=admin&action=setPswAdm', self);
            }              
          });
       }
    }
    
    //Проверка/сохранение пароля
    function settingsPsw(href, self) {
        var psw = $('#psw').val();
        $.ajax({
            type: "POST",
            async: true,
            url: href,
            data: {psw: psw},
            dataType: 'json',
            success: function (data) {
                getError(data, '#errorPsw');
                console.log(data);
                if (data['save'] == 1) {
                  $(self).text(psw);
                }
            }      
       });        
    }