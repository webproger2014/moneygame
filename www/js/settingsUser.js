//> Cоздание инпутов для изменение настроек пользователя
    function createInputSteam(self) {
        var input = $(self).find('input')[0];
        if (!input) {
            var steam = $(self).text();
            
            $(self).text('');
            $(self).append("<input id='steam' type='text'>");
            
            $('#steam').focus();
            $('#steam').val(steam);      
            $('#steam').keyup(function (eventObject) {
             //Отправляем ajax  на проверку steam
              var valInput = $('#steam').val();
              if (valInput == '' || (valInput == steam)) {
                $('#errorSteam').text('');
              } else {
                   //Отслеживаем enter
                  if (eventObject.which == 13) {
                      settingsSteam('?controller=User&action=setSteam', self)
                  } else {
                      settingsSteam('?controller=User&action=checkSteam', self);
                  }
              }              
         });
         
         //Удаляем инпут
          $('#steam').blur(function () {
            var valInput = $('#steam').val();
            if (valInput == '' || (valInput == steam)) {
               $(self).text(steam);
            } else {
              //Отправляем ajax на сохранение
              settingsSteam('?controller=User&action=setSteam', self);
            }              
          });
       }
    }
    
    //Проверка/сохранение steam_id
    function settingsSteam(href, self) {
        var steam = $('#steam').val();
        $.ajax({
            type: "POST",
            async: true,
            url: href,
            data: {steam: steam},
            dataType: 'json',
            success: function (data) {
                getError(data, '#errorSteam');
                if (data['save'] == 1) {
                  $(self).text(steam);
                }
            }      
       });        
    }
    
    
    
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
                      settingsEmail('?controller=User&action=setEmail', self)
                  } else {
                      settingsEmail('?controller=User&action=checkEmail', self);
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
              settingsEmail('?controller=User&action=setEmail', self);
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
                      settingsPsw('?controller=User&action=setPsw', self)
                  } else {
                      settingsPsw('?controller=User&action=checkPsw', self);
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
              settingsPsw('?controller=User&action=setPsw', self);
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
                if (data['save'] == 1) {
                  $(self).text(psw);
                }
            }      
       });        
    }
    
    function createInputNick(self) {
        var input = $(self).find('input')[0];
        if (!input) {
            var nick = $(self).text();
            
            $(self).text('');
            $(self).append("<input id='nick' type='text'>");
            
            $('#nick').focus();
            $('#nick').val(nick);      
            $('#nick').keyup(function (eventObject) {
             //Отправляем ajax  на проверку email
              var valInput = $('#nick').val();
              if (valInput == '' || (valInput == nick)) {
                $('#errorNick').text('');
              } else {
                   //Отслеживаем enter
                  if (eventObject.which == 13) {
                      settingsNick('?controller=User&action=setNick', self);
                  } else {
                      settingsNick('?controller=User&action=checkNick', self);
                  }
              }              
         });
         
         //Удаляем инпут
          $('#nick').blur(function () {
            var valInput = $('#nick').val();
            if (valInput == '' || (valInput == nick)) {
               $(self).text(nick);
            } else {
              //Отправляем ajax на сохранение
              settingsNick('?controller=User&action=setNick', self);
            }              
          });
       }
    }
    
    //Проверка/сохранение nickname
    function settingsNick(href, self) {
        var nick = $('#nick').val();
        $.ajax({
            type: "POST",
            async: true,
            url: href,
            data: {nick: nick},
            dataType: 'json',
            success: function (data) {
                getError(data, '#errorNick');
                if (data['save'] == 1) {
                  $(self).text(nick);
                }
            }      
       });        
    }    
//<

//Выводит ошибки при проверке инпутов
function getError(data, id) {
    $(id).html(data['messages']);
}

//Выход из аккаунта
function exitAccount() {
   $.ajax({
       type: "GET",
       async: true,
       url: "?controller=User&action=exitAccount",
       success: function () {
            location.href = '?controller=index&action=index';
       }  
   });    
}

 //Загрузка файла ajax
   uploadFile({
    action: '?controller=User&action=updateAvatars', //Отправка параметра
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
    }});


//> Вешаем события на удаление аккаунты
$('.delete-account').click(function() {
    $('div.modal-background.del').addClass('is-visible');
});

    //> Отмена удаления аккаунта
    $('.modal-close.del').click(function () {
        $('div.modal-background.del').removeClass('is-visible');
    });

    $('.modal-buttons li:nth-child(2) a').click(function () {
        $('div.modal-background.del').removeClass('is-visible');
    });
    //<
    
    //Удаление аккаунта
    $('.modal-buttons.del li:nth-child(1) a').click(function () {
       $.ajax({
        type: "GET",
        async: true,
        url: "?controller=User&action=delAccount",
        success: function () {
            location.href = '?controller=index&action=index';
       }  
   });  
    });
//<
