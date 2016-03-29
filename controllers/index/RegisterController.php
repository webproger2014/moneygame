<?php
 /**
  * 
  * @param object $smarty
  * prefix 'get' in function == AjaxModel
  */

 require 'models/index/RegisterModel.php';
 require 'models/index/UserModel.php';
 require 'models/index/AjaxModel.php';

 
  //Проверка, вошёл ли пользователь в аккаунт
function infoAccountAction($smarty, $function) {
    $hash = getHashUser(); 
    if ($hash) {
        $infoUser = getInfoUser($hash);
        if ($infoUser) {
            //Загружаем страницу пользователя
            header("Location: ?controller=User&action=index");                 
        } else {
            //Загружаем страницу
            $function($smarty);                  
        }
    } else {
        //Загружаем страницу
        $function($smarty); 
    }    
}
 
 function indexAction($smarty) {
     loadTemplate($smarty, 'index/register');
 }
 
function repairAction($smarty) {
     loadTemplate($smarty, 'index/repairacc');
 }
 
 //Регистрация нового пользователя
 function regNewUserAction(){
     $data = ['messages' => ''];
     $infoUs = [];
     
     $infoUs['steam']  = isset($_POST['steam']) ? trim($_POST['steam']) : null;
     $infoUs['psw']  = isset($_POST['psw']) ? trim($_POST['psw']) : null;
     $infoUs['psw1']   = isset($_POST['psw1']) ? trim($_POST['psw1']) : null;
     $infoUs['email']  = isset($_POST['email']) ? trim($_POST['email']) : null;
     $infoUs['nick']   = isset($_POST['nick']) ? trim($_POST['nick']) : null;
     $infoUs['payeer'] = isset($_POST['payeer']) ? trim($_POST['payeer']) : '';
    
   // Фильтруем данные инпутов
    $data = filtersRegFormsAction($data, $infoUs);
    
    echo json_encode($data);   
 }

 //> Проверка POST параметров if inputs forms
 function filtersRegFormsAction($data, $infoUs) {
     if ($infoUs['steam']) {
         $data = filtersSteamRegAction($data, $infoUs['steam']);
     } else {
         $data['success']   = 0;
         $data['messages'] .= '-Заполните поле steam <br />';
     }
     
     if ($infoUs['psw'] && $infoUs['psw1']) {
         $data = filtersPswRegAction($data, $infoUs['psw'], $infoUs['psw1']);
     } else {
         $data['success']   = 0;
         $data['messages'] .= '-Заполните поле пароль <br />';
     }

     if ($infoUs['email']) {
         $data = filtersEmailRegAction($data, $infoUs['email']);
     } else {
         $data['success']   = 0;
         $data['messages'] .= '-Заполните поле email <br />';
     }

     if ($infoUs['nick']) {
         $data = filtersNickRegAction($data, $infoUs['nick']);
     } else {
         $data['success']   = 0;
         $data['messages'] .= '-Заполните поле ник <br />';
     }
     
     //Если !success значит ошибок нету
     if (!isset($data['success'])) {
         successAction($infoUs);
         $data['success'] = 1;
     }
   return $data;    
 }
  
 //Проверяем steam на корректность и существование
 function filtersSteamRegAction($data, $steam) {
     if (validSteam($steam)) {
         if (getSteam($steam)) {
             $data['success'] = 0;
             $data['messages'] .= '-Даный steam уже используется<br />';
         }
     } else {
         $data['success'] = 0;
         $data['messages'] .= '-Не коректно введенны данные steam_id<br />';
     }
     
     return $data;
 }
 
 //Проверяем пароль на надёжность
 function filtersPswRegAction($data, $psw, $psw1) {
     if (strlen($psw) > 4) {
         if ($psw != $psw1) {
           $data['success'] = 0;
           $data['messages'] .= '-Пароли не совпадают<br />';           
         }
     } else {
         $data['success'] = 0;
         $data['messages'] .= '-Пароль не менее 5 символов<br />';         
     }
     
     return $data;
 }
 
 //Проверка email на корректность и сущестовование в БД
 function filtersEmailRegAction($data, $email) {
     if (filterEmail($email)) {
         if (getEmail($email)) {
             $data['success'] = 0;
             $data['messages'] .= '-Данный email уже используется<br />'; 
         }
     } else {
        $data['success'] = 0;
        $data['messages'] .= '-Не корректный email<br />';          
     }     
     return $data;
 }
 
 //Проверка ника на корректность и сущестование в бд
 function filtersNickRegAction($data, $nick) {
     if (filterNick($nick)) {
         if (getNick($nick)) {
             $data['success'] = 0;
             $data['messages'] .= '-Данный ник уже используется<br />'; 
         }
     } else {
        $data['success'] = 0;
        $data['messages'] .= '-Не корректный ник<br />';          
     }     
     return $data;     
 }
//<
 
  //Создаёт нового пользователя
 function successAction($infoUs){
    $infoUs['hash'] = generateHash(30);
    $infoUs['psw']  = md5(md5($infoUs['psw']));
    setcookie('userhash', $infoUs['hash'], time() + 3600 * 72, '/');
    createAccount($infoUs);
 }
