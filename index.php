<?php
 session_start();  
 //>Подключаем API платёжной системы
 require 'api/payeer/cpayeer.php';
 //<
  
 //Определяем сервис
 $serviceName = isset($_GET['service']) ? strtolower($_GET['service']): null;
 
 //Инициализируем сервис
 if ($serviceName) {
    if (file_exists("config/{$serviceName}/config.php")) {
        $service = $serviceName;
    } else {
        $service = 'index'; 
    }
 } else {
     $service = 'index';
 }
 require 'config/'.$service.'/config.php'; 
 require 'config/connectDB.php';
 require 'library/mainFunctions.php';
 
// Определяем контроллер
 $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

 //Определяем вызов функции
 $actionName = isset($_GET['action']) ? ucfirst($_GET['action']).'Action': 'Index';
 
 loadPage($smarty, $controllerName, $actionName, $serviceName);


