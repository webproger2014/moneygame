
ЮЗЕР АККАУНТ
<div class="product_{$product['id']}">
    <img width="300" src="www/images/product/{$product['images']}">
    <p>id:{$product['id']}</p>
    <p>Цена: {$product['price']}</p>
    <p>Название: {$product['name']}</p>
    <p>Описание: {$product['description']}</p>
    {if $itemInCart} 
        <a href="#" style="display: none" class="addproduct_{$product['id']}" onclick="addProduct(this, {$product['id']})">Добавить</a>
        <a href="#" class="removeproduct_{$product['id']}" onclick="removProduct(this, {$product['id']})">Удалить</a>
    {else}
        <a href="#" class="addproduct_{$product['id']}" onclick="addProduct(this, {$product['id']})">Добавить</a>
        <a href="#" style="display: none" class="removeproduct_{$product['id']}" onclick="removProduct(this, {$product['id']})">Удалить</a>
    {/if} 
</div>