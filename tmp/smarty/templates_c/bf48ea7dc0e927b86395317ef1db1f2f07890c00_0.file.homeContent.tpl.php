<?php
/* Smarty version 3.1.29, created on 2016-03-03 20:43:01
  from "C:\wamp\www\moneygame.mizapro.net\views\default\user\Banned\homeContent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56d893c5850c20_40179649',
  'file_dependency' => 
  array (
    'bf48ea7dc0e927b86395317ef1db1f2f07890c00' => 
    array (
      0 => 'C:\\wamp\\www\\moneygame.mizapro.net\\views\\default\\user\\Banned\\homeContent.tpl',
      1 => 1457034180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d893c5850c20_40179649 ($_smarty_tpl) {
?>
   <div class="main">
        <nav class="top-nav"></nav>
        <section class="blocked-user-section">
         <p>Ваш Аккаунт заблокирован!<?php echo $_smarty_tpl->tpl_vars['infoUs']->value['startBanDateTime'];?>
 - <?php echo $_smarty_tpl->tpl_vars['infoUs']->value['exitBanDateTime'];?>
| Причина:<?php echo $_smarty_tpl->tpl_vars['infoUs']->value['causeBan'];?>
</p>
        </section>         
        <section class="caption-section">
            <p>В этом разделе отображается ваша подробная статистика как игрока</p>
        </section>
        <section>
            <h1 class="section-name">Статистика</h1>
            <table class="striped profile-statistics">
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
                          <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['player']->value['player_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['player']->value['name'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['player']->value['steam_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['player']->value['kills'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['player']->value['deaths'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['player']->value['suicides'];?>
</td> 
                        </tr>
                  </tbody>
            </table>
        </section>
    </div><?php }
}
