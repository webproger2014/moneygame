<?php

require 'models/index/UserModel.php';

//Проверка, вошёл ли пользователь в аккаунт
function infoAccountAction($smarty, $function) {
    $hash = getHashUser();
    if ($hash) {
        $infoUser = getInfoUser($hash);
        if ($infoUser) {
            //Загружаем страницу
            $function($smarty, $infoUser);            
        } else {
            //Отправляем на страницу входа/регистрации
            loadRegisterPageAction();            
        }
    } else {
        //Отправляем на страницу входа/регистрации
        loadRegisterPageAction();
    }    
}

//Загрузка главной страницы пользователя
function indexAction($smarty, $infoUser) {
    $smarty -> assign('infoUs', $infoUser);
    $player = getInfoPlayer($infoUser['STEAM_ID']);
    $smarty -> assign('player', $player);
    
    if ((int)$infoUser['ban'] == 0) {
        //Загружаем страницу не забанненого аккаунта
        loadTemplate($smarty, 'user/header');
        //Если статистики нету
        if (!$player){
            loadTemplate($smarty, 'user/unBanned/nonestatistics');
        } else {
            loadTemplate($smarty, 'user/unBanned/homeContent');    
        }    
        loadTemplate($smarty, 'user/unBanned/footer');       
    } else {
        loadTemplate($smarty, 'user/header');
        if (!$player){
            loadTemplate($smarty, 'user/banned/nonestatistics');
        } else {
            loadTemplate($smarty, 'user/banned/homeContent');
        }
        loadTemplate($smarty, 'user/banned/homeContent');
        loadTemplate($smarty, 'user/banned/footer');        
    }
}

//Загрузка страницы входа/регистрации
function loadRegisterPageAction() {
    header("Location: ?controller=register&action=index");
}

//Загрузка страницы настройки
 function settingsAction($smarty, $infoUser) {
    $smarty -> assign('infoUs', $infoUser);    
    if ((int)$infoUser['ban'] == 0) {
        //Загружаем страницу не забанненого аккаунта
        loadTemplate($smarty, 'user/header');
        loadTemplate($smarty, 'user/unBanned/settings');
        loadTemplate($smarty, 'user/unBanned/footer');       
    } else {
        loadTemplate($smarty, 'user/header');
        loadTemplate($smarty, 'user/banned/settings');
        loadTemplate($smarty, 'user/banned/footer');        
    }     
 }
 
 //Загрузка страницы тикеты
 function ticketsAction($smarty, $infoUser){
    //Информация о пользователе
    $smarty -> assign('infoUs', $infoUser);  
    if ((int)$infoUser['ban'] == 0) {
        //Загружаем страницу не забанненого аккаунта
        loadTemplate($smarty, 'user/header');
        loadTemplate($smarty, 'user/unBanned/ticket');
        loadTemplate($smarty, 'user/unBanned/footer');       
    } else {
        loadTemplate($smarty, 'user/header');
        loadTemplate($smarty, 'user/banned/ticket');
        loadTemplate($smarty, 'user/banned/footer');        
    }       
 }
 
//Выход из аккаунта
function exitAccountAction() {
    setcookie('userhash', '', time() - 1, '/');
}
 
//> Различные фильтры значений inputs
//Проверка аккаунта на бан
function checkBanAction($data, $infoUser) {
    if ((int)$infoUser['ban'] == 1) {
        $data['success'] = 0;
        $data['messages'] = 'Ваш аккаунт заблокирован';
    } 
   return $data; 
}

//Проверка post параметров steam
function postSteamAction($data) {
    if (!(isset($_POST['steam']) && trim($_POST['steam']) != '')) {
        $data['success']  = 0;
        $data['messages'] = 'Заполните поле STEAM_ID';        
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

//Проверка свободел ли данный steam_id
function checkGetSteamAction($data, $steam, $infoUser) {
    if (!getSteams($steam)) {
        $data['success']  = 1;
        $data['messages'] = '';
    } else {
        $data['success']  = 0;
        $data['messages'] = 'Аккаунт занят';
        //Если это ваш steam_id
        if ($infoUser['STEAM_ID'] == $steam) {
            $data['messages'] = '';
        }
    }
    return $data;
}

//> Фильтры для email 
//Проверка post параметров email
function postEmailAction($data) {
    if (!(isset($_POST['email']) && trim($_POST['email']) != '')) {
        $data['success']  = 0;
        $data['messages'] = 'Заполните поле email';        
    }  
   return $data; 
}

//Проверка email на корректность
function checkValiEmailAction($data, $email) {  
    if (!filterEmail($email)) {
        $data['success']  = 0;
        $data['messages'] = 'Не корректно введены данные';         
    }
    return $data;
}

//Проверка свободел ли данный email
function checkGetEmailAction($data, $email, $infoUser) {
    if (!getEmails($email)) {
        $data['success']  = 1;
        $data['messages'] = '';
    } else {
        $data['success']  = 0;
        $data['messages'] = 'Email занят';
        //Если это ваш steam_id
        if ($infoUser['email'] == $email) {
            $data['messages'] = '';
        }
    }
    return $data;
}

//Проверка post параметров пароля
function postPswAction($data) {
    if (!(isset($_POST['psw']) && trim($_POST['psw']) != '')) {
        $data['success']  = 0;
        $data['messages'] = 'Заполните поле пароль';        
    }  
   return $data; 
}

//Проверка пароль на корректность
function checkValiPswlAction($data, $psw) {  
    if (strlen($psw) < 5) {
        $data['success']  = 0;
        $data['messages'] = 'Не менее 5 символов';         
    } else {
        $data['success']  = 1;
        $data['messages'] = '';          
    }
    return $data;
}


//Проверка post параметров nick
function postNickAction($data) {
    if (!(isset($_POST['nick']) && trim($_POST['nick']) != '')) {
        $data['success']  = 0;
        $data['messages'] = 'Заполните поле nick';        
    }  
   return $data; 
}

//Проверка nick на корректность
function checkValiNickAction($data, $nick) {  
    if (!filterNick($nick)) {
        $data['success']  = 0;
        $data['messages'] = 'Разрешены символы A-Z a-z, 0-9 ,_ ,-';         
    }
    
    return $data;
}

//Проверка свободел ли данный nick
function checkGetNickAction($data, $nick, $infoUser) {
    if (!getNickName($nick)) {
        $data['success']  = 1;
        $data['messages'] = '';
    } else {
        $data['success']  = 0;
        $data['messages'] = 'Ник занят';
        //Если это ваш steam_id
        if ($infoUser['NICK_NAME'] == $nick) {
            $data['messages'] = '';
        }
    }
    return $data;
}

//<
//<

//>Методы для работы с найстройками аккаунта(фильтры данных)
 //Проверяем steam_id
  function checkSteamAction($smarty, $infoUser) { 
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postSteamAction($data);    
     }
    
     //Если переданы POST проверяем steam_id на корректность
     if (!isset($data['success'])) {
         $steam = trim($_POST['steam']);
         $data = checkValiSteamAction($data, $steam);    
     }
     
     //Проверка свободел ли данный steam_id
     if (!isset($data['success'])) {
        $data = checkGetSteamAction($data, $steam, $infoUser);    
     }     
     echo json_encode($data);
 }
 
 //Записываем steam_id
 function setSteamAction($smarty, $infoUser) {
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postSteamAction($data);    
     }  
     
     //Если переданы POST проверяем steam_id на корректность
     if (!isset($data['success'])) {
         $steam = trim($_POST['steam']);
         $data = checkValiSteamAction($data, $steam);
     }   
     
     //Проверка свободел ли данный steam_id
     if (!isset($data['success'])) {
        $data = checkGetSteamAction($data, $steam, $infoUser);
     }  
     
    //Если всё корректно то перезаписываем steam_id
    if (isset($data['success']) && $data['success'] == 1) {
        setSteam($steam, $infoUser);
        $data['save'] = 1;
    }     
     echo json_encode($data);
 }
 
 //Проверяем email
  function checkEmailAction($smarty, $infoUser) { 
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postEmailAction($data);    
     }
    
     //Если переданы POST проверяем email на корректность
     if (!isset($data['success'])) {
         $email = trim($_POST['email']);
         $data = checkValiEmailAction($data, $email);    
     }
     
     //Проверка свободел ли данный email
     if (!isset($data['success'])) {
        $data = checkGetEmailAction($data, $email, $infoUser);    
     }     
     echo json_encode($data);
 }
  
 //Сохраняем email
  function setEmailAction($smarty, $infoUser) { 
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postEmailAction($data);    
     }
    
     //Если переданы POST проверяем email на корректность
     if (!isset($data['success'])) {
         $email = trim($_POST['email']);
         $data = checkValiEmailAction($data, $email);    
     }
     
     //Проверка свободел ли данный email
     if (!isset($data['success'])) {
        $data = checkGetEmailAction($data, $email, $infoUser);    
     }
     
    //Если всё корректно то перезаписываем email
    if (isset($data['success']) && $data['success'] == 1) {
        setEmails($email, $infoUser);
        $data['save'] = 1;
    }      
     echo json_encode($data);  
 }

 //Проверяем пароль
  function checkPswAction($smarty, $infoUser) { 
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postPswAction($data);    
     }
    
     //Если переданы POST проверяем пароль на корректность
     if (!isset($data['success'])) {
         $psw = trim($_POST['psw']);
         $data = checkValiPswlAction($data, $psw);    
     }       
    echo json_encode($data);
 }

 //Сохраняем пароль
  function setPswAction($smarty, $infoUser) { 
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postPswAction($data);    
     }
    
     //Если переданы POST проверяем пароль на корректность
     if (!isset($data['success'])) {
         $psw = trim($_POST['psw']);
         $data = checkValiPswlAction($data, $psw);    
     }   
     
     if (isset($data['success']) && $data['success'] == 1) {
         $psw = md5(md5($psw));
         setPassword($psw, $infoUser);
         $data['save'] = 1;
     }
    echo json_encode($data);
 }
 
 //Проверяем ник
  function checkNickAction($smarty, $infoUser) { 
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postNickAction($data);    
     }
    
     //Если переданы POST проверяем ник на корректность
     if (!isset($data['success'])) {
         $nick = trim($_POST['nick']);
         $data = checkValiNickAction($data, $nick);    
     }
  
     //Проверка свободел ли данный email
     if (!isset($data['success'])) {
        $data = checkGetNickAction($data, $nick, $infoUser);    
     }
          
    echo json_encode($data);
 }

 //Сохраняем ник
  function setNickAction($smarty, $infoUser) { 
     $data = checkBanAction([], $infoUser);
     
     //Если не забанен аккаунт проверям post параметры
     if (!isset($data['success'])) {
         $data = postNickAction($data);    
     }
    
     //Если переданы POST проверяем ник на корректность
     if (!isset($data['success'])) {
         $nick = trim($_POST['nick']);
         $data = checkValiNickAction($data, $nick);    
     }
  
     //Проверка свободел ли данный nick_name
     if (!isset($data['success'])) {
        $data = checkGetNickAction($data, $nick, $infoUser);    
     }
    
    //Если всё корректно то перезаписываем nick_name
    if (isset($data['success']) && $data['success'] == 1) {
        setNickName($nick, $infoUser);
        $data['save'] = 1;
    }        
    echo json_encode($data);
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
  
  function delAccountAction($smarty, $infoUser) {
      delUser($infoUser);
      
      //Удаляем аватарку из директории
      if ($infoUser['avatars'] !== 'default.png') {
          unlink('www/images/avatars/'.$infoUser['avatars']);
      }
  }
 
  function postTicket($data) {
    if (!isset($_POST['ticket']) && strip_tags(trim($_POST['ticket'])) != '') {
        $data['success']  = 0;
        $data['messages'] = 'Введите данные';        
    }  
    return $data;      
  }
  
  function createMessagesEmail($ticket, $infoUser) {
     $steam = "<html><body>STEAM_ID: ".$infoUser['STEAM_ID']. "<br>";
     $email = 'Email: '.$infoUser['email']. '<br>';
     $nick  = 'Ник: '.$infoUser['NICK_NAME']. '<br>';
     $ban   = 'Бан: '.$infoUser['ban']. '<br>';
     $cause   = 'Причина бана: '.$infoUser['causeBan']. '<br>';
     $whoBan   = 'Забанил: '.$infoUser['wboBanned']. '<br><br>';
     $ticket = 'Cообщение: ' .$ticket . '</body></html>';
     $messages = $steam .$email .$nick .$ban .$cause .$whoBan .$ticket;
     return $messages;
  }
  
  //Отправка тикета
  function sendTicketAction($smarty, $infoUser) {
      $data = postTicket([]);
   
      //Если если пришли POST параметры
      if(!isset($data['success'])) {
          $ticket = strip_tags(trim($_POST['ticket']));
          $ticket  = createMessagesEmail($ticket, $infoUser);
          sendMail('webproger2014@gmail.com', 'moneygame', $ticket);
          
          $data['success'] = 1;
      }
          
      echo json_encode($data);
  }
//<