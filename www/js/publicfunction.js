//> Тикеты

//Вызываем модалку
$('.send-ticket').click(function () {
       $.ajax({
        type: "POST",
        async: true,
        url: "?controller=User&action=sendTicket",
        data: {'ticket': $('.ticket-text textarea').val()},
        dataType: 'json',
        success: function (data) {
            if (data['success'] == 1) {
              $('.modal-background.ticket').addClass('is-visible');  
            }
       }  
   });
});

//> Отмена 
$('.modal-close.ticket').click(function () {
   $('div.modal-background.ticket').removeClass('is-visible');
});

//Отправка
$('.modal-buttons.ticket li:nth-child(1) a').click(function () {
   $('div.modal-background.ticket').removeClass('is-visible');
});

//<