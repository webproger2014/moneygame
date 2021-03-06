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
	<link rel="stylesheet" href="{$teplateWebPath}libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="{$teplateWebPath}libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="{$teplateWebPath}css/reset.css" />
	<link rel="stylesheet" href="{$teplateWebPath}css/fonts.css" />
	<link rel="stylesheet" href="{$teplateWebPath}css/main.css" />
	<link rel="stylesheet" href="{$teplateWebPath}css/media.css" />
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
                <label for="avatarInput"  alt="" class="menu-avatar" style="background-image: url(www/images/avatars/{$infoUs['avatars']})">
                 <div class="menu-avat-edit" id="avatrs"><span class="icon-edit-avatar"></span></div>
                </label>
                <h3 class="user-name">{$infoUs['NICK_NAME']}</h3>
                <div id="errorNick"></div>
                <h3 class="menu-name"></h3>
                <ul class="ul-menu">
                    <a href="?controller=user&action=index"><li class="profile index">Профиль</li></a>
                    <a href="#"><li>Игроки</li></a>
                    <a href="?service=shop"><li>Магазин</li></a>
                    <a href="?controller=user&action=settings"><li class="profile settings">Настройки</li></a>
                    <a href="?controller=user&action=tickets"><li class="profile tickets">Тикеты</li></a>
                </ul>
             <button class="quit" onclick="exitAccount()">Выход</button>
            </div>
        </div>
    </div>