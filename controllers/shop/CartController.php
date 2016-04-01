<?php

require 'models/shop/CartModel.php';
require 'models/index/UserModel.php';

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

function getCountProducts() {
    $data['lenproducts'] = 0;
    if (isset($_SESSION)) {
        $data['lenproducts'] = count();
    }
    echo json_encode($data);
}

//Добавление в корзину
function setProductAction() {
   $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;  
   $_SESSION['products'][$id] = $id;
    
   echo  json_encode(count($_SESSION['products']));
}

//Удаляем продукт из корзины
function removProductAction() {
   $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
   unset($_SESSION['products'][$id]);
   
   //Если массив пустой то удаляем его
   if (!$_SESSION['products']) {
       unset($_SESSION['products']); 
   }
   echo  json_encode(count($_SESSION['products']));    
}

//Вернёт список товаров в корзине
function showProductAction($smarty, $infoUser = null) {
    if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as  $key => $value) {
            $products[] = getProductById($value);
        }
        
        $summa = 0;
        foreach ($products as $key => $value) {
            $summa += $products[$key]['price'];
        }
        $smarty -> assign('summa', $summa);
        $smarty -> assign('products', $products);
    }
    
    
    //> Количество продуктов в корзине
    $lenproducts = 0 ;
    if (isset($_SESSION['products'])) {
        $lenproducts = count($_SESSION['products']);
    }
    $smarty -> assign('lenproducts', $lenproducts);
    //<
    
    $smarty -> assign('title', 'Корзина');
    if ($infoUser) { 
        $smarty -> assign('infoUs', $infoUser);
        loadTemplate($smarty, 'user/header');
        loadTemplate($smarty, 'user/cart');
        loadTemplate($smarty, 'user/footer');         
    } else {
        loadTemplate($smarty, 'index/header');
        loadTemplate($smarty, 'index/cart');
        loadTemplate($smarty, 'index/footer');        
    } 
}

function summaAction() {
    
}
