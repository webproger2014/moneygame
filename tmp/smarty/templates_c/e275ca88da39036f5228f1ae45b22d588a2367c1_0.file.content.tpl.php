<?php
/* Smarty version 3.1.29, created on 2016-03-29 09:35:40
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/shop/index/content.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fa223ca80c84_07579842',
  'file_dependency' => 
  array (
    'e275ca88da39036f5228f1ae45b22d588a2367c1' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/shop/index/content.tpl',
      1 => 1459233327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fa223ca80c84_07579842 ($_smarty_tpl) {
?>
    
        <!-- Количество товаров в корзине -->
        <a href="?service=shop&controller=cart&action=showProduct" class="cart"><img width="25" src="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/icons/cart.png" alt="">
           <?php echo $_smarty_tpl->tpl_vars['lenproducts']->value;?>

        </a>
        <!--< Количество товаров в корзине -->

     <!-- Отрисовываем меню -->
     <br><br>МЕНЮ
    <ul>     
       <!-- Категория -->
      <?php
$_from = $_smarty_tpl->tpl_vars['cat']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_categories_0_saved_item = isset($_smarty_tpl->tpl_vars['categories']) ? $_smarty_tpl->tpl_vars['categories'] : false;
$_smarty_tpl->tpl_vars['categories'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['categories']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['categories']->value) {
$_smarty_tpl->tpl_vars['categories']->_loop = true;
$__foreach_categories_0_saved_local_item = $_smarty_tpl->tpl_vars['categories'];
?>
        <li><a href='#'><?php echo $_smarty_tpl->tpl_vars['categories']->value['name'];?>
</a>
            <ul>
                <!-- Подгатегория -->
               <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value['subcat'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subcat_1_saved_item = isset($_smarty_tpl->tpl_vars['subcat']) ? $_smarty_tpl->tpl_vars['subcat'] : false;
$_smarty_tpl->tpl_vars['subcat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subcat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subcat']->value) {
$_smarty_tpl->tpl_vars['subcat']->_loop = true;
$__foreach_subcat_1_saved_local_item = $_smarty_tpl->tpl_vars['subcat'];
?>
                 <li><a href='#'><?php echo $_smarty_tpl->tpl_vars['subcat']->value['name'];?>
</a>
                     <ul class="genre">
                         <!-- Жанр -->
                        <?php
$_from = $_smarty_tpl->tpl_vars['subcat']->value['cat'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_genre_2_saved_item = isset($_smarty_tpl->tpl_vars['genre']) ? $_smarty_tpl->tpl_vars['genre'] : false;
$_smarty_tpl->tpl_vars['genre'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['genre']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['genre']->value) {
$_smarty_tpl->tpl_vars['genre']->_loop = true;
$__foreach_genre_2_saved_local_item = $_smarty_tpl->tpl_vars['genre'];
?>
                          <li><a href="#" genre_id="<?php echo $_smarty_tpl->tpl_vars['genre']->value['genre_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['genre']->value['name'];?>
</a></li>
                         <?php
$_smarty_tpl->tpl_vars['genre'] = $__foreach_genre_2_saved_local_item;
}
if ($__foreach_genre_2_saved_item) {
$_smarty_tpl->tpl_vars['genre'] = $__foreach_genre_2_saved_item;
}
?>
                     </ul>
                 </li>
                <?php
$_smarty_tpl->tpl_vars['subcat'] = $__foreach_subcat_1_saved_local_item;
}
if ($__foreach_subcat_1_saved_item) {
$_smarty_tpl->tpl_vars['subcat'] = $__foreach_subcat_1_saved_item;
}
?>
            </ul>
        </li>
      <?php
$_smarty_tpl->tpl_vars['categories'] = $__foreach_categories_0_saved_local_item;
}
if ($__foreach_categories_0_saved_item) {
$_smarty_tpl->tpl_vars['categories'] = $__foreach_categories_0_saved_item;
}
?>
    </ul>

    <!-- Товар -->
    <div class="content">
    </div><?php }
}
