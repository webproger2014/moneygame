<?php
/* Smarty version 3.1.29, created on 2016-03-15 19:18:02
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/banned/settings.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e835bad93fe6_09729138',
  'file_dependency' => 
  array (
    '5197f0992103de086986b969e987b7525e2a9473' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/banned/settings.tpl',
      1 => 1457900811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e835bad93fe6_09729138 ($_smarty_tpl) {
?>
  <div class="main">
        <nav class="top-nav"></nav>
        <section class="blocked-user-section">
         <p>Ваш Аккаунт заблокирован!<?php echo $_smarty_tpl->tpl_vars['infoUs']->value['startBanDateTime'];?>
 - <?php echo $_smarty_tpl->tpl_vars['infoUs']->value['exitBanDateTime'];?>
| Причина:<?php echo $_smarty_tpl->tpl_vars['infoUs']->value['causeBan'];?>
</p>
        </section>           
        <section class="caption-section">
            <p>В этом разделе Вы можете изменить данные своего профиля</p>
        </section>
        <section>
            <h1 class="section-name">Настройки</h1>
            <h3 class="setting-name">SteamId:<span><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['STEAM_ID'];?>
</span><div class="errors"id="errorSteam"></div></h3>
            <h3 class="setting-name">E-mail:<span><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['email'];?>
</span><div class="errors" id="emailReg"></div></h3>
            <h3 class="setting-name">Ник: <span><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['NICK_NAME'];?>
</span><div class="errors" id="nickReg"></div></h3>
            <h3 class="setting-name">Пароль: <span>**********</span><div class="errors" id="errorPSW"></h3>
            <h3 class="setting-name">Payeer: <span><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['payeer'];?>
</span> (<a href="https://payeer.com/?partner=1390786" class="payeer-link" target="_blank">регистрация payeer</a>): <span></span><div class="errors" id="errorPayeer"></div></h3>
			<button class="delete-account">Удалить аккаунт</button>
		</section>
    </div>
	
	<div class="modal-background del" id="background">
		<div class="modal-container" id="modal">
			<p>Вы действительно хотите удалить аккаунт?</p>
			<ul class="modal-buttons">
				<li><a href="#" onclick="delAccount()">Да</a></li>
				<li><a href="#">Отмена</a></li>
			</ul>
			<a href="#" class="modal-close">Close</a>
		</div>
	</div>

<?php }
}
