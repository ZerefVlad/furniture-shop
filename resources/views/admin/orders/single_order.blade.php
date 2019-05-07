@extends('admin.dashboard')
@php

@endphp
@section ('content')
    @if ($orders->getProductObjects())
        @foreach($orders->getProductObjects() as $product)
            {{$product['product']->title}}
            <img width="300" height="200" src="{{$product['product']->getMainProductUrl()}}">
        @endforeach
    @endif
    @if ($orders->getComplexes())
        @foreach($orders->getComplexes() as $complex)
        @endforeach
    @endif
    <h2>{{$orders->getUserData()->second_name}}</h2>
    <h2>{{$orders->getOrderTotal()}}</h2>
    <h2>{{$orders->getCreatedAt()}}</h2>
    <h3>{{$orders->status}}</h3>

    <select class="form-control" name="status" id="change-status-order-select">
        <option value="processing"@if($orders->status == 'processing') selected @endif>
            В обработке
        </option>
        <option value="ready"@if($orders->status == 'ready') selected @endif>
            Готов
        </option>
        <option value="canceled"@if($orders->status == 'canceled') selected @endif>
            Отменен
        </option>
    </select>
    <button id="change-status-order" data-id = "{{$orders->id}}"  class="change-status-order btn btn-dark">изменить статус заказа</button>



@endsection