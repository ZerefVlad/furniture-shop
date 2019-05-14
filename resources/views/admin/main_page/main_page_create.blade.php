@php

@endphp
@extends('admin.admin-page')
@section ('content')

{{--    <form enctype="multipart/form-data" id="main-page-update-form" action="{{route('addPictureSlider')}}" method="post">--}}
{{--        {{csrf_field()}}--}}
{{--    </form>--}}

    <h1>block 1</h1>
    <form method="post" action="{{route('first-block')}}" enctype="multipart/form-data" id="block1-form">        {{csrf_field()}}
    </form>
    <button id="add-text-slide">Add blyad slide</button>
    <div class="text-slides"></div>
    <button id="add-video-slide">Add hyy slide</button>
    <div class="video-slides"></div>

<input type="submit" form="block1-form" value="Blcok 1">


<h1>block 2</h1>
<form method="post" action="{{route('second-block')}}" enctype="multipart/form-data" id="block2-form">        {{csrf_field()}}
</form>
<p>Титулка</p>
<input form="block2-form" name="title" required type="text">
<p>Описание</p>
<textarea required form="block2-form" name="description"></textarea>
<input form="block2-form" name="image" type="file" required>
<p>Титулка</p>
<input form="block2-form" name="title2" required type="text">
<p>Описание</p>
<textarea required form="block2-form" name="description2"></textarea>
<input form="block2-form" name="image2" type="file" required>
<p>Url</p>
<input form="block2-form" name="url" type="text">
<input type="submit" form="block2-form" value="Block 2">

<h1>block 2</h1>
<form method="post" action="{{route('third-block')}}" enctype="multipart/form-data" id="block3-form">        {{csrf_field()}}
</form>
<input name="video" type="text" form="block3-form">
<input type="submit" form="block3-form" value="Block 3">

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



{{--        <input form="main-page-update-form"  form="" type="submit" value="Confirm" class="form-control">--}}

    {{--</div>--}}


    <script src="{{asset('js/image-upload-form.js')}}"></script>
    <script src="{{asset('js/imageloader.js')}}"></script>
    <script src="{{asset('js/attribute-add-form.js')}}"></script>
    <script src="{{asset('js/related-product-add-form.js')}}"></script>
    <script src="{{asset('js/form-updater.js')}}"></script>


    <script src="{{asset('js/main-page-builder.js')}}"></script>

@endsection

