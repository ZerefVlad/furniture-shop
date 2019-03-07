@extends('layouts.app')
@section('content')
    @foreach ($products as $product)
        <div id="cart-item-{{$product['product']->id}}">
            <a href="{{route('show_single_product', [
            'product' => $product['product'],
            'category' => $product['product']->categories->first(),
            ])}}">
                <h2>{{$product['product']->title}}</h2>
            </a>
            <img width="300" height="200" src="{{$product['product']->getMainProductUrl()}}">

            <label for="">Quantity: </label>
            <input type="number" class="quantity-cart" data-id="{{$product['product']->id}}" required min="1" max="99"
                   value="{{$product['quantity']}}">
            <h2 class="price">Price: {{$product['price'] * $product['quantity']}}</h2>
            <h2>Discount: {{$product['discount']}}</h2>
            <button data-id="{{$product['product']->id}}" class="delete-product-cart">delete</button>
        </div>
    @endforeach

    @foreach($complexes as $complex)
        <div class="complex-item-{{$complex['complex_id']}}">
            <h2>{{$complex['product']->title}}</h2>

            <img width="300" height="200" src="{{$complex['product']->getMainProductUrl()}}">
            <p>Price: {{$complex['product']->getPriceWithDiscount()}}</p>
            <p>Скидка для основного продукта: {{$complex['product']->discount->value}}%</p>

            <h2>{{$complex['related_product']->title}}</h2>
            <img width="300" height="200" src="{{$complex['related_product']->getMainProductUrl()}}">
            <p>Price: {{
            (
             $complex['related_product']->getPriceWithDiscount()
              - $complex['related_product']->getPriceWithDiscount()
              * $complex['discount']/100) * $complex['quantity']}}</p>
            <p>Скидка для привязанного продукта: {{$complex['discount']}}%</p>
            <p>Kol-vo привязанного продукта: {{$complex['quantity']}}</p>

            <p class="complex_price">Complex price: {{$complex['price'] * $complex['total_quantity']}}</p>
            <input type="number" class="quantity-complex-cart" data-id="{{$complex['complex_id']}}" required min="1"
                   max="99" value="{{$complex['total_quantity']}}">
            <button data-id="{{$complex['complex_id']}}" class="delete-complex-cart">delete</button>

        </div>
    @endforeach

    <form action="{{route('submit_order')}}" method="get">
        {{csrf_field()}}
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name">
        <label for="second_name">Second name</label>
        <input type="text" name="second_name" id="second_name">
        <label for="middle_name">Middle name</label>
        <input type="text" name="middle_name" id="middle_name">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="mobile">Mobile phone</label>
        <input type="text" name="mobile" id="mobile">
        <label for="address">address</label>
        <input type="hidden" id='total-price-input' name="total" value="{{$total}}">
        <input type="text" name="address" id="address">
        <input type="submit" name="submit" id="submit" value="submit">
    </form>
    <p id="total-price">Total price: {{$total}}</p>
@endsection