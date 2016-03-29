<?php
/* Smarty version 3.1.29, created on 2016-03-27 17:14:36
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/shop/index/product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f7eacc3c4769_90347675',
  'file_dependency' => 
  array (
    '4e7cd1717e1cbb45d373878c1664594cc51ffd5b' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/shop/index/product.tpl',
      1 => 1459088042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f7eacc3c4769_90347675 ($_smarty_tpl) {
?>

<div class="product_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
    <img width="300" src="www/images/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['images'];?>
">
    <p>id:<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</p>
    <p>Цена: <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</p>
    <p>Название: <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</p>
    <p>Описание: <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
    <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> 
        <a href="#" style="display: none" class="addproduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" onclick="addProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">Добавить</a>
        <a href="#" class="removeproduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" onclick="removProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">Удалить</a>
    <?php } else { ?>
        <a href="#" class="addproduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" onclick="addProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">Добавить</a>
        <a href="#" style="display: none" class="removeproduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" onclick="removProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">Удалить</a>
    <?php }?> 
</div><?php }
}
