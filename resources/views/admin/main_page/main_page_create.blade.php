@php

@endphp
@extends('admin.dashboard')
@section ('content')

    <form enctype="multipart/form-data" id="main-page-update-form" action="{{route('addPictureSlider')}}" method="post">
        {{csrf_field()}}
    </form>


        <input form="main-page-update-form"  type="button" id="picture-add-main-page" value="Add Picture"/>
        <div class="images">
            @if ($images)
                @foreach($images as $image)
                    <form id="update-picture-data-{{$image->id}}"></form>
                    <input form="update-picture-data-{{$image->id}}" type="text" name="title" value="{{$image->title}}">
                    <input form="update-picture-data-{{$image->id}}" type="text" name="alt" value="{{$image->alt}}">
                    <input form="update-picture-data-{{$image->id}}" type="text" name="url_tovara" value="{{$url_tovara}}">
                    <img src="{{$image->url}}" width="300" height="300">
                    <button form="update-picture-data-{{$image->id}}" class="update-img btn-primary">ОБНОВИТЬЬЬЬЬЬ</button>
                    <button form="update-picture-data-{{$image->id}}" class="btn-danger delete-img">Убрать </button>
                    <br>
                @endforeach
            @endif
        </div>


        {{--<input form="product-update-form"  type="button" id="attribute-add" value="Add Attribute"/>--}}
        {{--<div class="attributes">--}}
            {{--@if ($productAttributes)--}}
                {{--@foreach($productAttributes as $attribute)--}}
                    {{--<form id="update-attribute-data-{{$attribute->attribute->id}}"></form>--}}
                    {{--<label for="">{{$attribute->attribute->title}}</label>--}}
                    {{--<input form="update-attribute-data-{{$attribute->attribute->id}}" type="text" name="value" value="{{$attribute->value}}">--}}
                    {{--<input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden" name="id" value="{{$attribute->attribute->id}}">--}}
                    {{--<input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden" name="product_id" value="{{$product->id}}">--}}

                    {{--<button form="update-attribute-data-{{$attribute->attribute->id}}" class="update-attribute btn-primary">ОБНОВИТЬ</button>--}}
                    {{--<button form="update-attribute-data-{{$attribute->attribute->id}}" class="btn-danger delete-attribute">Удалить</button>--}}
                    {{--<br>--}}
                {{--@endforeach--}}
            {{--@endif--}}
        {{--</div>--}}



        <input form="main-page-update-form"  form="" type="submit" value="Confirm" class="form-control">

    {{--</div>--}}


    <script src="{{asset('js/image-upload-form.js')}}"></script>
    <script src="{{asset('js/imageloader.js')}}"></script>
    <script src="{{asset('js/attribute-add-form.js')}}"></script>
    <script src="{{asset('js/related-product-add-form.js')}}"></script>
    <script src="{{asset('js/form-updater.js')}}"></script>
@endsection

