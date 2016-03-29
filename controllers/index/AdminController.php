<?php
require 'models/index/AdminModel.php';
//Проверка, вошёл ли пользователь в аккаунт
function infoAccountAction($smarty, $function) {
   $hash = getHashAdmin();
    if ($hash) {
        $infoUser = getInfoUser($hash);
        if ($infoUser) {
            //Загружаем страницу
            $function($smarty, $infoUser);            
        } else {
            //Отправляем на страницу входа
            loadLoginPageAction();            
        }
    } else {
        //Отправляем на страницу входа
        loadLoginPageAction();
    }
}

function loadLoginPageAction() {
    header('Location: ?controller=Formsadm&action=login');
}

//Загрузка формы входа
function loginAction($smarty) {
    loadTemplate($smarty, 'admin/header');
}

//Загрузка главной страницы
function indexAction($smarty, $infoUser) {
       $smarty -> assign('infoUs', $infoUser);
       loadTemplate($smarty, 'admin/header');
       if ((int)$infoUser['levels'] == 1) {
           $smarty -> assign('listadm', getListAdm());
           $smarty -> assign('listmod', getListMod());
           loadTemplate($smarty, 'admin/admin/homeContent');  
           loadTemplate($smarty, 'admin/admin/footer');
       } else {
           loadTemplate($smarty, 'admin/moderator/homeContent');
           loadTemplate($smarty, 'admin/moderator/footer');
       }          
}

//Загрузка  страницы настройки
function settingsAction($smarty, $infoUser) {
       $smarty -> assign('infoUs', $infoUser);
       loadTemplate($smarty, 'admin/header');
       loadTemplate($smarty, 'admin/settings');  
       loadTemplate($smarty, 'admin/admin/footer');          
}

//>Операции с user аккаунтами (settings-ban)
//Возвращаем info user аккаунта
function infoUserAction() {
    $data = postSteamAction([]);
    
    //Если пришли POST Параметры
    //Проверяем steam_id на корректность
    if (!isset($data['success'])) {
        $steam = trim($_POST['steam']);
        $data  = checkValiSteamAction($data, $steam);
    }
    
    //Проверяем существование steam_id
    if (!isset($data['success'])) {
        $data = checkGetSteamAction($data, $steam);
    }
    
    echo json_encode($data);
}
//<

//> Различные фильтры значений inputs
//Проверка post параметров steam
function postSteamAction($data) {
    if (!(isset($_POST['steam']) && trim($_POST['steam']) != '')) {
        $data['success']  = 0;
        $data['messages'] = 'Заполните поле STEAM_ID';        
    }  
   return $data; 
}

function postCauseAction($data) {
    if (!(isset($_POST['cause']) && strip_tags(trim($_POST['cause'])) != '')) {
        $data['success']  = 0;
        $data['messages'] .= '<br/> - Заполните поле Причина бана';        
    }  
   return $data; 
}

function postDateAction($data) {
    if (!(isset($_POST['date']) && strip_tags(trim($_POST['date'])) != '')) {
        $data['success']  = 0;
        $data['messages'] .= '<br/> - Заполните поле Дата бана';        
    }  
   return $data; 
}

// Проверка date на корректность
function checkValiDateAction($data, $date) {  
    if (!validDate($date)) {
        $data['success']  = 0;
        $data['messages'] = 'Не корректно введены данные date: ';         
    }
    return $data;
}

//Проверка steam_id на корректность
function checkValiSteamAction($data, $steam) {  
    if (!validSteam($steam)) {
        $data['success']  = 0;
        $data['messages'] = 'Не корректно введены данные';         
    }
    return $data;
}

//Проверка существует ли данный steam_id
function checkGetSteamAction($data, $steam) {
    //Вернём информацию о user account
    $infoUs = getInfAccountUser($steam); 
    if ($infoUs) {
        $data['success']  = 1;
        $data['messages'] = '';
        $data['infoUs'] = $infoUs;
    } else {
        $data['success']  = 0;
        $data['messages'] = 'Аккаунт не существует';
    }
    return $data;
}

//Проверка существует ли данный steam_id
function checksGetSteamAction($data, $steam) {
    //Вернём информацию о user account
    $infoUs = getInfAccountUser($steam); 
    if ($infoUs) {
        $data['success']  = 1;
        $data['messages'] = '';
    } else {
        $data['success']  = 0;
        $data['messages'] = 'Аккаунт не существует';
    }
    return $data;
}

function unbannedUserAction($smarty, $infoUser) {
    $data = postSteamAction([]);
    
    //Если пришли POST Параметры
    //Проверяем steam_id на корректность
    if (!isset($data['success'])) {
        $steam = trim($_POST['steam']);
        $data  = checkValiSteamAction($data, $steam);
    }
    
    //Проверяем существование steam_id
    if (!isset($data['success'])) {
        $data = checksGetSteamAction($data, $steam);
    }
    
    if (isset($data['success']) && $data['success'] == 1) {
        unbannedUser($steam);
    }
    echo json_encode($data);    
}

function bannedUserAction($smarty, $infoUser) {
    $data = postSteamAction([]);
    $data = postCauseAction($data);
    $data = postDateAction($data);
    
    //Если пришли POST Параметры
    //Проверяем steam_id на корректность
    if (!isset($data['success'])) {
        $steam = trim($_POST['steam']);
        $data  = checkValiSteamAction($data, $steam);
    }
    
    //Проверяем на корректность дату
    if(!isset($data['success'])) {
        $date = $_POST['date'];
        $data = checkValiDateAction($data, $date);
    }
    
    //Проверяем существование steam_id
    if (!isset($data['success'])) {
        $data = checksGetSteamAction($data, $steam);
    }
    
    if (isset($data['success']) && $data['success'] == 1) {
        $cause = strip_tags(trim($_POST['cause']));
        bannedUser($steam, $cause, $date);
    }
    echo json_encode($data);    
}
//>


function exitAccountAction() {
    setcookie('adminhash', '', time() - 1, '/');
}

//Обновление аватарки (ПЕРЕПИСАТЬ)
  function updateAvatarsAction($smarty, $infoUser) {
      $data = filterImages([]);
      
      //Если изображение валидно то обрезаем его
      if (!isset($data['success'])) {
         //Урезаем разрешение img до 150x150
           $images = truncateImages();
           //Определяем имя файла
           if ($infoUser['avatars'] == 'default.png') {
               $images['name'] = ''.time().generateHash(30).'.jpg';
               setAvatars($images['name'], $infoUser);
           } else {
               $images['name'] = $infoUser['avatars'];           
           }
           saveImages($images);
           $data['success'] = 1;
           $data['messages'] = '';
           $data['namefile'] = $images['name'];
      }    
      echo json_encode($data);
  }
  
  //>Методы для работы с админ аккаунтом
  //> Фильтры inputs
  //
//Проверка post параметров id
function postIdAdmAction($data) {
    if (!(isset($_POST['id']) && trim($_POST['id']) != '')) {
        $data['success']  = 0;
        $data['messages'] = ' -Не пришёл id';        
    }  
   return $data; 
} 
 
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
    if (!getEmailAdm($email)) {
        $data['success']  = 1;
        $data['messages'] = '';
    } else {
        $data['success']  = 0;
        $data['messages'] = ' - Аккаунт занят';
    }
    return $data;
}
  //< Методя для манипуляции аккаунтами
    function checkEmailAdmAction($smarty, $infoUser) {
        $data = [];
            $data = postEmailAdmAction($data);
            //Если переданы POST проверяем email на корректность
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
    
   function accountCreateAction($smarty, $infoUser) {
        $data = [];
        if ($infoUser['levels'] == 1) {
            $data = postEmailAdmAction($data);
            $data = postPswAdmAction($data);
            
            //Если переданы POST проверяем email на корректность
            if (!isset($data['success'])) {
                $email = trim($_POST['email']);
                $data = checkValiEmailAdmAction($data, $email);    
            }
           
            //Проверка существование email
            if (!isset($data['success'])) {
                $data = checkGetEmailAdmAction($data, $email);    
            }
            // Cоздание аккаунта
            if (isset($data['success']) && $data['success'] == 1) {
                $psw = md5(md5(trim($_POST['psw'])));
                $lvl = $_POST['lvl'];
                $author = 'adm #'.$infoUser['ID'];
                setAccount($email, $psw, $lvl, $author);
                $data['messages'] = 'Аккаунт создан';
            }            
         } else {
            $data['messages'] = 'У вас не достаточно прав';
        }
        echo json_encode($data);       
   }
   
   function getInfoAccountAction($smarty, $infoUser){
       $data = [];
       if ((int)$infoUser['levels'] == 1) {
           //Отправка post
            $data = postEmailAdmAction($data);
            //Если переданы POST проверяем email на корректность
            if (!isset($data['success'])) {
                $email = trim($_POST['email']);
                $data = checkValiEmailAdmAction($data, $email);    
            }        
            //Возвращаем инфу об аккануте
            if (!isset($data['success'])) {
                $data['infous'] = getInfoAccount($email);
                if ($data['infous']) {
                    $data['success']  = 1;
                    $data['messages'] = '';
                } else {
                    $data['success']  = 0;
                    $data['messages'] = 'Аккаунта не существует';                    
                }
            }            
       } else {
          $data['success'] == 1;
          $data['messages'] = 'У вас не достаточно прав!';
       }
       
       echo json_encode($data);
   }
   
   //Удалени аккаунта
   function delAccountAction($smarty, $infoUser) {
       $data = [];
       if ((int)$infoUser['levels'] == 1) {
            delAccount($_POST['id']);
            $data['success']  = 1;
            $data['messages'] = '';
           
       } else {
           $data['success'] = 0;
           $data['messages']  = 'У вас не достаточно прав';
       }
       
      echo json_encode($data);
   }
   
   function setRunkAdmAction($smarty, $infoUser) {
       $data = [];
       if ((int)$infoUser['levels'] == 1) {
            setRunkAdm($_POST['id']);
            $data['success']  = 1;
            $data['messages'] = '';
           
       } else {
           $data['success'] = 0;
           $data['messages']  = 'У вас не достаточно прав';
       }
       
      echo json_encode($data);       
   }
   
   function setRunkModAction($smarty, $infoUser) {
       $data = [];
       if ((int)$infoUser['levels'] == 1) {
            setRunkMod($_POST['id']);
            $data['success']  = 1;
            $data['messages'] = '';
           
       } else {
           $data['success'] = 0;
           $data['messages']  = 'У вас не достаточно прав';
       }
       
      echo json_encode($data);       
   }   
  //<
   
 //>Страница настройки
     function setEmailAdmAction($smarty, $infoUser) {
        $data = [];
        
            $data = postEmailAdmAction($data);
            //Если переданы POST проверяем email на корректность
            if (!isset($data['success'])) {
                $email = trim($_POST['email']);
                $data = checkValiEmailAdmAction($data, $email);    
            }
  
            //Проверка существование email
            if (!isset($data['success'])) {
                $data = checkGetEmailAdmAction($data, $email);    
            }
            
            if (isset($data['success']) && $data['success'] == 1) {
                setEmail($email, $infoUser);   
                $data['save'] = 1;
            }
     echo json_encode($data);
    }
    
    function setPswAdmAction($smarty, $infoUser) {
        $data = [];
     
        if (!(isset($_POST['psw']) && trim($_POST['psw']) != '')) {
            $data['success']  = 0;
            $data['messages'] = ' -Заполните поле пароль';        
        }
        
        if (!isset($data['success'])) {
            $psw = md5(md5(trim($_POST['psw'])));
            setPsw($psw, $infoUser);
            $data['save'] = 1;
        }
        echo json_encode($data);
    }
//<