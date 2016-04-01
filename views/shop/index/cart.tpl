
{if $products}
    <table>
      <tr>
          <td>id</td>
          <td>img</td>
          <td>название</td>
          <td>цена</td>
          <td>действие</td>
      </tr>
      
      {foreach $products as $product}
          <tr class="product_{$product['id']}" id="{$product['id']}">
            <td>{$product['id']}</td>
            <td><img width="100" src="www/images/product/{$product['images']}"></td>  
            <td>{$product['name']}</td>
            <td class="price">{$product['price']}</td>
            <td> 
              <a href="#" style="display: none" class="addproduct_{$product['id']}" onclick="addProduct(this, {$product['id']})">Добавить</a>
              <a href="#" class="removeproduct_{$product['id']}" onclick="removProduct(this, {$product['id']})">Удалить</a>
            </td> 
          </tr>
      {/foreach}
    </table>
      Итого :<p id="summa">{$summa}</p>
{else}
    В корзине нет добавленных товаров
{/if}