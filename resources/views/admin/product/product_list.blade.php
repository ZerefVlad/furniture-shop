@extends('admin.admin-page')

@section('content')
    {{--<a href="{{route('product_action_create')}}">create Product</a>--}}
    {{--@if (Session::has('product_delete_success'))--}}
        {{--<div class="alert-success">{{Session::get('product_delete_success')}}</div>--}}
    {{--@endif--}}

    <a href="{{route('create_product')}}">
        <h1 style="    font-family: Montserrat;    font-size: 22px;    font-weight: 700;    margin: 30px;    text-align: center;">
            Создать продукт
        </h1>
    </a>

{{--    @if (Session::has('post_delete_success'))--}}
{{--        <div class="alert-success">{{Session::get('post_delete_success')}}</div>--}}
{{--    @endif--}}



    <div class="tab-content" id="tab-content">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <table class="rate-table">
                    <thead>
                    <tr>
                        <th scope="col">Картинка товара</th>
                        <th scope="col">Название товара</th>
                        <th scope="col">Цена товара</th>
                        <th scope="col">Изменить</th>
{{--                        <th scope="col">Удалить</th>--}}

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td > <img width=200px" height="200px" src="{{$product->getImages()->first() ? $product->getImages()->first()->url : '#'}}"> </td>
                            <td style="vertical-align: middle;"> {{$product->title}}</td>
                            <td style="vertical-align: middle;"> {{$product->getPriceWithDiscount()}} грн.</td>
                            <td style="vertical-align: middle;"><a href="{{route('product_edit', ['product' => $product])}}">Изменить</a></td>
                            <td style="vertical-align: middle;"> <a style="    color: #eb1717;" href="{{route('product_delete', ['product' => $product])}}">Удалить</a></td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>






{{--    <ul>--}}
{{--        <li><a href="{{route('create_product')}}">Create new Blyadskiy product</a></li>--}}
{{--        @foreach($products as $product)--}}
{{--            <li>--}}
{{--                {{$product->title}}--}}

{{--                <a href="{{route('product_edit', ['product' => $product])}}">edit</a>--}}
{{--                <a href="{{route('product_delete', ['product' => $product])}}">delete</a>--}}

{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection