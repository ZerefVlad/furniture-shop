@php
    $attributes = $product->getProductAttributes();
    $relatedProducts = $product->getRelatedProducts();
    $imgs = $product->getImages();
@endphp
@extends('layouts.app')
@section('content')
    <h1>{{$product->title}}</h1>
    <img width="300" height="200" src="{{$product->getMainProductUrl()}}">
    @foreach($imgs as $img)
        @if($img->url != $product->getMainProductUrl())
            <img width="100" height="100" src="{{$img->url}}">
        @endif
    @endforeach
    @foreach($attributes as $attribute)
        <h2>{{$attribute->attribute->title}} : {{$attribute->value}}</h2>
    @endforeach
    <form id="add-to-cart-form"></form>
    <input form="add-to-cart-form" type="hidden" name="product_id" value="{{$product->id}}">
    <input form="add-to-cart-form" type="number" name="quantity" value="1" min="1" max="99">
    <button id="add_to_cart" class="btn btn-success">add to cart blyat pizdec nahuy</button>
    @foreach($relatedProducts as $relatedProduct)
        <form id="related-product-cart-{{$relatedProduct->id}}"></form>
        <p>Купи комплект, жадоба:</p>
        <p>Количество хуйни: {{$relatedProduct->quantity}}</p>
        <p>Скидочка: {{$relatedProduct->discount}}</p>
        <p>Хоть название прочитай: {{$relatedProduct->relatedProduct->title}}</p>

        <p>а цена будет : {{$price =
        $product->getPriceWithDiscount() + (
        $relatedProduct->relatedProduct->getPriceWithDiscount() -
        $relatedProduct->relatedProduct->getPriceWithDiscount() *
        ($relatedProduct->discount/100)) * $relatedProduct->quantity
        }}</p>
        <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="complex_id"
               value="{{$relatedProduct->id}}">
        <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="quantity"
               value="{{$relatedProduct->quantity}}">
        <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="discount"
               value="{{$relatedProduct->discount}}">
        <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="related_product_id"
               value="{{$relatedProduct->relatedProduct->id}}">
        <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="product_id"
               value="{{$product->id}}">
        <button data-id="{{$relatedProduct->id}}" class="related-product-add btn btn-dark">Купить бомж-комплект</button>
    @endforeach
@endsection