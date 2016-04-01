<?php

require 'models/index/UserModel.php';
require 'models/shop/ProductModel.php';

//Проверка, вошёл ли пользователь в аккаунт
 function infoAccountAction($smarty, $function) {
    $hash = getHashUser(); 
    if ($hash) {
        $infoUser = getInfoUser($hash);
        if ($infoUser) {
            //Загружаем страницу пользователя
             $function($smarty, $infoUser);          
        } else {
            //Загружаем страницу
            $function($smarty);                    
        }
    } else {
        //Загружаем страницу
        $function($smarty); 
    }    
}

function pageProductAction($smarty, $infoUser = null) {
    $cat = isset($_GET['cat']) ? (int)$_GET['cat'] : 0;
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    $smarty -> assign('product', getProductById($cat, $id));
    if (isset($_SESSION['products'][$id])) {
        $smarty -> assign('itemInCart', $_SESSION['products'][$id]);
    }
    
    //> Количество продуктов в корзине
    $lenproducts = 0 ;
    if (isset($_SESSION['products'])) {
        $lenproducts = count($_SESSION['products']);
    }
    $smarty -> assign('lenproducts', $lenproducts);
    //<
    
    if ($infoUser) {
        $smarty -> assign('infoUs', $infoUser);
        
        loadTemplate($smarty, 'user/header');
        loadTemplate($smarty, 'user/product');
        loadTemplate($smarty, 'user/footer');        
    } else {
        loadTemplate($smarty, 'index/header');
        loadTemplate($smarty, 'index/product');
        loadTemplate($smarty, 'index/footer');        
    }
}

//Поиск товара - фильтрация запроса
function searchAction() {
    $msg = isset($_GET['msg']) ? delCharsStr($_GET['msg']) : '';
    if ($msg) {
        $data = searchProductAction($msg);       
    }
    
    //Если ничего не найдено
    if (!$data['products']) {
        $data['messages'] = 'Поиск не дал результатов';
        $data['success'] = 0;
    } else {
        $data['success'] = 1;
    }
    
    echo json_encode($data);
}

//Поиска товара
function searchProductAction($msg) {
    $data['products'] = getProductByChar($msg); 
    
    //Ищем по подстроке с удалением 1 символа
    if (!$data['products']) {
        $msg[strlen($msg) - 1] = '';
        $msg = rtrim($msg);
        if ($msg) {
            $data['products'] = getProductByChar($msg);
        }
   }
        
    //Ищем по словам
    if (!$data['products']) {
         $msg = getArrWords($msg);
         if ($msg) {
             foreach ($msg as $val) {
                 $data['products'] = getProductByChar($val);      
                 if ($data['products']) {
                     break;
                 }
             }
        }
    } 
   
   return $data;    
}