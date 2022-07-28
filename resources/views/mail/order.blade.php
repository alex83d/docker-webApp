

Пользователь {{ $user->id }} заказал следующие товары: <br>
<hr>

<br>
@forelse($order->goods as $good)
    {{ $good->id }} {{ $good->title }}
@empty
    Нет товаров в заказе
    <hr>
@endforelse
