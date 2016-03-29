<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>{$title}</title>
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="{$teplateWebPath}libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="{$teplateWebPath}libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="{$teplateWebPath}css/reset.css" />
	<link rel="stylesheet" href="{$teplateWebPath}css/fonts.css" />
	<link rel="stylesheet" href="{$teplateWebPath}css/index-style.css" />
</head>
<body>
    <nav class="top-nav">
        <div class="container">
            <ul>
                <li><a href="?service=shop">Товары</a></li>
                <li><a href="#">Помощь</a></li>
                <li><a href="#">Гарантии</a></li>
                <li><a href="#">О нас</a></li>
            </ul>
            <a href="?service=shop&controller=cart&action=showProduct" class="cart"><img width="25" src="{$teplateWebPath}css/icons/cart.png" alt="">
             {$lenproducts}
            </a>
            <a class="register-link" href="?controller=Register&action=index">Вход | Регистрация</a>
        </div>
    </nav>