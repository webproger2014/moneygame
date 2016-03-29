<?php

require 'models/shop/CategoryModel.php';

//Проверка, вошёл ли пользователь в аккаунт
function infoAccountAction($smarty, $function) {
   //Загружаем страницу
    $function($smarty); 
}


//Возвращаем товары категории
function retProductsAction() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    $data['products'] = getProductsById($id);
    
    if (!$data['products']) {
        $data['success']  = 0;
        $data['messages'] = 'В каталоге нет товаров';
    }
    
    echo json_encode($data);
}