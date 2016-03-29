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
                      {foreach $statistics as $playerStats}
                          <tr>
                          <td>{$playerStats['player_id']}</td>
                          <td>{$playerStats['name']}</td>
                          <td>{$playerStats['steam_id']}</td>
                          <td>{$playerStats['kills']}</td>
                          <td>{$playerStats['deaths']}</td>
                          <td>{$playerStats['suicides']}</td> 
                        </tr>
                       {/foreach} 
                  </tbody>
            </table>
        </section>
    </div>