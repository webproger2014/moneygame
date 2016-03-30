
<!-- SEARC TO PRODUCT-->
 <div class="search">
   <input type="text">
   <button href-search="">Поиск</button>
   
    <ul class="categories-search">     
       <!-- Категория -->
      {foreach $cat as $categories}
        <li><a href='#' cat-id="{$categories['parent_id']}">{$categories['name']}</a>
            <ul class="subcategories-search">
                <!-- Подгатегория -->
               {foreach $categories['subcat'] as $subcat}
                 <li><a href='#' cat-id="{$subcat['subcategory_id']}">{$subcat['name']}</a>
                     <ul class="genre-search">
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
 </div>

<!-- Отрисовываем меню -->
   <div class="wrapper">
    <ul class="categories">     
       <!-- Категория -->
      {foreach $cat as $categories}
        <li><a href='#'>{$categories['name']}</a>
            <ul class="subcategories">
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
   </div>
    <!-- Товар -->
    <div class="content">
    </div>