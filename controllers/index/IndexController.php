<?php

    require 'models/index/IndexModel.php';
    require 'models/index/UserModel.php';
 
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

    function IndexAction($smarty) {
     $smarty -> assign('title', 'Главная');
     $smarty -> assign('statistics', getStatisticsPlayers());
     
     loadTemplate($smarty, 'index/header');
     loadTemplate($smarty, 'index/statistics');
     loadTemplate($smarty, 'index/footer');
 }