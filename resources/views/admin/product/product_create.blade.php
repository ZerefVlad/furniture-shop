@php
    /**    * @var App\Models\Product $product;    **/
    $product = isset($product) ? $product : null;
    $title = $product ? $product->title : '';
    $code = $product ? $product->code : '';
    $description = $product ? $product->description : '';
    $active = $product ? $product->active : 0;
    $url = $product ? route('product_edit_action', ['product' => $product]) : route('product_create_action');
    $discount = $product ? (!$product->discount ? 0 : $product->discount->value) : 0;
    $id = $product ? $product->id : 0;
    $price = $product ? $product->getPriceWithoutDiscount() : 0;
    $selectedColors = $product ? $product->colors : null;
    $selectedColorIds = [];
    if ($selectedColors) {
        foreach ($selectedColors as $color) {
            $selectedColorIds[] = $color->id;
        }
    }
@endphp
@extends('admin.admin-page')
@section ('content')


    <div class="row users-data">
        <div class="col-12 col-md-12 user-item">
            <h1 style="    font-family: Montserrat;    font-size: 22px;    font-weight: 700;    margin: 30px;    text-align: center;">
                Введите товар
            </h1>
            <div class="users-info">


                @if (Session::has('update'))
                    <div>
                        <h3><p class="alert-success">{{Session::get('update')}}</p></h3>
                    </div>
                @endif
                <form class="change-form " enctype="multipart/form-data" id="product-update-form" action="{{$url}}"
                      method="post">
                    {{csrf_field()}}
                </form>

                <ul class="data-list">

                    <li class="list-item col-md-6">
                        <label class="col-form-label" for="title">Название товара</label>
                        <input form="product-update-form" type="text" name="title" value="{{$title}}"
                               class="form-control">
                    </li>
                    <li class="list-item col-md-6">
                        <label class="col-form-label" for="code">Код</label>
                        <input form="product-update-form" type="text" name="code" value="{{$code}}"
                               class="form-control">

                    </li>

                    <li class="list-item col-md-12">
                        <label class="col-form-label" for="description" style="margin-right: 25px">Описание</label>
                        <textarea form="product-update-form" name="description" id="" cols="30" rows="5"
                                  class="form-control">
                                 {{$description}}
                            </textarea>
                    </li>


                    <li class="list-item col-md-6">
                        <label class="form-check-label" for="" style="margin-right: 30px">Цена: </label>


                        <input form="product-update-form" name="price" value="{{$price}}">
                        {{--                                    <input style=" width:100px;" form="update-attribute-data-{{$attribute->attribute->id}}" type="text" name="value" value="{{$attribute->value}}">--}}
                        {{--                                    <input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden" name="id" value="{{$attribute->attribute->id}}">--}}
                        {{--                                    <input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden" name="product_id" value="{{$product->id}}">--}}

                        {{--                                    <button form="update-attribute-data-{{$attribute->attribute->id}}" class="update-attribute btn-primary">Обновить цену</button>--}}

                        {{--                                    <br>--}}

                    </li>

                    <li class="list-item col-md-6">
                        <label class="form-check-label" for="">Активность товара</label>
                        <input form="product-update-form" class="form-control form-check" type="checkbox" name="active"
                               value="{{$active}}"
                               @if ($active) checked="checked" @endif>
                    </li>

                    <li class="list-item col-md-6">
                        <label class="form-check-label" for="" style="margin-right: 30px">Категория товара</label>
                        <select form="product-update-form" multiple="multiple" name="categories[]">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if ($product && in_array($category->id, $product->getCategoryIds())) selected @endif>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </li>

                    <li class="list-item col-md-6">
                        <label class="form-check-label" for="" style="margin-right: 30px">Скидка на товар</label>
                        <input form="product-update-form" type="number" name="discount_value" value="{{$discount}}"
                               min="0" max="100">
                    </li>
                    <li class="list-item col-md-6">
                        <div class="related-products">
                            <input form="product-update-form" type="button" id="related-prod-add" data-id="{{$id}}"
                                   value="Добавить доп. товар"/>
                            @if ($relatedProducts)
                                @foreach($relatedProducts as $relate)
                                    <form id="update-product-related-data-{{$relate->id}}"></form>
                                    <p style="    padding: .375rem .75rem;    font-size: 1rem;    font-weight: 400;    line-height: 1.5;">
                                        Название доп. товара: <label for=""
                                                                     style="">{{$relate->relatedProduct->title}}</label>
                                    </p>
                                    <label class="form-check-label" for="" style="margin-right: 30px">Скидка на доп.
                                        товар %</label>
                                    <input form="update-product-related-data-{{$relate->id}}" type="text"
                                           name="discount" value="{{$relate->discount}}">
                                    <label class="form-check-label" for="" style="margin-right: 30px">Количество доп.
                                        товарa</label>
                                    <input form="update-product-related-data-{{$relate->id}}" type="text"
                                           name="quantity" value="{{$relate->quantity}}">
                                    <input form="update-product-related-data-{{$relate->id}}" type="hidden" name="id"
                                           value="{{$relate->id}}">
                                    <input form="update-product-related-data-{{$relate->id}}" type="hidden"
                                           name="main_product_id" value="{{$product->id}}">
                                    <input form="update-product-related-data-{{$relate->id}}" type="hidden"
                                           name="related_product_id" value="{{$relate->relatedProduct->id}}">

                                    <button style="margin-left: 5%" form="update-product-related-data-{{$relate->id}}"
                                            class="update-product-related btn-primary">ОБНОВИТЬ
                                    </button>
                                    <button form="update-product-related-data-{{$relate->id}}"
                                            class="btn-danger delete-product-related">Удалить
                                    </button>
                                    <br>
                                @endforeach
                            @endif
                        </div>
                    </li>

                    <li class="list-item col-md-6">

                        <div class="attributes">
                            <input form="product-update-form" type="button" id="attribute-add" value="Add Attribute"/>
                            @if ($productAttributes)
                                @foreach($productAttributes as $attribute)
                                    @if($attribute->attribute->title != 'price')
                                        <form id="update-attribute-data-{{$attribute->attribute->id}}"></form>
                                        <label style="margin-top:3%" for="">{{$attribute->attribute->title}}</label>
                                        <input style="width: 100px"
                                               form="update-attribute-data-{{$attribute->attribute->id}}" type="text"
                                               name="value" value="{{$attribute->value}}">
                                        <input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden"
                                               name="id" value="{{$attribute->attribute->id}}">
                                        <input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden"
                                               name="product_id" value="{{$product->id}}">

                                        <button form="update-attribute-data-{{$attribute->attribute->id}}"
                                                class="update-attribute btn-primary">ОБНОВИТЬ
                                        </button>
                                        <button form="update-attribute-data-{{$attribute->attribute->id}}"
                                                class="btn-danger delete-attribute">Удалить
                                        </button>
                                        <br>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </li>


                    <li class="list-item col-md-6">
                        <select form="product-update-form" class="form-control" style="width:100px;height:200px;" multiple
                                name="colors[]" id="">
                            @foreach($colors as $color)
                                <option value="{{$color->id}}" @if (in_array($color->id, $selectedColorIds)) selected
                                        @endif
                                        style="background-image: url('{{$color->getImage() ? $color->getImage()->url : ''}}')">
                                    <p style="color: #ff0000;">  {{$color->title}}</p>
                                </option>
                            @endforeach
                        </select>
                    </li>

                    <li class="list-item col-md-6"
                        style="border-radius: 5px;box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);">


                        <div class="images">
                            <input form="product-update-form" type="button" id="picture-add" value="Add Picture"/>
                            @if ($images)
                                @foreach($images as $image)
                                    <form id="update-picture-data-{{$image->id}}"></form>
                                    <img style="margin-left: 0%; margin-bottom: 5px" src="{{$image->url}}" width="300"
                                         height="300">
                                    <label class="form-check-label col-md-6" for="">Title image</label>
                                    <input form="update-picture-data-{{$image->id}}" type="text" name="title"
                                           value="{{$image->title}}">
                                    <label class="form-check-label col-md-6" for="">Alt_image</label>
                                    <input form="update-picture-data-{{$image->id}}" type="text" name="alt"
                                           value="{{$image->alt}}">

                                    <input form="update-picture-data-{{$image->id}}" type="hidden" name="code"
                                           value="{{$code}}">
                                    <input form="update-picture-data-{{$image->id}}" type="hidden" name="id"
                                           value="{{$image->id}}">
                                    <input form="update-picture-data-{{$image->id}}" type="hidden" name="product_id"
                                           value="{{$product->id}}">

                                    <button style="margin: 4% 5% 5% 0% " form="update-picture-data-{{$image->id}}"
                                            class="update-img btn-primary">ОБНОВИТЬЬЬЬЬЬ
                                    </button>
                                    <button form="update-picture-data-{{$image->id}}" class="btn-danger delete-img">
                                        Delete
                                    </button>
                                    <br>
                                @endforeach
                            @endif
                        </div>

                    </li>

                    <li class="list-item col-md-6"
                        style="border-radius: 5px;box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);">

                        <div class="videos">
                            <input type="button" id="video-add" value="add-video">
                            @if ($videos)
                                @foreach($videos as $video)
                                    <div id="select-video-{{$video}}" style="margin-top: 10px">


                                        <iframe type="text/html" width="300px" height="150px"
                                                src="http://www.youtube.com/embed/{{$video}}" frameborder="0"></iframe>
                                        <input form="product-update-form" type="text" name="videos[]"
                                               value="{{$video}}">
                                        <button form="product-update-form" class="btn-danger delete-video"
                                                data-id="{{$video}}">Delete
                                        </button>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </li>


                </ul>
                <div class="button-group">

                    <input type="submit" form="product-update-form" class="btn save" style="width: 150px;    -webkit-border-radius: 21px;    border-radius: 21px;
                                background-color: #09b81b; color: #ffffff; padding: 10px; font-family: Montserrat; font-size: 14px;
                                font-weight: 600; line-height: 1;"/>

                    <a href="{{route('product_list')}}" class="btn cancel">Отмена</a>
                </div>

            </div>

        </div>

    </div>



    {{--    @if (Session::has('update'))--}}
    {{--        <div>--}}
    {{--            <h3><p class="alert-success">{{Session::get('update')}}</p></h3>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    {{--    <div class="col-md-12">--}}
    {{--        <form enctype="multipart/form-data" id="product-update-form" action="{{$url}}" method="post">--}}
    {{--            {{csrf_field()}}--}}
    {{--        </form>--}}
    {{--            <label class="col-form-label" for="title">Title</label>--}}
    {{--            <input form="product-update-form" type="text" name="title" value="{{$title}}" class="form-control">--}}
    {{--            <label class="col-form-label" for="">Code</label>--}}
    {{--            <input form="product-update-form" type="text" name="code" value="{{$code}}" class="form-control">--}}
    {{--            <label class="col-form-label" for="">Description</label>--}}
    {{--            <textarea form="product-update-form" name="description" id="" cols="30" rows="10" class="form-control">--}}
    {{--        {{$description}}--}}
    {{--    </textarea>--}}
    {{--            <label class="form-check-label" for="">Active</label>--}}
    {{--            <input form="product-update-form" class="form-control form-check" type="checkbox" name="active" value="{{$active}}"--}}
    {{--                   @if ($active) checked="checked" @endif>--}}

    {{--            <input form="product-update-form"  type="button" id="picture-add" value="Add Picture"/>--}}
    {{--            <div class="images">--}}
    {{--                @if ($images)--}}
    {{--                    @foreach($images as $image)--}}
    {{--                        <form id="update-picture-data-{{$image->id}}"></form>--}}
    {{--                        <input form="update-picture-data-{{$image->id}}" type="text" name="title" value="{{$image->title}}">--}}
    {{--                        <input form="update-picture-data-{{$image->id}}" type="text" name="alt" value="{{$image->alt}}">--}}
    {{--                        <input form="update-picture-data-{{$image->id}}" type="hidden" name="code" value="{{$code}}">--}}
    {{--                        <input form="update-picture-data-{{$image->id}}" type="hidden" name="id" value="{{$image->id}}">--}}
    {{--                        <input form="update-picture-data-{{$image->id}}" type="hidden" name="product_id" value="{{$product->id}}">--}}
    {{--                        <img src="{{$image->url}}" width="300" height="300">--}}
    {{--                        <button form="update-picture-data-{{$image->id}}" class="update-img btn-primary">ОБНОВИТЬЬЬЬЬЬ</button>--}}
    {{--                        <button form="update-picture-data-{{$image->id}}" class="btn-danger delete-img">Delete</button>--}}
    {{--                        <br>--}}
    {{--                    @endforeach--}}
    {{--                @endif--}}
    {{--            </div>--}}

    {{--        <input type="button" id="video-add" value="add-video">--}}
    {{--        <div class="videos">--}}
    {{--            @if ($videos)--}}
    {{--                @foreach($videos as $video)--}}
    {{--                    <div id="select-video-{{$video}}">--}}
    {{--                    <input form="product-update-form" type="text" name="videos[]" value="{{$video}}">--}}

    {{--                    <iframe type = "text/html" width = "640" height = "385" src = "http://www.youtube.com/embed/{{$video}}" frameborder = "0" ></iframe>--}}

    {{--                    <button form="product-update-form" class="btn-danger delete-video" data-id="{{$video}}">Delete</button>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            @endif--}}

    {{--        </div>--}}

    {{--            <select form="product-update-form"  multiple="multiple" name="categories[]">--}}
    {{--                @foreach($categories as $category)--}}
    {{--                    <option value="{{$category->id}}" @if ($product && in_array($category->id, $product->getCategoryIds())) selected @endif>{{$category->title}}</option>--}}
    {{--                @endforeach--}}
    {{--            </select>--}}

    {{--            <input form="product-update-form"  type="button" id="attribute-add" value="Add Attribute"/>--}}
    {{--            <div class="attributes">--}}
    {{--                @if ($productAttributes)--}}
    {{--                    @foreach($productAttributes as $attribute)--}}
    {{--                        <form id="update-attribute-data-{{$attribute->attribute->id}}"></form>--}}
    {{--                        <label for="">{{$attribute->attribute->title}}</label>--}}
    {{--                        <input form="update-attribute-data-{{$attribute->attribute->id}}" type="text" name="value" value="{{$attribute->value}}">--}}
    {{--                        <input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden" name="id" value="{{$attribute->attribute->id}}">--}}
    {{--                        <input form="update-attribute-data-{{$attribute->attribute->id}}" type="hidden" name="product_id" value="{{$product->id}}">--}}

    {{--                        <button form="update-attribute-data-{{$attribute->attribute->id}}" class="update-attribute btn-primary">ОБНОВИТЬ</button>--}}
    {{--                        <button form="update-attribute-data-{{$attribute->attribute->id}}" class="btn-danger delete-attribute">Удалить</button>--}}
    {{--                        <br>--}}
    {{--                    @endforeach--}}
    {{--                @endif--}}
    {{--            </div>--}}

    {{--            <input form="product-update-form"  type="number" name="discount_value" value="{{$discount}}" min="0" max="100">--}}

    {{--            <input form="product-update-form"  type="button" id="related-prod-add" data-id="{{$id}}" value="Add Related Products"/>--}}
    {{--            <div class="related-products">--}}
    {{--                @if ($relatedProducts)--}}
    {{--                    @foreach($relatedProducts as $relate)--}}
    {{--                        <form id="update-product-related-data-{{$relate->id}}"></form>--}}
    {{--                        <label for="">{{$relate->relatedProduct->title}}</label>--}}
    {{--                        <input form="update-product-related-data-{{$relate->id}}" type="text" name="discount" value="{{$relate->discount}}">--}}
    {{--                        <input form="update-product-related-data-{{$relate->id}}" type="text" name="quantity" value="{{$relate->quantity}}">--}}
    {{--                        <input form="update-product-related-data-{{$relate->id}}" type="hidden" name="id" value="{{$relate->id}}">--}}
    {{--                        <input form="update-product-related-data-{{$relate->id}}" type="hidden" name="main_product_id" value="{{$product->id}}">--}}
    {{--                        <input form="update-product-related-data-{{$relate->id}}" type="hidden" name="related_product_id" value="{{$relate->relatedProduct->id}}">--}}

    {{--                        <button form="update-product-related-data-{{$relate->id}}" class="update-product-related btn-primary">ОБНОВИТЬ</button>--}}
    {{--                        <button form="update-product-related-data-{{$relate->id}}" class="btn-danger delete-product-related">Удалить</button>--}}
    {{--                        <br>--}}
    {{--                    @endforeach--}}
    {{--                @endif--}}
    {{--            </div>--}}

    {{--            <input form="product-update-form"  form="" type="submit" value="Confirm" class="form-control">--}}

    {{--    </div>--}}
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{asset('js/image-upload-form.js')}}"></script>
    <script src="{{asset('js/imageloader.js')}}"></script>
    <script src="{{asset('js/videoloader.js')}}"></script>
    <script src="{{asset('js/attribute-add-form.js')}}"></script>
    <script src="{{asset('js/related-product-add-form.js')}}"></script>
    <script src="{{asset('js/form-updater.js')}}"></script>
@endsection

