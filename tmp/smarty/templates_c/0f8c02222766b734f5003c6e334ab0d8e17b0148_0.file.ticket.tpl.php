<?php
/* Smarty version 3.1.29, created on 2016-03-08 20:13:07
  from "C:\wamp\www\moneygame.mizapro.net\views\default\user\unBanned\ticket.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56df2443c7ab53_02695148',
  'file_dependency' => 
  array (
    '0f8c02222766b734f5003c6e334ab0d8e17b0148' => 
    array (
      0 => 'C:\\wamp\\www\\moneygame.mizapro.net\\views\\default\\user\\unBanned\\ticket.tpl',
      1 => 1457464274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56df2443c7ab53_02695148 ($_smarty_tpl) {
?>
     
<section class="caption-section">
            <p>В этом разделе Вы можете связаться с нами</p>
        </section>
        <section>
            <h1 class="section-name">Создание тикета</h1>   
         <h3 class="ticket-text">Ваше сообщение:<br><textarea name="" id="ticket"></textarea></h3>
            <button class="send-ticket">Отправить тикет</button>
        </section>
    </div>
    
    
    <div class="modal-background" id="background">
        <div class="modal-container ticket-modal-container" id="modal">
            <p>Тикет отправлен. Ожидайте ответ на Ваш E-mail в ближайшее время.</p>
                <ul class="modal-buttons">
                    <li><a href="#">Ок</a></li>
                </ul>
	           <a href="#" class="modal-close">Close</a>
	</div>
    </div>
<?php }
}
