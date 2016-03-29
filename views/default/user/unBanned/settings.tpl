  <div class="main">
        <nav class="top-nav"></nav>     
        <section class="caption-section">
            <p>В этом разделе Вы можете изменить данные своего профиля</p>
        </section>
        <section>
            <h1 class="section-name">Настройки</h1>
            <h3 class="setting-name">SteamId:<span onclick="createInputSteam(this)">{$infoUs['STEAM_ID']}</span><div class="errors"id="errorSteam"></div></h3>
            <h3 class="setting-name">E-mail:<span onclick="createInputEmail(this)">{$infoUs['email']}</span><div class="errors" id="errorEmail"></div></h3>
            <h3 class="setting-name">Ник: <span onclick="createInputNick(this)">{$infoUs['NICK_NAME']}</span><div class="errors" id="errorNick"></div></h3>
            <h3 class="setting-name">Пароль: <span onclick="createInputPsw(this)">**********</span><div class="errors" id="errorPsw"></h3>
            <h3 class="setting-name">Payeer: <span>{$infoUs['payeer']}</span> (<a href="https://payeer.com/?partner=1390786" class="payeer-link" target="_blank">регистрация payeer</a>): <span></span><div class="errors" id="errorPayeer"></div></h3>
			<button class="delete-account">Удалить аккаунт</button>
		</section>
    </div>
	
	<div class="modal-background del" id="background">
		<div class="modal-container" id="modal">
			<p>Вы действительно хотите удалить аккаунт?</p>
			<ul class="modal-buttons del">
                             <li><a href="#" >Да</a></li>
		             <li><a href="#">Отмена</a></li>
			</ul>
			<a href="#" class="modal-close del">Close</a>
		</div>
	</div>
