<?php
/* Smarty version 3.1.29, created on 2016-02-29 20:57:57
  from "C:\wamp\www\moneygame.mizapro.net\views\default\index\statistics.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56d4a2c51236f2_07635992',
  'file_dependency' => 
  array (
    'f9f62d9c8172f5184909a584d9ae2e2b63286c7f' => 
    array (
      0 => 'C:\\wamp\\www\\moneygame.mizapro.net\\views\\default\\index\\statistics.tpl',
      1 => 1456775867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d4a2c51236f2_07635992 ($_smarty_tpl) {
?>
  <div class="container">
        <section class="introduction-section">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum perspiciatis neque et molestiae cum placeat doloremque nisi, nesciunt inventore autem aut assumenda doloribus reprehenderit. Accusantium ad deserunt numquam nulla saepe.</p>
        </section>
        <section class="raiting-section">
           <h1 class="section-name">Статистика игроков</h1>
            <table class="striped">
                  <thead>
                    <tr>
                        <th data-field="stat-number">№</th>
                        <th data-field="name">Имя</th>
                        <th data-field="kills">STEAM_ID</th>
                        <th data-field="death">Убийств</th>
                        <th data-field="coef">Смертей</th>
                        <th data-field="coef">Самоуйбиств.</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
$_from = $_smarty_tpl->tpl_vars['statistics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_playerStats_0_saved_item = isset($_smarty_tpl->tpl_vars['playerStats']) ? $_smarty_tpl->tpl_vars['playerStats'] : false;
$_smarty_tpl->tpl_vars['playerStats'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['playerStats']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['playerStats']->value) {
$_smarty_tpl->tpl_vars['playerStats']->_loop = true;
$__foreach_playerStats_0_saved_local_item = $_smarty_tpl->tpl_vars['playerStats'];
?>
                          <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['playerStats']->value['player_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['playerStats']->value['name'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['playerStats']->value['steam_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['playerStats']->value['kills'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['playerStats']->value['deaths'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['playerStats']->value['suicides'];?>
</td> 
                        </tr>
                       <?php
$_smarty_tpl->tpl_vars['playerStats'] = $__foreach_playerStats_0_saved_local_item;
}
if ($__foreach_playerStats_0_saved_item) {
$_smarty_tpl->tpl_vars['playerStats'] = $__foreach_playerStats_0_saved_item;
}
?> 
                  </tbody>
            </table>
        </section>
    </div><?php }
}
