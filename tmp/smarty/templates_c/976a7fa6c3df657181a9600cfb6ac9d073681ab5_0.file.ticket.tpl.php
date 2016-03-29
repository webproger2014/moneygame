<?php
/* Smarty version 3.1.29, created on 2016-03-15 19:18:28
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/banned/ticket.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e835d4dff740_11860639',
  'file_dependency' => 
  array (
    '976a7fa6c3df657181a9600cfb6ac9d073681ab5' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/banned/ticket.tpl',
      1 => 1458058707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e835d4dff740_11860639 ($_smarty_tpl) {
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
