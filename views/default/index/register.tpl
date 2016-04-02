<html>
    <head>
        <meta charset="utf-8" />
        <title>Вход | Регистрация</title>
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
                
                <input class="register" type="value" onKeyUp="validNickReg(this, '#nickReg')"  placeholder="Ник"  name="NICK_REG" maxlength="30" id="nick">
                <div class="autorise-status">
                    <i class="fa fa-check-square-o fa-lg"></i>
                    <i class="fa fa-minus-square-o fa-lg"></i>
                </div>
                <div class="errors" id="nickReg"></div>
                
                <a href="https://payeer.com/?partner=1390786" class="payeer-link" target="_blank">Регистрация payeer</a>
                <input class="register" type="value" onKeyUp="validPayeer(this, '#errorPayeer')"  placeholder="Payeer"  id="payeer">
                <div class="autorise-status">
                    <i class="fa fa-check-square-o fa-lg"></i>
                    <i class="fa fa-minus-square-o fa-lg"></i>
                </div>
                <div class="errors" id="errorPayeer"></div>

               <!-- <div id="avatar-img" style=""></div>
                <input class="register" type="file" placeholder="Payeer" name="AVATAR_REG" onchange="readTextFile(this)"> -->
           </div>
		   <input type="button" id="regButton" value='Войти' onclick="loginAccount()">
        </form>
        <p id="pReg" onclick="registrationFormDisplay(this)">Регистрация</p>
        <p id="forgetPassword"><a href="" target="_blank">Восстановление пароля</a></p>
    </div>
    	
	<script src="www/js/jquery-2.2.0.min.js"></script>
	<script src="www/js/indexesFunction.js"></script>
        <script src="www/js/payeer.js"></script>
</body>
</html>