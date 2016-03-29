<?php
/* Smarty version 3.1.29, created on 2016-03-16 00:21:43
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e87ce72f9aa7_61213990',
  'file_dependency' => 
  array (
    '40572a989ed667770b1c81ae2207aefd3be5c66c' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/header.tpl',
      1 => 1458076900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e87ce72f9aa7_61213990 ($_smarty_tpl) {
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
	<title>Загловок</title>
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
        <div class="menu">
            <div class="menu-container">
                <label for="avatarInput"  alt="" class="menu-avatar" style="background-image: url(www/images/avatars/<?php echo $_smarty_tpl->tpl_vars['infoUs']->value['avatars'];?>
)">
                 <div class="menu-avat-edit" id="avatrs"></div>
                </label>
                <h3 class="user-name">#<?php echo $_smarty_tpl->tpl_vars['infoUs']->value['ID'];?>
</h3>
                <div id="errorNick"></div>
                <h3 class="menu-name"></h3>
                <ul class="ul-menu">
                    <div class="errors" id="errorNick"></div>
                    <a href="?controller=admin&action=index"><li class="profile index">Управление</li></a>
		    <a href="inftable-m"><li>Пользователи</li></a>
                    <a href="?controller=admin&action=settings"><li class="profile settings">Настройки</li></a>
                </ul>
                <button class="quit" onclick="exitAccount()">Выход</button>
            </div>
        </div>
    </div><?php }
}
