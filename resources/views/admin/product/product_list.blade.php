@extends('admin.dashboard')

@section('content')
    {{--<a href="{{route('product_action_create')}}">create Product</a>--}}
    {{--@if (Session::has('product_delete_success'))--}}
        {{--<div class="alert-success">{{Session::get('product_delete_success')}}</div>--}}
    {{--@endif--}}
    <ul>
        <li><a href="{{route('create_product')}}">Create new Blyadskiy product</a></li>
        @foreach($products as $product)
            <li>
                {{$product->title}}

                <a href="{{route('product_edit', ['product' => $product])}}">edit</a>
                {{--<a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>--}}

            </li>
        @endforeach
    </ul>
@endsection