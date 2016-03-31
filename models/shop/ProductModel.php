<?php

    function getProductById($cat, $id) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM  products
              WHERE `category_id`='{$cat}'
              AND `id`='{$id}'";
       $rs = mysqli_query($mysqli, $sql);
   
       return createSmartyRsArray($rs);    
    }

    function getProductInCategory($id, $msg) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM  products
              WHERE `category_id`='{$id}'
              AND (`name`='{$msg}' OR `description`='{$msg}')";
       $rs = mysqli_query($mysqli, $sql);
   
       return createSmartyRsAllArr($rs);    
    }

    function getProductInSubCategory($id, $msg) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM  products
              WHERE `category_id`='{$id}'
              AND (`name`='{$msg}' OR `description`='{$msg}')";
       $rs = mysqli_query($mysqli, $sql);
   
       return createSmartyRsAllArr($rs);    
    }
 
    function getProductInGenre($id, $msg) {
       $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
       $sql = "SELECT * FROM  products
              WHERE `category_id`='{$id}'
              AND (`name`='{$msg}' OR `description`='{$msg}')";
       $rs = mysqli_query($mysqli, $sql);
   
       return createSmartyRsAllArr($rs);    
    }    