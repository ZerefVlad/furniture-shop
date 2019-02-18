@php
    $attributes = $product->productAttributes;
@endphp
@extends('layouts.app')
@section('content')
    <h1>{{$product->title}}</h1>
    @foreach($attributes as $attribute)
        <h2>{{$attribute->title}} : {{$attribute->values->first()->value}}</h2>
    @endforeach
    <form id="add-to-cart-form"></form>
    <input form="add-to-cart-form" type="hidden" name="product_id" value="{{$product->id}}">
    <input form="add-to-cart-form" type="number" name="quantity" value="1" min="1" max="99">
    <button id="add_to_cart" class="btn btn-success">add to cart blyat pizdec nahuy</button>

@endsection