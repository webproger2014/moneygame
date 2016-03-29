<?php
/* Smarty version 3.1.29, created on 2016-03-13 21:40:38
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/banned/homeContent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e5b4261d85f5_43796547',
  'file_dependency' => 
  array (
    '6d2acb8f9d07448a1c576fc27de50ed35c397259' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/user/banned/homeContent.tpl',
      1 => 1457539239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e5b4261d85f5_43796547 ($_smarty_tpl) {
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
