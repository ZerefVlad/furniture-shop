@extends('layouts.app')
@section('content')
    <ul>
        @foreach($products as $product)
            <li><a href="{{route('product_edit', ['id' => $product->id])}}">{{$product->title}}</a></li>
        @endforeach
    </ul>
@endsection