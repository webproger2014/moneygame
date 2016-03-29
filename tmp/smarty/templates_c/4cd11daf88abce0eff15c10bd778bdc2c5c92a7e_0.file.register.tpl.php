<?php
/* Smarty version 3.1.29, created on 2016-03-11 13:37:40
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/index/register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e29ff4943630_43354881',
  'file_dependency' => 
  array (
    '4cd11daf88abce0eff15c10bd778bdc2c5c92a7e' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/index/register.tpl',
      1 => 1457692659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e29ff4943630_43354881 ($_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Вход | Регистрация</title>
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
        <h3>Пожалуйста, войдите или зарегистрируйтесь</h3>
	
        <div id="error"></div>
		<!--Для вывода ошибок при отправки submit-->
		<div class="submit-mistakes">
		</div> 
        <form  id="formsReg" action="" method="POST">


           <!-- форма входда -->
           <input class="autorise autorise-steamid" type="text" placeholder="STEAM_0:1:100125515"  onKeyUp="validLoginSteamId(this, '#errorSteam')"  id="steamid" name="STEAMID_LOGIN">
           <div class="autorise-status">
                <i class="fa fa-check-square-o fa-lg"></i>
                <i class="fa fa-minus-square-o fa-lg"></i>
           </div>
		   <div class="errors"id="errorSteam"></div>

           <input class="autorise autorise-password"  onKeyUp="" type="password" placeholder="Пароль" id="psw" name="PSW_LOGIN">
           <div class="autorise-status">
                <i class="fa fa-check-square-o fa-lg"></i>
                <i class="fa fa-minus-square-o fa-lg"></i>
           </div>
		   <div class="errors" id="errorPSW"></div>

          <!-- форма регистрации -->
           <div id="registerBlock" style="display:none">
               <input class="register" type="hidden" id="reg" name="">
               <div class="autorise-status">
                    <i class="fa fa-check-square-o fa-lg"></i>
                    <i class="fa fa-minus-square-o fa-lg"></i>
               </div>

                <input class="register" type="password"  onKeyUp="validPswRegYes()" id="YesPswReg" placeholder="Подтвердите пароль" name="YESPWS_REG">
               <div class="autorise-status">
                    <i class="fa fa-check-square-o fa-lg"></i>
                    <i class="fa fa-minus-square-o fa-lg"></i>
               </div>
               <div class="errors" id="errorYESPSW"></div>
               
                <input class="register" type="value" onKeyUp="validEmailReg(this, '#emailReg')"  placeholder="E-mail" name="EMAIL_REG" id="email">
                <div class="autorise-status">
                    <i class="fa fa-check-square-o fa-lg"></i>
                    <i class="fa fa-minus-square-o fa-lg"></i>
                </div>
                <div class="errors" id="emailReg"></div>
                
                <input class="register" type="value" onKeyUp="validNickReg(this, '#nickReg')"  placeholder="Ник" placeholder="Ник" name="NICK_REG" maxlength="30" id="nick">
                <div class="autorise-status">
                    <i class="fa fa-check-square-o fa-lg"></i>
                    <i class="fa fa-minus-square-o fa-lg"></i>
                </div>
                <div class="errors" id="nickReg"></div>
                
                <a href="https://payeer.com/?partner=1390786" class="payeer-link" target="_blank">Регистрация payeer</a>
                <input class="register" type="value" onKeyUp="validPayeer(this)"  placeholder="Payeer" name="PAYEER_REG" id="payeer">
                <div class="autorise-status">
                    <i class="fa fa-check-square-o fa-lg"></i>
                    <i class="fa fa-minus-square-o fa-lg"></i>
                </div>
                <div class="errors"id="errorPayeer"></div>

               <!-- <div id="avatar-img" style=""></div>
                <input class="register" type="file" placeholder="Payeer" name="AVATAR_REG" onchange="readTextFile(this)"> -->
           </div>
		   <input type="button" id="regButton" value='Войти' onclick="loginAccount()">
        </form>
        <p id="pReg" onclick="registrationFormDisplay(this)">Регистрация</p>
        <p id="forgetPassword"><a href="" target="_blank">Восстановление пароля</a></p>
    </div>
    	
	<?php echo '<script'; ?>
 src="www/js/jquery-2.2.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="www/js/indexesFunction.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
