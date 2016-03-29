  <div class="main">
        <nav class="top-nav"></nav>
        <section class="blocked-user-section">
         <p>Ваш Аккаунт заблокирован!{$infoUs['startBanDateTime']} - {$infoUs['exitBanDateTime']}| Причина:{$infoUs['causeBan']}</p>
        </section>           
        <section class="caption-section">
            <p>В этом разделе Вы можете изменить данные своего профиля</p>
        </section>
        <section>
            <h1 class="section-name">Настройки</h1>
            <h3 class="setting-name">SteamId:<span>{$infoUs['STEAM_ID']}</span><div class="errors"id="errorSteam"></div></h3>
            <h3 class="setting-name">E-mail:<span>{$infoUs['email']}</span><div class="errors" id="emailReg"></div></h3>
            <h3 class="setting-name">Ник: <span>{$infoUs['NICK_NAME']}</span><div class="errors" id="nickReg"></div></h3>
            <h3 class="setting-name">Пароль: <span>**********</span><div class="errors" id="errorPSW"></h3>
            <h3 class="setting-name">Payeer: <span>{$infoUs['payeer']}</span> (<a href="https://payeer.com/?partner=1390786" class="payeer-link" target="_blank">регистрация payeer</a>): <span></span><div class="errors" id="errorPayeer"></div></h3>
			<button class="delete-account">Удалить аккаунт</button>
		</section>
    </div>
	
	<div class="modal-background del" id="background">
		<div class="modal-container" id="modal">
			<p>Вы действительно хотите удалить аккаунт?</p>
			<ul class="modal-buttons">
				<li><a href="#" onclick="delAccount()">Да</a></li>
				<li><a href="#">Отмена</a></li>
			</ul>
			<a href="#" class="modal-close">Close</a>
		</div>
	</div>

