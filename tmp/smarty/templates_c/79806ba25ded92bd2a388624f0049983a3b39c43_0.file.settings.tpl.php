<?php
/* Smarty version 3.1.29, created on 2016-03-15 18:31:04
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/unBanned/settings.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e82ab8ede802_77767482',
  'file_dependency' => 
  array (
    '79806ba25ded92bd2a388624f0049983a3b39c43' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/unBanned/settings.tpl',
      1 => 1458055853,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e82ab8ede802_77767482 ($_smarty_tpl) {
?>
  <div class="main">
        <nav class="top-nav"></nav>     
        <section class="caption-section">
            <p>В этом разделе Вы можете изменить данные своего профиля</p>
        </section>
        <section>
            <h1 class="section-name">Настройки</h1>
            <h3 class="setting-name">SteamId:<span onclick="createInputSteam(this)"><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['STEAM_ID'];?>
</span><div class="errors"id="errorSteam"></div></h3>
            <h3 class="setting-name">E-mail:<span onclick="createInputEmail(this)"><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['email'];?>
</span><div class="errors" id="errorEmail"></div></h3>
            <h3 class="setting-name">Ник: <span onclick="createInputNick(this)"><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['NICK_NAME'];?>
</span><div class="errors" id="errorNick"></div></h3>
            <h3 class="setting-name">Пароль: <span onclick="createInputPsw(this)">**********</span><div class="errors" id="errorPsw"></h3>
            <h3 class="setting-name">Payeer: <span><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['payeer'];?>
</span> (<a href="https://payeer.com/?partner=1390786" class="payeer-link" target="_blank">регистрация payeer</a>): <span></span><div class="errors" id="errorPayeer"></div></h3>
			<button class="delete-account">Удалить аккаунт</button>
		</section>
    </div>
	
	<div class="modal-background del" id="background">
		<div class="modal-container" id="modal">
			<p>Вы действительно хотите удалить аккаунт?</p>
			<ul class="modal-buttons del">
                             <li><a href="#" >Да</a></li>
		             <li><a href="#">Отмена</a></li>
			</ul>
			<a href="#" class="modal-close del">Close</a>
		</div>
	</div>
<?php }
}
