<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{asset('js/comment.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="sidebar">
                <a href="{{route('user_list')}}">Users</a>
                <a href="{{route('category_list')}}">Categories</a>
                <a href="{{route('post_list')}}">Posts</a>
                <a href="{{route('attribute_list')}}">Attribute</a>
                <a href="{{route('product_list')}}">Products</a>
                <a href="{{route('order_list')}}">Orders</a>
                <a href="{{route('main_page_create')}}">Main Page</a>
                <a href="{{route('comment_list')}}">Comment</a>
                <a href="{{route('subscribers')}}">Рассылка</a>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>




