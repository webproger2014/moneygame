<?php
   //Проверка, вошёл ли пользователь в аккаунт
   function infoAccountAction($smarty, $function) {
    //Загружаем страницу
      $function($smarty); 
   }
   
   //Воззвращаем объект payeer 
   function getobjpayeerAction() {
  
        $accountNumber = 'P22154634';
        $apiId  = '85939359';
        $apiKey = '199417788f99F';
        $payeer = new CPayeer($accountNumber, $apiId, $apiKey);
        $payeer = serialize($payeer);
    
        echo json_encode($payeer);
   }
  
    
   //Проверяем существование payeer кошелька
    function getAccountAction() {
       
       $payeer = isset($_POST['class']) ? getClassOfJson($_POST['class']) : null;
       $purse = isset($_POST['payeer']) ? trim($_POST['payeer']) : null;
       if ($purse) {
            if ($payeer -> isAuth()) {
                if($payeer -> checkUser(['user' => $purse])) {
                    $data['messages']  = '';
                    $data['success'] = 1;
            } else {
                    $data['messages'] = 'Аккаунт не существует';
            }
        } else {
            $data['messages'] = $payeer->getErrors();
          }
        }
        
        echo json_encode($data);
    }
    
   /* function getBalanceAction() {
       $payeer = isset($_POST['class']) ? getClassOfJson($_POST['class']) : null;
       $purse = isset($_POST['payeer']) ? trim($_POST['payeer']) : null;
       
       if ($payeer -> isAuth()) {
            $arBalance = $payeer -> getBalance();
            $data['balance'] = $arBalance;
        } else {
            $data['messages'] =  $payeer -> getErrors();
        }

       echo json_encode($data);        
    }*/