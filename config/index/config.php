<?php
    
    //> Константы для обращения к контроллерам
    define('PathPrefix', 'controllers/index/');
    define('PathPostFix', 'Controller.php');
    //> 
    
    //> Используемый шаблон
    $template = 'default';
    
    // Пути к файлам шаблона *.tpl
    define('TemplatePrefix', "views/{$template}/");
    define('TemplatePostFix', '.tpl');
    
    //Пути к файлам шаблона в веб пространстве
    define('TemplateWebPath', "www/template/{$template}/");
    //<
    
    //> Инициализация шаблонизатора смарти
    require "library/Smarty/libs/Smarty.class.php";
    
    $smarty = new Smarty();
    
    $smarty -> setTemplateDir(TemplatePrefix);
    $smarty -> setCompileDir('tmp/smarty/templates_c');
    $smarty -> setCacheDir('tmp/smarty/cache');
    $smarty -> setConfigDir('library/Smarty/configs');
    
    $smarty -> assign('teplateWebPath', TemplateWebPath);
    //<
    
