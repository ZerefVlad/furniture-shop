@extends('admin.dashboard')

@section('content')
    {{--<a href="{{route('product_action_create')}}">create Product</a>--}}
    {{--@if (Session::has('product_delete_success'))--}}
        {{--<div class="alert-success">{{Session::get('product_delete_success')}}</div>--}}
    {{--@endif--}}
    <ul>
        @foreach($products as $product)
            <li>
                {{$product->title}}

                <a href="{{route('product_edit', ['id' => $product->id, 'title' => $product->title])}}">edit</a>
                {{--<a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>--}}

            </li>
        @endforeach
    </ul>
@endsection