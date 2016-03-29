

$(window).keyup(function(eventObject){
    if (eventObject.which == 13) {
        loginAccount();
    }
});


//Выводит ошибки при проверке инпутов
function getError(data, id) {
    $(id).html(data['messages']);
}


//Проверка steam_id на корректность 
function validLoginSteamId(self, id) {
   var steam = $(self).val();
   $.ajax({
       type: "GET",
       async: true,
       url: "?controller=Ajax&action=FilterSteamLogin&steam=" + steam,
       dataType: 'json',
       success: function (data) {
           getError(data, id);
       }      
   });
}

//> Функции для проверки инпутов регистрации
// Проверка steam_id на корректнось
function validLoginSteamIdReg(self, id) {
   var steam = $(self).val();
   $.ajax({
       type: "GET",
       async: true,
       url: "?controller=Ajax&action=FilterSteamLoginReg&steam=" + steam,
       dataType: 'json',
       success: function (data) {
           getError(data, id);
       }
       
   });
}

//Проверка пароля
function validPswReg(self, id) {
   var pswLeng = $(self).val().length;
   
    //> Проверяем сложность пароля 
    if (pswLeng == 0) {
        $(id).css({
            border: '0',
            width: '0px'
        });
    }
    
    if (pswLeng > 0 && pswLeng < 5 ) {
        $(id).css({
            border: '2px solid #E32636',
            width: '25%'
        });
    }
    
    if (pswLeng > 4 && pswLeng < 7 ) {
        $(id).css({
            border: '2px solid #FFA500',
            width: '50%'
        });
    }
 
    if (pswLeng > 6 && pswLeng < 9 ) {
        $(id).css({
            border: '2px solid #FFFF00',
            width: '75%'
        });
    }
    
    if (pswLeng > 8 && pswLeng < 13 ) {
        $(id).css({
            border: '2px solid #66BB6A',
            width: '100%'
        });
    }
    //<  
}

//Проверяем совпадение паролей 
function validPswRegYes() {
    var psw = $('#psw').val(),
        yesPsw = $('#YesPswReg').val(),
        blockError = $('#errorYESPSW');
   
    if (psw == yesPsw) {
          blockError.text('');
       } else {
          blockError.text('Пароли не совпадают');
    }
}

//Проверка email на корректность и существование 
function validEmailReg(self, id){
    $.ajax({
       type: "POST",
       async: true,
       url: "?controller=Ajax&action=filterEmailReg",
       data: {email: $(self).val()},
       dataType: 'json',
       success: function (data) {
           getError(data, id);
       }     
   }); 
}

//Проверка ника на корректность и существование 
function validNickReg(self, id) {
    $.ajax({
       type: "POST",
       async: true,
       url: "?controller=Ajax&action=filterNickReg",
       data: {nick: $(self).val()},
       dataType: 'json',
       success: function (data) {
           getError(data, id);
       }     
   });    
}
//<

//Вход в аккаунт
function loginAccount() {
   var steam = $("#steamid").val(),
       psw = $('#psw').val();
   
   $.ajax({
       type: "POST",
       async: true,
       url: "?controller=Ajax&action=loginAccount",
       data: {steam: steam, psw: psw},
       dataType: 'json',
       success: function (data) {
           getError(data, '#error');
           if (data['success']){
               location.href = '?controller=user&action=index'
           } 
       }
       
   });
}

function exitAccount() {
   $.ajax({
       type: "GET",
       async: true,
       url: "?controller=User&action=exitAccount",
       success: function () {
               location.href = '?controller=index&action=index';
       }
       
   })    
}

//Регистрация нового аккаунта
function regNewUser() {
   var formsVal = {
       steam: $('#steamid').val(),
       psw: $('#psw').val(),
       psw1: $('#YesPswReg').val(),
       email: $('#email').val(),
       nick: $('#nick').val(),
       payeer: $('#payeer').val()
   }; 
    
   $.ajax({
       type: "POST",
       async: true,
       url: "?controller=Register&action=regNewUser",
       data: formsVal,
       dataType: 'json',
       success: function (data) {
           getError(data, '#error');
            if (data['success']){
               location.href = '?controller=user&action=index';
           } 
       }
       
   });   
}

//Отображает регистрационную форму
function registrationFormDisplay(){
  var caption = $('#pReg').text();
  
  $('#registerBlock').toggle(300);
  clearinputVal(); //Отчистка инпутов
  clearErors();
  if (caption == 'Регистрация') {
      $('#regButton').val('Зарегистрироваться');
      $('#regButton').attr('onclick', "regNewUser()");
      $('#pReg').text('Вход');
      createInputRegs();
      
      //Отслеживаем Enter для отправки данных
      $(window).keyup(function(eventObject){
        if (eventObject.which === 13) {
            regNewUser();
        }
    });      
  } else {
      $('#regButton').val('Войти');
      $('#regButton').attr('onclick', "loginAccount()");
      $('#pReg').text('Регистрация');
      
      //Отслеживаем Enter для отправки данных
      $(window).keyup(function(eventObject){
        if (eventObject.which === 13) {
            loginAccount();
        }
    });
      //Замена инпутов для входа
      createInputLogin(); 
  }
}

//Замена инпутов для регистрации
function createInputRegs() {
   $('#steamid').attr('onkeyup', "validLoginSteamIdReg(this, '#errorSteam')");
   $('#psw').attr('onkeyup', "validPswReg(this, '#errorPSW')");
}

//Замена инпутов для входа
function createInputLogin() {
    $('#steamid').attr('onkeyup', "validLoginSteamId(this, '#errorSteam')");
    $('#psw').attr('onkeyup', "");
}

//Удаление ошибок
function clearErors() {
    $('#error').text('');
    $('#errorSteam').text('');
    $('#errorPSW').text('');
    $('#errorYESPSW').text('');
    $('#emailReg').text('');
    $('#nickReg').text('');
    $('#errorPayeer').text('');
}

//Отчищаем инпуты
function clearinputVal() {
    $('#steamid').val('');
    $('#psw').val('');
    $('#YesPswReg').val('');
    $('#email').val('');
    $('#nick').val('');
    $('#payeer').val('');
}
