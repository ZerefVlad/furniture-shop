@php
    /**    * @var App\Models\Product $product;    **/
    $product = isset($product) ? $product : null;
    $title = $product ? $product->title : '';
    $code = $product ? $product->code : '';
    $description = $product ? $product->description : '';
    $active = $product ? $product->active : 0;
    $url = $product ? route('product_edit_action', ['id' => $product->id]) : route('product_create_action');
@endphp
@extends('admin.dashboard')
@section ('content')
    @if (Session::has('update'))
        <div>
            <h3><p class="alert-success">{{Session::get('update')}}</p></h3>
        </div>
    @endif
    <div class="col-md-8">
        <form enctype="multipart/form-data" action="{{$url}}" method="post">
            {{csrf_field()}}
            <label  class="col-form-label" for="title">Title</label>
            <input type="text" name="title" value="{{$title}}" class="form-control">
            <label  class="col-form-label" for="">Code</label>
            <input type="text" name="code" value="{{$code}}" class="form-control">
            <label  class="col-form-label" for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control">
        {{$description}}
    </textarea>
            <label class="form-check-label" for="">Active</label>
            <input class="form-control form-check" type="checkbox" name="active" value="{{$active}}" @if ($active) checked="checked" @endif>
            <input type="button" id="picture-add" value="Add Picture"/>
            <div class="images"></div>


            <input type="submit" value="Confirm" class="form-control">

        </form>
    </div>
    <script src="{{asset('js/image-upload-form.js')}}"></script>
    <script src="{{asset('js/imageloader.js')}}"></script>
@endsection

