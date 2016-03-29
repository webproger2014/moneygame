//> Подписываемся на события
    //Проверка ника
    $('input[type=text]').keyup(function () {
        $.ajax({
            type: "POST",
            async: true,
            url: '?controller=Ajax&action=checkEmailAdm',
            data: {email: this.value},
            dataType: 'json',
            success: function (data) {
                getError(data, '#errorEmail');
                if (data['success'] == 1) {
                   console.log(data['messages']);
                }
            }
        });
    });
    
    //Вход в аккаунт
    $('input[type=button]').click(function () {
        var email = $('input[type=text]').val(),
            psw   = $('input[type=password]').val();
        $.ajax({
            type: "POST",
            async: true,
            url: '?controller=Ajax&action=loginAccountAdm',
            data: {email: email, psw: psw},
            dataType: 'json',
            success: function (data) {
                getError(data, '#error');
                if (data['success'] == 1) {
                    location.href = '?controller=admin&action=index';
                }
            }
        });
    });
//<

//Выводит ошибки при проверке инпутов
function getError(data, id) {
    $(id).html(data['messages']);
}
