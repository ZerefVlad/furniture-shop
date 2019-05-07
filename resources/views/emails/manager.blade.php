@if ($order->getProductObjects())
    @foreach($order->getProductObjects() as $product)
        <h3>Название продукта: {{$product['product']->title}}</h3>
    @endforeach
@endif
@if ($order->getComplexesObjects())
    @foreach($order->getComplexesObjects() as $complex)
        <h3>Название основного продукста: {{$complex['product']->title}}</h3>
        <h3>Название доп продукта: {{$complex['related_product']->title}}</h3>

    @endforeach
@endif
<h2>Номер заказа:{{$order->id}}</h2>
<h2>Статус заказа: {{$order->status}}</h2>
<h2>Фамилия заказчика: {{$order->getUserData()->second_name}}</h2>
<h2>Сумма: {{$order->getOrderTotal()}}</h2>
<h2>Время заказа: {{$order->getCreatedAt()}}</h2>