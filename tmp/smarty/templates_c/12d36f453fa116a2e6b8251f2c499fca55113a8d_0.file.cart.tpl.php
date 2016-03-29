<?php
/* Smarty version 3.1.29, created on 2016-03-27 17:37:03
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/shop/index/cart.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f7f00f10b026_77743531',
  'file_dependency' => 
  array (
    '12d36f453fa116a2e6b8251f2c499fca55113a8d' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/shop/index/cart.tpl',
      1 => 1459089422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f7f00f10b026_77743531 ($_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
    <table>
      <tr>
          <td>id</td>
          <td>img</td>
          <td>название</td>
          <td>цена</td>
          <td>действие</td>
      </tr>
      
      <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_product_0_saved_item = isset($_smarty_tpl->tpl_vars['product']) ? $_smarty_tpl->tpl_vars['product'] : false;
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$__foreach_product_0_saved_local_item = $_smarty_tpl->tpl_vars['product'];
?>
          <tr class="product_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
            <td><img width="100" src="www/images/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['images'];?>
"></td>  
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
            <td> 
              <a href="#" style="display: none" class="addproduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" onclick="addProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">Добавить</a>
              <a href="#" class="removeproduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" onclick="removProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">Удалить</a>
            </td> 
          </tr>
      <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_local_item;
}
if ($__foreach_product_0_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_item;
}
?>
    </table>
<?php } else { ?>
    В корзине нет добавленных товаров
<?php }
}
}
