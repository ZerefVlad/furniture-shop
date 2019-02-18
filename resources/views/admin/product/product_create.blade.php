@php
    /**    * @var App\Models\Product $product;    **/
    $product = isset($product) ? $product : null;
    $title = $product ? $product->title : '';
    $code = $product ? $product->code : '';
    $description = $product ? $product->description : '';
    $active = $product ? $product->active : 0;
    $url = $product ? route('product_edit_action', ['id' => $product->id]) : route('product_create_action');
    $discount = $product ? (!$product->discount ? 0 : $product->discount->value) : 0;
    $id = $product ? $product->id : 0;
@endphp
@extends('admin.dashboard')
@section ('content')
    @if (Session::has('update'))
        <div>
            <h3><p class="alert-success">{{Session::get('update')}}</p></h3>
        </div>
    @endif
    <div class="col-md-12">
        <form enctype="multipart/form-data" id="product-update-form" action="{{$url}}" method="post">
            {{csrf_field()}}
        </form>
            <label class="col-form-label" for="title">Title</label>
            <input form="product-update-form" type="text" name="title" value="{{$title}}" class="form-control">
            <label class="col-form-label" for="">Code</label>
            <input form="product-update-form" type="text" name="code" value="{{$code}}" class="form-control">
            <label class="col-form-label" for="">Description</label>
            <textarea form="product-update-form" name="description" id="" cols="30" rows="10" class="form-control">
        {{$description}}
    </textarea>
            <label class="form-check-label" for="">Active</label>
            <input form="product-update-form" class="form-control form-check" type="checkbox" name="active" value="{{$active}}"
                   @if ($active) checked="checked" @endif>

            <input form="product-update-form"  type="button" id="picture-add" value="Add Picture"/>
            <div class="images">
                @if ($images)
                    @foreach($images as $image)
                        <form id="update-picture-data-{{$image->id}}"></form>
                        <input form="update-picture-data-{{$image->id}}" type="text" name="title" value="{{$image->title}}">
                        <input form="update-picture-data-{{$image->id}}" type="text" name="alt" value="{{$image->alt}}">
                        <input form="update-picture-data-{{$image->id}}" type="hidden" name="code" value="{{$code}}">
                        <input form="update-picture-data-{{$image->id}}" type="hidden" name="id" value="{{$image->id}}">
                        <input form="update-picture-data-{{$image->id}}" type="hidden" name="product_id" value="{{$product->id}}">
                        <img src="{{$image->url}}" width="300" height="300">
                        <button form="update-picture-data-{{$image->id}}" class="update-img btn-primary">ОБНОВИТЬЬЬЬЬЬ</button>
                        <button form="update-picture-data-{{$image->id}}" class="btn-danger delete-img">Убрать нахуй</button>
                        <br>
                    @endforeach
                @endif
            </div>

            <select form="product-update-form"  multiple="multiple" name="categories[]">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>

            <input form="product-update-form"  type="button" id="attribute-add" value="Add Attribute"/>
            <div class="attributes">
                @if ($productAttributes)
                    @foreach($productAttributes as $attribute)
                        <form id="update-attribute-data-{{$attribute->id}}"></form>
                        <label for="">{{$attribute->title}}</label>
                        <input form="update-attribute-data-{{$attribute->id}}" type="text" name="value" @if ($attribute->values->first()) value="{{$attribute->values->first()->value}}" @endif>
                        <input form="update-attribute-data-{{$attribute->id}}" type="hidden" name="id" value="{{$attribute->id}}">
                        <input form="update-attribute-data-{{$attribute->id}}" type="hidden" name="product_id" value="{{$product->id}}">

                        <button form="update-attribute-data-{{$attribute->id}}" class="update-attribute btn-primary">ОБНОВИТЬ</button>
                        <button form="update-attribute-data-{{$attribute->id}}" class="btn-danger delete-attribute">Удалить</button>
                        <br>
                    @endforeach
                @endif
            </div>

            <input form="product-update-form"  type="number" name="discount_value" value="{{$discount}}" min="0" max="100">

            <input form="product-update-form"  type="button" id="related-prod-add" data-id="{{$id}}" value="Add Related Products"/>
            <div class="related-products">
                @if ($relatedProducts)

                    @foreach($relatedProducts as $relate)
                        <form id="update-product-related-data-{{$relate->id}}"></form>
                        <label for="">{{$relate->relatedProduct->title}}</label>
                        <input form="update-product-related-data-{{$relate->id}}" type="text" name="discount" value="{{$relate->discount}}">
                        <input form="update-product-related-data-{{$relate->id}}" type="text" name="quantity" value="{{$relate->quantity}}">
                        <input form="update-product-related-data-{{$relate->id}}" type="hidden" name="id" value="{{$relate->id}}">
                        <input form="update-product-related-data-{{$relate->id}}" type="hidden" name="main_product_id" value="{{$product->id}}">
                        <input form="update-product-related-data-{{$relate->id}}" type="hidden" name="related_product_id" value="{{$relate->relatedProduct->id}}">

                        <button form="update-product-related-data-{{$relate->id}}" class="update-product-related btn-primary">ОБНОВИТЬ</button>
                        <button form="update-product-related-data-{{$relate->id}}" class="btn-danger delete-product-related">Удалить</button>
                        <br>
                    @endforeach
                @endif
            </div>

            <input form="product-update-form"  form="" type="submit" value="Confirm" class="form-control">

    </div>
    <script src="{{asset('js/image-upload-form.js')}}"></script>
    <script src="{{asset('js/imageloader.js')}}"></script>
    <script src="{{asset('js/attribute-add-form.js')}}"></script>
    <script src="{{asset('js/related-product-add-form.js')}}"></script>
    <script src="{{asset('js/form-updater.js')}}"></script>
@endsection

