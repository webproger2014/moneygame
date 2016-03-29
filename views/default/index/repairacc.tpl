<html>
    <head>
        <meta charset="utf-8" />
        <title>Восстановление пароля</title>
        <meta name="description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<link rel="stylesheet" href="{$teplateWebPath}libs/font-awesome-4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{$teplateWebPath}css/reset.css">
        <link rel="stylesheet" href="{$teplateWebPath}css/fonts.css">
        <link rel="stylesheet" href="{$teplateWebPath}css/register-style.css">
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

