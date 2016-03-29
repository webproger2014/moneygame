<?php
/* Smarty version 3.1.29, created on 2016-03-23 20:31:30
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/index/repairacc.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f2d2f2a33678_67969000',
  'file_dependency' => 
  array (
    'e756ee6dbcfb7044c9defbe448b3422bea148ae9' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/index/repairacc.tpl',
      1 => 1458754289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f2d2f2a33678_67969000 ($_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Восстановление пароля</title>
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
        <div class="form-head">Восстановление пароля</div>
        <h2 id="key">Забыли пароль?</h2>
       
		
		<div class="submit-mistakes">
		</div>		
		<div>
		</div> 
            <div id="email" >
                 <input class="register" type="text" name="KEY" placeholder="Проверочный код">
                 <input type="submit" id="regButton" value='Подтвердить'>
		    </div>
        
             <h3>Введите e-mail от Вашего аккаунта</h3>
            <input class="register" type="text" " placeholder="E-mail">
            <div class="autorise-status">
               <i class="fa fa-check-square-o fa-lg"></i>
               <i class="fa fa-minus-square-o fa-lg"></i>
            </div>
            <div class="errors" id="emailReg"></div>
            <input type="button" id="reRegButton" value='Отправить код' onclick="keyEmailRepairLogin()">
        <p id="sss" class="sendCodeAgain">Отправить код повторно</p>

    </div>

<?php }
}
