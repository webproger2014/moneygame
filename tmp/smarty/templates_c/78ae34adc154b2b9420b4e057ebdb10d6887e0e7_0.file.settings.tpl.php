<?php
/* Smarty version 3.1.29, created on 2016-03-16 01:02:23
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/settings.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e8866f5de346_08803628',
  'file_dependency' => 
  array (
    '78ae34adc154b2b9420b4e057ebdb10d6887e0e7' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/settings.tpl',
      1 => 1458079342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e8866f5de346_08803628 ($_smarty_tpl) {
?>
  <div class="main">
        <nav class="top-nav"></nav>
        <section class="caption-section">
            <p>В этом разделе Вы можете изменить данные своего профиля</p>
        </section>
        <section>
            <h1 class="section-name">Настройки</h1>
            <h3 class="setting-name">E-mail: <span onclick="createInputEmail(this)"><?php echo $_smarty_tpl->tpl_vars['infoUs']->value['email'];?>
</span><div class="errors" id="errorEmail"></div></h3>
            <h3 class="setting-name">Пароль: <span onclick="createInputPsw(this)"> **********</span><div class="errors" id="errorPsw"></h3>
	</section>
 </div>
<?php }
}
