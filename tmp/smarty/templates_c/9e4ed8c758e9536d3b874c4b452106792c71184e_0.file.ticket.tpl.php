<?php
/* Smarty version 3.1.29, created on 2016-03-13 23:45:55
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/unBanned/ticket.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e5d183366711_18537204',
  'file_dependency' => 
  array (
    '9e4ed8c758e9536d3b874c4b452106792c71184e' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/unBanned/ticket.tpl',
      1 => 1457901952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e5d183366711_18537204 ($_smarty_tpl) {
?>
  <div class="main">
        <nav class="top-nav"></nav>     
        <section class="caption-section">
            <p>В этом разделе Вы можете связаться с нами</p>
        </section>
        <section>
            <h1 class="section-name">Создание тикета</h1>   
         <h3 class="ticket-text">Ваше сообщение:<br><textarea name="" id="ticket"></textarea></h3>
            <button class="send-ticket">Отправить тикет</button>
        </section>
    </div>
    
    
   <div class="modal-background ticket" id="background">
        <div class="modal-container ticket-modal-container" id="modal">
            <p>Тикет отправлен. Ожидайте ответ на Ваш E-mail в ближайшее время.</p>
                <ul class="modal-buttons ticket">
                    <li><a href="#">Ок</a></li>
                </ul>
	           <a href="#" class="modal-close ticket">Close</a>
	</div>
    </div>
<?php }
}
