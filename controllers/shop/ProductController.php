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

//Поиск товара в данной категории
function searchincategoryAction() {
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    $data['products'] = getProductInCategory($id, $msg);
    
    if (!$data['products']) {
        $data['messages'] = 'Поиск не дал результатов';
        $data['success'] = 0;
    } else {
        $data['success'] = 1;
    }
    
    echo json_encode($data);
}

//Поиск товара в данной подкатегории
function searchinsubcategoryAction() {
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    $data['products'] = getProductInSubCategory($id, $msg);
    
    if (!$data['products']) {
        $data['messages'] = 'Поиск не дал результатов';
        $data['success'] = 0;
    } else {
        $data['success'] = 1;
    }
    
    echo json_encode($data);
}

//Поиск товара в данном жанре
function searchingenreAction() {
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    $data['products'] = getProductInGenre($id, $msg);
    
    if (!$data['products']) {
        $data['messages'] = 'Поиск не дал результатов';
        $data['success'] = 0;
    } else {
        $data['success'] = 1;
    }
    
    echo json_encode($data);
}

