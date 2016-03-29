   <div class="main">
        <nav class="top-nav"></nav>
        <section class="blocked-user-section">
         <p>Ваш Аккаунт заблокирован!{$infoUs['startBanDateTime']} - {$infoUs['exitBanDateTime']}| Причина:{$infoUs['causeBan']}</p>
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
                          <td>{$player['player_id']}</td>
                          <td>{$player['name']}</td>
                          <td>{$player['steam_id']}</td>
                          <td>{$player['kills']}</td>
                          <td>{$player['deaths']}</td>
                          <td>{$player['suicides']}</td> 
                        </tr>
                  </tbody>
            </table>
        </section>
    </div>