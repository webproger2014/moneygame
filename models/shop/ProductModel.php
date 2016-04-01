<?php

    function getProductById($cat, $id) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM  products
              WHERE `category_id`='{$cat}'
              AND `id`='{$id}'";
       $rs = mysqli_query($mysqli, $sql);
   
       return createSmartyRsArray($rs);    
    }
   
    //Для формы поиска - ищем везде
    function getProduct($msg) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM  products
              WHERE `name`='{$msg}' OR `description`='{$msg}'
              ORDER BY id  DESC LIMIT 11";
              
       $rs = mysqli_query($mysqli, $sql);
       
       return createSmartyRsAllArr($rs);    
    }
    
    //Ищем по подстроке товар
    function getProductByChar($msg) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM  products
               WHERE (LOCATE('{$msg}', `name`) OR 
               LOCATE('{$msg}', `description`))
               ORDER BY id  DESC LIMIT 11";
               
       $rs = mysqli_query($mysqli, $sql);

       return createSmartyRsAllArr($rs);  
    }
   