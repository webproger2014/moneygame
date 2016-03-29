<?php
/* Smarty version 3.1.29, created on 2016-03-09 15:27:33
  from "C:\wamp\www\moneygame.mizapro.net\views\default\admin\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e032d5ec9bf4_02384777',
  'file_dependency' => 
  array (
    '06e3073aa79691b567db19efcaf79c07bc86ecf2' => 
    array (
      0 => 'C:\\wamp\\www\\moneygame.mizapro.net\\views\\default\\admin\\header.tpl',
      1 => 1457532768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e032d5ec9bf4_02384777 ($_smarty_tpl) {
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
                <label for="avatarInput"  alt="" class="menu-avatar" style="background-image: url(images/avatars/<?php echo $_smarty_tpl->tpl_vars['infoUs']->value['avatars'];?>
)">
                 <div class="menu-avat-edit" id="avatrs"></div>
                </label>
                <h3 class="menu-name"></h3>
                <ul class="ul-menu">
                    <div class="errors" id="errorNick"></div>
                    <a href="hom-m"><li class="active">Управление</li></a>
		    <a href="inftable-m"><li>Пользователи</li></a>
                    <a href="settings-m"><li>Настройки</li></a>
                </ul>
                <button class="quit" onclick="exitAccount()">Выход</button>
            </div>
        </div>
    </div>
    
    <div class="main">
        <nav class="top-nav"></nav>
        <section class="caption-section">
            <p>В этом разделе вы можете банить игроков</p>
        </section>
        <section>
            <h1 class="section-name">Управление</h1>
            <h3 class="item-name steam"><p>SteamId:</p><input type="text" placeholder="STEAM_0:1:100125515"><div class="errors"id="errorSteam"></div></h3>
	    <h3 class="item-name ban"><label for="ban-toggle">Бан<input id="ban-toggle"  class="toggle-input" type="checkbox"><span class="toggle"></span></label></h3>
            <div class="ban-items" style="display: none;">
            <h3 class="item-name author"><p>Забанил:</p><span class="ban-author">adm #112</span></h3>
	    <h3 class="item-name cause-banned" ><p>Причина бана:</p><input type="text"></h3>
            <h3 class="item-name unbanned"><p>Окончание бана:</p><input type="text" placeholder="1970-12-31 00:00:00"><div class="errors"id="errorSteam"></div></h3>
            </div>
        </section>
    </div><?php }
}
