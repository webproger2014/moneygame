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
             $function($smarty, $infoUser);                  
        } else {
            //Загружаем страницу
            loadServiceIndexAction();               
        }
    } else {
        //Загружаем страницу
        loadServiceIndexAction(); 
    }    
}
    
    function loadServiceIndexAction() {
        header('Location: ?service=shop');
    }
    
  function IndexAction($smarty, $infoUser) {
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
     
    $smarty -> assign('title', 'Главная');
    $smarty -> assign('infoUs', $infoUser);

    loadTemplate($smarty, 'user/header');
    loadTemplate($smarty, 'user/content');
    loadTemplate($smarty, 'user/footer');  
 }

