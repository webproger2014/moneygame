<html>
    <head>
        <meta charset="utf-8" />
        <title>Вход | Админ</title>
        <meta name="description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<link rel="stylesheet" href="{$teplateWebPath}libs/font-awesome-4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{$teplateWebPath}css/reset.css">
        <link rel="stylesheet" href="{$teplateWebPath}css/fonts.css">
        <link rel="stylesheet" href="{$teplateWebPath}css/register-style.css">
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
    	
	<script src="www/js/jquery-2.2.0.min.js"></script>
	<script src="www/js/formsadm.js"></script>
</body>
</html>