<?php
/* Smarty version 3.1.29, created on 2016-03-12 00:31:22
  from "/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/moderator/homeContent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e3392abb6b44_98442511',
  'file_dependency' => 
  array (
    'e7a75a8062f2f16a0289d50e34a363f5bbcc54b2' => 
    array (
      0 => '/var/www/mizapro/data/www/moneygame.mizapro.net/views/default/admin/moderator/homeContent.tpl',
      1 => 1457707943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e3392abb6b44_98442511 ($_smarty_tpl) {
?>
<div class="main">
        <nav class="top-nav"></nav>
        <section class="caption-section">
            <p>В этом разделе вы можете банить игроков</p>
        </section>
        <section>
            <h1 class="section-name">Управление</h1>
            <h3 class="item-name steam"><p>SteamId:</p><input type="text" placeholder="STEAM_0:1:100125515"><div class="errors"id="errorSteam"></div></h3>
	    <h3 class="item-name ban"><label for="ban-toggle">Бан<input id="ban-toggle"  class="toggle-input" type="checkbox"><span class="toggle"></span></label></h3>
            <div class="ban-items" style="display: none;">
            <h3 class="item-name author"><p>Забанил:</p><span class="ban-author">adm #112</span></h3>
	    <h3 class="item-name cause-banned" ><p>Причина бана:</p><input type="text"></h3>
            <h3 class="item-name unbanned"><p>Окончание бана:</p><input type="text" placeholder="1970-12-31 00:00:00"><div class="errors"id="errorSteam"></div></h3>
            </div>
        </section>МОДЕРАТОР
    </div>
<?php }
}
