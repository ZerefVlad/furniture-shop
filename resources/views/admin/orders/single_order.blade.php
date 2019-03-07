@extends('admin.dashboard')
@php
//dd($orders);
@endphp
@section ('content')

    @if ($orders->getProducts())
        @foreach($orders->getProducts() as $product)
            {{dd($product)}}
        @endforeach
    @endif
    @if ($orders->getComplexes())
        @foreach($orders->getComplexes() as $complex)
        @endforeach
    @endif
    <h2>{{$orders->getUserData()->second_name}}</h2>
    <h2>{{$orders->getOrderTotal()}}</h2>
    <h2>{{$orders->getCreatedAt()}}</h2>




@endsection