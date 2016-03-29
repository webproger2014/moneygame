<?php
/* Smarty version 3.1.29, created on 2016-03-03 15:52:16
  from "C:\wamp\www\moneygame.mizapro.net\views\default\user\Banned\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56d84fa0c1e380_15475829',
  'file_dependency' => 
  array (
    'b43de2d373fdfef3e7e7045fde248997a2480918' => 
    array (
      0 => 'C:\\wamp\\www\\moneygame.mizapro.net\\views\\default\\user\\Banned\\header.tpl',
      1 => 1457015262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d84fa0c1e380_15475829 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Профиль</title>
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/reset.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/fonts.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/main.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/media.css" />
</head>
<body>
<div class="menu-tab">
        <button class="toggle_mnu">
            <span class="sandwich">
	            <span class="sw-topper"></span>
	            <span class="sw-bottom"></span>
	            <span class="sw-footer"></span>
            </span>
        </button>
        <div class="menu" style="width: 300px;">
            <div class="menu-container">
                <label for="avatarInput" id="avatar-img" alt="" class="menu-avatar" style="background-image: url(../avatars/)">
                    <div class="menu-avatar-edit" ></div>
                </label>
                
                <form  id="avatarForm" method="POST" enctype="multipart/form-data">
                    <input id="avatarInput" style="display: none;" class="register" type="file" name="AVATAR_REG" onchange="readTextFile(this)">
					<!--<input type="submit">-->
                </form>
                <h3 class="menu-name" onclick="textarea(this)"></h3>
                <ul class="ul-menu">
				<div class="errors" id="nickReg"></div>
                    <a href="#"><li class="active">Профиль</li></a>
                    <a href=""><li>Игроки</li></a>
                    <a href=""><li>Магазин</li></a>
                    <a href="settings"><li>Настройки</li></a>
                    <a href="tickets"><li>Тикеты</li></a>
                </ul>
<button class="quit" onclick="exitAccount()">Выход</button>
            </div>
        </div>
    </div><?php }
}
