<?php
/* Smarty version 3.1.29, created on 2016-03-27 20:01:15
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/index/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f811dbb2e1f7_56489504',
  'file_dependency' => 
  array (
    '7922a691b969aa970d6a8d7962252dda88ac69b4' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/index/header.tpl',
      1 => 1459098046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f811dbb2e1f7_56489504 ($_smarty_tpl) {
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
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
css/index-style.css" />
</head>
<body>
    <nav class="top-nav">
        <div class="container">
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="?service=shop" target="_blank">Магазин</a></li>
                <li><a href="#">Помощь</a></li>
                <li><a href="#">Гарантии</a></li>
                <li><a href="#">О нас</a></li>
            </ul>
            <a class="register-link" href="?controller=Register&action=index">Вход | Регистрация</a>
        </div>
    </nav><?php }
}
