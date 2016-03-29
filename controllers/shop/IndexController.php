<?php

    require 'models/shop/IndexModel.php';
    require 'models/shop/CategoryModel.php';
    require 'models/index/UserModel.php';
 
    //Проверка, вошёл ли пользователь в аккаунт
    function infoAccountAction($smarty, $function) {
    $hash = getHashUser(); 
    if ($hash) {
        $infoUser = getInfoUser($hash);
        if ($infoUser) {
            //Загружаем страницу пользователя
            header("Location: ?controller=User&action=index&service=shop");                 
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
        $cat = getCat();
        //Возвращаем подкатегорию
        foreach ($cat as $key => $value ) {
            $cat[$key]['subcat'] = getCatsById($cat[$key]['parent_id']);  
        }
      
        //Возвращаем категории подкатогории 
        foreach ($cat as $key => $value ) {
            $id = $cat[$key]['subcat']['subcategory_id']; 
            $cat[$key]['subcat'][$key]['cat'] = getSubCatsById($id);  
        }    
        $smarty -> assign('cat', $cat);
        //> Количество продуктов в корзине
        $lenproducts = 0 ;
        if (isset($_SESSION['products'])) {
            $lenproducts = count($_SESSION['products']);
        }
        $smarty -> assign('lenproducts', $lenproducts);
        //<
            loadTemplate($smarty, 'index/header');
            loadTemplate($smarty, 'index/content');
            loadTemplate($smarty, 'index/footer');
    }