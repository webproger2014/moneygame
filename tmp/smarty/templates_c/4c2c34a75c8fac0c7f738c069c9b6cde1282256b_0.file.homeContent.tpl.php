<?php
/* Smarty version 3.1.29, created on 2016-03-08 13:47:51
  from "C:\wamp\www\moneygame.mizapro.net\views\default\user\unBanned\homeContent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56dec9f7dea409_99984110',
  'file_dependency' => 
  array (
    '4c2c34a75c8fac0c7f738c069c9b6cde1282256b' => 
    array (
      0 => 'C:\\wamp\\www\\moneygame.mizapro.net\\views\\default\\user\\unBanned\\homeContent.tpl',
      1 => 1457441236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56dec9f7dea409_99984110 ($_smarty_tpl) {
?>
   <div class="main">
        <nav class="top-nav"></nav>
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
    </div>
                        <?php }
}
