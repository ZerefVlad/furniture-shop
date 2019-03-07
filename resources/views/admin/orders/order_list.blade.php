@extends('admin.dashboard')
@section('content')

    {{--<a href="{{route('product_action_create')}}">create Product</a>--}}
    {{--@if (Session::has('product_delete_success'))--}}
    {{--<div class="alert-success">{{Session::get('product_delete_success')}}</div>--}}
    {{--@endif--}}
    <ul>

        @foreach($orders as $order)
            <li>
                @if ($order->getProducts())
                    @foreach($order->getProducts() as $product)

                    @endforeach
                @endif
                @if ($order->getComplexes())
                    @foreach($order->getComplexes() as $complex)
                    @endforeach
                @endif
                    <h2>{{$order->id}}</h2>
                    <h2>{{$order->getUserData()->second_name}}</h2>
                <h2>{{$order->getOrderTotal()}}</h2>
                <h2>{{$order->getCreatedAt()}}</h2>
                <a href="{{route('single_order', ['id' => $order->id])}}">подробнее</a>
                {{--<a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>--}}

            </li>
        @endforeach
    </ul>
@endsection