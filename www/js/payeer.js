
var payeerclass = '';
$(document).ready(function () {
   $.ajax({
       type: "POST",
       async: true,
       url: "?controller=payeer&action=getobjpayeer",
       success: function (data) {
         payeerclass = data;
       }    
   });
});
