<?php

 require_once "models/index/AjaxModel.php";
 require 'models/index/UserModel.php';


//Проверка, вошёл ли пользователь в аккаунт
function infoAccountAction($smarty, $function) {
   //Загружаем страницу
    $function($smarty); 
}


//Проверяем steam_id на существование
 function FilterSteamLoginAction() {
     $data = [];
     
     if (isset($_GET['steam']) && trim($_GET['steam']) != '') {
         $steam = trim($_GET['steam']);
         if (validSteam($steam)) {
            if (getSteam($steam)) {
                $data['success']  = 1;
                $data['messages'] = '';
            } else {
                $data['success']  = 0;
                $data['messages'] = 'Аккаунта не существует';                
            }
         } else {
            $data['success']  = 0;
            $data['messages'] = 'Не корректно введены данные';            
         }
     } else {
         $data['success']  = 0;
         $data['messages'] = 'Заполните поле STEAM_ID';
     }
     
     echo json_encode($data);
 }
 
 
 //Проверяем свободел ли данный steam_id
  function FilterSteamLoginRegAction() {
     $data = [];
     
     if (isset($_GET['steam']) && trim($_GET['steam']) != '') {
         $steam = trim($_GET['steam']);
         if (validSteam($steam)) {
            if (!getSteam($steam)) {
                $data['success']  = 1;
                $data['messages'] = '';
            } else {
                $data['success']  = 0;
                $data['messages'] = 'Аккаунт занят';                
            }
         } else {
            $data['success']  = 0;
            $data['messages'] = 'Не корректно введены данные';            
         }
     } else {
         $data['success']  = 0;
         $data['messages'] = 'Заполните поле STEAM_ID';
     }
     
     echo json_encode($data);
 }
 
 //Проверяет существование аккаунта
 function loginAccountAction() {
     $data = [];
     
     if ($_POST['steam'] && $_POST['psw']) {
         $steam = (string)trim(strip_tags($_POST['steam']));
         $psw   = (string)trim(strip_tags($_POST['psw']));
         if (validSteam($steam)) {
             if (getAccount($steam, md5(md5($psw)))) {
                $data['success']  = 1;
                $data['messages'] = '';
                successAction($steam);
             } else {
                $data['success']  = 0;
                $data['messages'] = 'Аккаунта не существует';                     
             }
         } else {
            $data['success']  = 0;
            $data['messages'] = 'Не правильный STEAM_ID';             
         }
     } else {
         $data['success']  = 0;
         $data['messages'] = 'Заполните все поля';         
     }
     
     echo json_encode($data);
 }
 
//Проверка емайл 
function filterEmailRegAction() {
    $data = [];
    
     if ($_POST['email']) {
        $email = (string)trim($_POST['email']);
        if (filterEmail($email)) {
           if (!getEmail($email)) {
                $data['success'] = 1;
                $data['messages'] = '';                
           } else {
                $data['success'] = 0;
                $data['messages'] = 'Данный email занят';                 
           }              
        } else {
            $data['success'] = 0;
            $data['messages'] = 'Не корректно введены данные';            
        }
    } else {
        $data['success'] = 0;
        $data['messages'] = 'Поле email не может быть пустым';
    }
   
    echo json_encode($data);
}

//Проверка ника
function filterNickRegAction() {
    $data = [];
    
    if ($_POST['nick']) {
        $nick = (string)trim($_POST['nick']);
        if (filterNick($nick)) {
            if (!getNick($nick)) {
                $data['success'] = 0;
                $data['messages'] = '';                 
            } else {
                $data['success'] = 0;
                $data['messages'] = 'Данный ник уже используется';                 
            }
        } else {
            if (strlen($nick) < 5) {
                $data['success'] = 0;
                $data['messages'] = 'Не менее 5-ти символов';                 
            }else {
                $data['success'] = 0;
                $data['messages'] = 'Разрешены символы A-Z, a-z, 0-9, -, _';               
            }      
        }
    } else {
        $data['success'] = 0;
        $data['messages'] = 'Поле ник не может быть пустым';        
    }
    
    echo json_encode($data);
}

function successAction($steam) {
    $hash = generateHash(30);
    setHash($steam, $hash);
    setcookie('userhash', $hash, time() + 3600 * 72, '/');
}

//> Методы для админ формы
//> Фильтры значений
//Проверка post параметров email
function postEmailAdmAction($data) {
    if (!(isset($_POST['email']) && trim($_POST['email']) != '')) {
        $data['success']  = 0;
        $data['messages'] = ' -Заполните поле email';        
    }  
   return $data; 
}

function postPswAdmAction($data) {
    if (!(isset($_POST['psw']) && trim($_POST['psw']) != '')) {
        $data['success']  = 0;
        $data['messages'] .= '<br /> -Заполните поле пароль';        
    }  
   return $data; 
}
//Проверка email на корректность
function checkValiEmailAdmAction($data, $email) {  
    if (!filterEmail($email)) {
        $data['success']  = 0;
        $data['messages'] = ' -Не корректно введены данные';         
    }
    
    return $data;
}

//Проверка сущестование email
function checkGetEmailAdmAction($data, $email) {
    if (getEmailAdm($email)) {
        $data['success']  = 1;
        $data['messages'] = '';
    } else {
        $data['success']  = 0;
        $data['messages'] = ' -Аккаунта не сущесвует';
    }
    return $data;
}

//Проверка сущестование account
function checkAccountAdmAction($data, $email, $psw) {
    if (getAccountAdm($email, $psw)) {
        $data['success']  = 1;
        $data['messages'] = '';
    } else {
        $data['success']  = 0;
        $data['messages'] = ' -Неверный пароль';
    }
    return $data;
}
//<
    //Проверяем email
    function checkEmailAdmAction() {
     $data = postEmailAdmAction([]); 
  
        //Если переданы POST проверяем ник на корректность
        if (!isset($data['success'])) {
            $email = trim($_POST['email']);
            $data = checkValiEmailAdmAction($data, $email);    
        }
  
     //Проверка существование email
         if (!isset($data['success'])) {
            $data = checkGetEmailAdmAction($data, $email);    
        }
          
        echo json_encode($data);
    }
    
    //Входим в аккаунт
    function loginAccountAdmAction() {
     $data = postEmailAdmAction();
      $data = postPswAdmAction($data);
  
        //Если переданы POST проверяем ник на корректность
        if (!isset($data['success'])) {
            $email = trim($_POST['email']);
            $data = checkValiEmailAdmAction($data, $email);
        }
        
     //Проверка существование account
         if (!isset($data['success'])) {
            $psw  = md5(md5(trim($_POST['psw'])));
            $data = checkAccountAdmAction($data, $email, $psw);    
        }
        
        //Осуществляем вход 
        if (isset($data['success']) && $data['success'] == 1) {
            successAdmAction($email);
        }   
         
        echo json_encode($data);       
    }
    
   function successAdmAction($email) {
        $hash = generateHash(30);
        setHashAdm($email, $hash);
        setcookie('adminhash', $hash, time() + 3600 * 72, '/');
    }    
//<