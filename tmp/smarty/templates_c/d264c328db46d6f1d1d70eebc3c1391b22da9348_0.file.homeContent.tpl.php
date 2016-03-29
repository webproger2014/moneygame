<?php
/* Smarty version 3.1.29, created on 2016-03-13 21:09:24
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/admin/homeContent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e5acd456bc80_83992960',
  'file_dependency' => 
  array (
    'd264c328db46d6f1d1d70eebc3c1391b22da9348' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/admin/homeContent.tpl',
      1 => 1457892557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e5acd456bc80_83992960 ($_smarty_tpl) {
?>
    <div class="main">
        <nav class="top-nav"></nav>
        <section>
            <h1 class="section-name">Удаление аккаунта</h1>
            <h3 class="item-name delAccount"><p>E-mail:</p><input type="text"><div class="errors" id="emailDel"></div></h3>
        <section>
              <table class="striped contenttable-del"style="display:none;">
                  <thead>
                    <tr>
                        <th data-field="stat-number">ID</th>
                        <th data-field="avatar"></th>
                        <th data-field="email">E-mail</th>
                        <th data-field="datareg">Дата регистрации</th>
                    </tr>
                  </thead>
                  <tbody>                
                    <tr class="table-accounts">
                      <td class="del-account ids"></td>
                      <td class="del-account avatars"><img src="" width="50"></td>
                      <td class="del-account email"></td>
                      <td class="del-account dateReg"></td>
                      <td class="del-account rang"><a href="#"></a></td>
                      <td class="del-account method"><a href="#">Удалить</a></td>
                    </tr>        
                  </tbody>
            </table>
        </section>
     <!-- Таблица отрисовки user для удаления -->       
            
        </section>        
        <section>
            <h1 class="section-name">Администраторы</h1>
              <table class="striped">
                  <thead>
                    <tr>
                        <th data-field="stat-number">ID</th>
                        <th data-field="avatar"></th>
                        <th data-field="email">E-mail</th>
                        <th data-field="datareg">Дата регистрации</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
$_from = $_smarty_tpl->tpl_vars['listadm']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_admin_0_saved_item = isset($_smarty_tpl->tpl_vars['admin']) ? $_smarty_tpl->tpl_vars['admin'] : false;
$_smarty_tpl->tpl_vars['admin'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['admin']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->value) {
$_smarty_tpl->tpl_vars['admin']->_loop = true;
$__foreach_admin_0_saved_local_item = $_smarty_tpl->tpl_vars['admin'];
?>                 
                            <tr class="table-accounts admin" id="<?php echo $_smarty_tpl->tpl_vars['admin']->value['ID'];?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['ID'];?>
</td>
                                <td><img src="www/images/avatars/<?php echo $_smarty_tpl->tpl_vars['admin']->value['avatars'];?>
" width="50"></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['email'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['dateReg'];?>
</td>
                                <td><a href="#">Понизить</a></td>
                                <td><a href="#">Удалить</a></td>
                            </tr>        
                      <?php
$_smarty_tpl->tpl_vars['admin'] = $__foreach_admin_0_saved_local_item;
}
if ($__foreach_admin_0_saved_item) {
$_smarty_tpl->tpl_vars['admin'] = $__foreach_admin_0_saved_item;
}
?>
                  </tbody>
            </table>
        </section>
        <section>
            <h1 class="section-name">Модераторы</h1>
              <table class="striped">
                  <thead>
                    <tr>
                        <th data-field="stat-number">ID</th>
                        <th data-field="avatar"></th>
                        <th data-field="email">E-mail</th>
                        <th data-field="datareg">Дата регистрации</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
$_from = $_smarty_tpl->tpl_vars['listmod']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_mod_1_saved_item = isset($_smarty_tpl->tpl_vars['mod']) ? $_smarty_tpl->tpl_vars['mod'] : false;
$_smarty_tpl->tpl_vars['mod'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['mod']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->_loop = true;
$__foreach_mod_1_saved_local_item = $_smarty_tpl->tpl_vars['mod'];
?>                 
                            <tr class="table-accounts mod" id="<?php echo $_smarty_tpl->tpl_vars['mod']->value['ID'];?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['ID'];?>
</td>
                                <td><img src="www/images/avatars/<?php echo $_smarty_tpl->tpl_vars['mod']->value['avatars'];?>
" width="50"></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['email'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['dateReg'];?>
</td>
                                <td><a href="#">Повысить</a></td>
                                <td><a href="#">Удалить</a></td>
                            </tr>        
                      <?php
$_smarty_tpl->tpl_vars['mod'] = $__foreach_mod_1_saved_local_item;
}
if ($__foreach_mod_1_saved_item) {
$_smarty_tpl->tpl_vars['mod'] = $__foreach_mod_1_saved_item;
}
?>    
                  </tbody>
            </table>
        </section>
        
        
        <section>
            <h1 class="section-name">Создание аккаунта</h1>
            <div id="errors-create-account"></div>
				<h3 class="item-name email"><p>E-mail:</p><input type="text"><div class="errors" id="errorEmail"></div></h3>
				<h3 class="item-name password" ><p>Пароль:</p><input type="text" ><div class="errors"></div></h3>
				<h3 class="item-name levels"><label for="ban-toggle"><input class="toggle-input" type="checkbox"><span class="toggle admin-toggle"></span></label>Администратор</h3>
                <button class="create-account">Создать аккаунт</button>
        </section>       
  </div>
                  
        <!--\ Модальное окно для удаления аккаунтов -->    
	<div class="modal-background del" id="background">
		<div class="modal-container" id="modal">
			<p>Вы действительно хотите удалить аккаунт?</p>
                       <table class="striped contenttable-del-modal">
                  <thead>
                    <tr>
                        <th data-field="stat-number">ID</th>
                        <th data-field="avatar"></th>
                        <th data-field="email">E-mail</th>
                    </tr>
                  </thead>
                  <tbody>                
                    <tr class="del-account modal">
                      <td class="del-account-modal ids"></td>
                      <td class="del-account-modal avatars"></td>
                      <td class="del-account-modal email"></td>
                    </tr>        
                  </tbody>
            </table>
			<ul class="modal-buttons">
				<li><a href="#">Да</a></li>
				<li><a href="#">Отмена</a></li>
			</ul>
			<a href="#" class="modal-close">Close</a>
		</div>
	</div>
         <!-- Модальное окно для удаления аккаунтов /--> 
         
        <!--\ Модальное окно для повышения ранга до администратора -->    
	<div class="modal-background rung-adm" id="background">
		<div class="modal-container" id="modal">
			<p>Вы действительно хотите сделать данный аккаунт администратором?</p>
                       <table class="striped contenttable-del-modal">
                  <thead>
                    <tr>
                        <th data-field="stat-number">ID</th>
                        <th data-field="avatar"></th>
                        <th data-field="email">E-mail</th>
                    </tr>
                  </thead>
                  <tbody>                
                    <tr class="runkmod-account modal">
                      <td class="runkmod-account-modal ids"></td>
                      <td class="runkmod-account-modal avatars"></td>
                      <td class="runkmod-account-modal email"></td>
                    </tr>        
                  </tbody>
            </table>
			<ul class="modal-buttons runk-adm">
				<li><a href="#">Да</a></li>
				<li><a href="#">Отмена</a></li>
			</ul>
			<a href="#" class="modal-close">Close</a>
		</div>
	</div>
         <!-- Модальное окно для повышения ранга до администратора /-->  
      
        <!--\ Модальное окно для понияжения ранга да модератора -->    
	 <div class="modal-background rung-mod" id="background">
		<div class="modal-container" id="modal">
			<p>Вы действительно хотите сделать данный аккаунт модератором?</p>
                       <table class="striped contenttable-del-modal">
                  <thead>
                    <tr>
                        <th data-field="stat-number">ID</th>
                        <th data-field="avatar"></th>
                        <th data-field="email">E-mail</th>
                    </tr>
                  </thead>
                  <tbody>                
                    <tr class="runkadm-account modal">
                      <td class="runkadm-account-modal ids"></td>
                      <td class="runkadm-account-modal avatars"></td>
                      <td class="runkadm-account-modal email"></td>
                    </tr>        
                  </tbody>
            </table>
			<ul class="modal-buttons runk-mod">
				<li><a href="#">Да</a></li>
				<li><a href="#">Отмена</a></li>
			</ul>
			<a href="#" class="modal-close">Close</a>
		</div>
	</div>
         <!-- Модальное окно для понижения ранга до модератора /-->          
       <?php }
}
