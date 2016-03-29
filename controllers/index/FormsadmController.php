<?php
require 'models/index/FormsadmModel.php';

//Проверка, вошёл ли пользователь в аккаунт
function infoAccountAction($smarty, $function) {
   $hash = getHashAdmin();
    if ($hash) {
        $infoUser = getInfoUser($hash);
        if ($infoUser) {
            //Отправляем на страницу админ профиль
            adminindexAction();     
        } else {
            //Загружаем страницу
            $function($smarty, $infoUser);           
        }
    } else {
        //Загружаем страницу
        $function($smarty, $infoUser);
    }
}

//Загрузка страницы входа
function indexAction($smarty) {
    loadTemplate($smarty, 'admin/login');
}

//Загрузка главной страниц админ профиль
function adminindexAction() {
    header('Location: ?controller=admin&action=index');
}
