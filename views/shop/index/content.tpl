     <!-- Отрисовываем меню -->
     <br><br>МЕНЮ
    <ul>     
       <!-- Категория -->
      {foreach $cat as $categories}
        <li><a href='#'>{$categories['name']}</a>
            <ul>
                <!-- Подгатегория -->
               {foreach $categories['subcat'] as $subcat}
                 <li><a href='#'>{$subcat['name']}</a>
                     <ul class="genre">
                         <!-- Жанр -->
                        {foreach $subcat['cat'] as $genre}
                          <li><a href="#" genre_id="{$genre['genre_id']}">{$genre['name']}</a></li>
                         {/foreach}
                     </ul>
                 </li>
                {/foreach}
            </ul>
        </li>
      {/foreach}
    </ul>

    <!-- Товар -->
    <div class="content">
    </div>