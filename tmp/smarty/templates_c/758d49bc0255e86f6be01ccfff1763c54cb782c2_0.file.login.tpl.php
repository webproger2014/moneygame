<?php
/* Smarty version 3.1.29, created on 2016-03-11 14:33:59
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e2ad273c4e94_22166496',
  'file_dependency' => 
  array (
    '758d49bc0255e86f6be01ccfff1763c54cb782c2' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/login.tpl',
      1 => 1457696034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e2ad273c4e94_22166496 ($_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Вход | Админ</title>
        <meta name="description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
libs/font-awesome-4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/reset.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/fonts.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/register-style.css">
    </head>
<body>
    <div class="container">
        <div class="form-head">Вход</div>
        <h2>Здравствуйте!</h2>
        <h3>Пожалуйста, войдите в аккаунт</h3>
	
        <div id="error"></div>
           <input class="register" type="text" placeholder="emal" nmaxlength="30">
            <div class="autorise-status">
                <i class="fa fa-check-square-o fa-lg"></i>
                <i class="fa fa-minus-square-o fa-lg"></i>
             </div>
              <div class="errors" id="errorEmail"></div>
              
           <input class="autorise autorise-password"  type="password" placeholder="Пароль">
           <div class="autorise-status">
                <i class="fa fa-check-square-o fa-lg"></i>
                <i class="fa fa-minus-square-o fa-lg"></i>
           </div>
		   <input type="button" value='Войти'>
        <p id="forgetPassword"><a href="#" target="_blank">Восстановление пароля</a></p>                   
           </div>
    	
	<?php echo '<script'; ?>
 src="www/js/jquery-2.2.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="www/js/formsadm.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
