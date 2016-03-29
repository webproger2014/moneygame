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
                      {foreach $listadm as $admin}                 
                            <tr class="table-accounts admin" id="{$admin['ID']}">
                                <td>{$admin['ID']}</td>
                                <td><img src="www/images/avatars/{$admin['avatars']}" width="50"></td>
                                <td>{$admin['email']}</td>
                                <td>{$admin['dateReg']}</td>
                                <td><a href="#">Понизить</a></td>
                                <td><a href="#">Удалить</a></td>
                            </tr>        
                      {/foreach}
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
                      {foreach $listmod as $mod}                 
                            <tr class="table-accounts mod" id="{$mod['ID']}">
                                <td>{$mod['ID']}</td>
                                <td><img src="www/images/avatars/{$mod['avatars']}" width="50"></td>
                                <td>{$mod['email']}</td>
                                <td>{$mod['dateReg']}</td>
                                <td><a href="#">Повысить</a></td>
                                <td><a href="#">Удалить</a></td>
                            </tr>        
                      {/foreach}    
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
       