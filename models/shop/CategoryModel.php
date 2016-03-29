<?php


function getCat() {
    $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
    $sql = "SELECT * FROM  categories";
    $rs = mysqli_query($mysqli, $sql);
   
   return createSmartyRsAllArr($rs);
}

function  getCatsById($id) {
  $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
  $sql = "SELECT * FROM  subcategory WHERE `category_id`='{$id}'";
  $rs = mysqli_query($mysqli, $sql);
   
  return createSmartyRsAllArr($rs);    
}

function  getSubCatsById($id) {
   $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
   $sql = "SELECT * FROM  subcategory_category WHERE `subcategory_id`='{$id}'";
   $rs = mysqli_query($mysqli, $sql);
   
   return createSmartyRsAllArr($rs);    
}

function getProductsById($id) {
   $mysqli = createMysqli('localhost', 'webproger2014', '199417788f99F', 'shop');
    
   $sql = "SELECT * FROM  products 
           WHERE `category_id`='{$id}'
           ORDER BY id  DESC LIMIT 11";
   $rs = mysqli_query($mysqli, $sql);
   
   return createSmartyRsAllArr($rs);      
}