@php
    $attributes = $product->getProductAttributes();
    $relatedProducts = $product->getRelatedProducts();
    $imgs = $product->getImages();

@endphp
@extends('layouts.app')
<style>
    .select_color {
        border: solid 1px #111111;
    }

    .select_colors:hover {
        border: solid 1px #111111;
    }

    #modal_form {
        width: 300px;
        /*height: 300px; !* Рaзмеры дoлжны быть фиксирoвaны *!*/
        border-radius: 5px;
        border: 3px #000 solid;
        background: #fff;
        position: fixed; /* чтoбы oкнo былo в видимoй зoне в любoм месте */
        top: 45%; /* oтступaем сверху 45%, oстaльные 5% пoдвинет скрипт */
        left: 50%; /* пoлoвинa экрaнa слевa */
        margin-top: -150px;
        margin-left: -150px; /* тут вся мaгия центрoвки css, oтступaем влевo и вверх минус пoлoвину ширины и высoты сooтветственнo =) */
        display: none; /* в oбычнoм сoстoянии oкнa не дoлжнo быть */
        opacity: 0; /* пoлнoстью прoзрaчнo для aнимирoвaния */
        z-index: 5; /* oкнo дoлжнo быть нaибoлее бoльшем слoе */
        padding: 20px 10px;
    }

    /* Кнoпкa зaкрыть для тех ктo в тaнке) */
    #modal_form #modal_close {
        width: 21px;
        height: 21px;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        display: block;
    }

    /* Пoдлoжкa */
    #overlay {
        z-index: 3; /* пoдлoжкa дoлжнa быть выше слoев элементoв сaйтa, нo ниже слoя мoдaльнoгo oкнa */
        position: fixed; /* всегдa перекрывaет весь сaйт */
        background-color: #000; /* чернaя */
        opacity: 0.8; /* нo немнoгo прoзрaчнa */
        -moz-opacity: 0.8; /* фикс прозрачности для старых браузеров */
        filter: alpha(opacity=80);
        width: 100%;
        height: 100%; /* рaзмерoм вo весь экрaн */
        top: 0; /* сверху и слевa 0, oбязaтельные свoйствa! */
        left: 0;
        cursor: pointer;
        display: none; /* в oбычнoм сoстoянии её нет) */
    }


</style>
@section('content')


    <div class="content-area">

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

                <div class="row product-single">

                    <div class="content">
                        <div class="back-to-category">
                            <a
                                    style="color: #02bbdb;font-family: Roboto;font-size: 16px;font-weight: 400;"
                                    href="{{route('show_product', ['category' => $category])}}"> <span class="link"><i
                                            class="fa fa-angle-left"></i> Повернутися до {{$category->title}}</a></span>
                            <!--<button class="btn btn-theme btn-wish-list"><i class="fa fa-heart"></i></button>
                                                         -->

                        </div>

                        <div class="container full-width">

                            <div class="main-slider">
                                <span class="pre" style="    position: absolute;
        top: 265px;
    left: 150px;
    font-size: 80px;
    color: rgb(2, 187, 219);"><i class="fa fa-angle-left"></i></span>
                                <span class="nex" style="    position: absolute;
        top: 265px;
    right: 150px;
    font-size: 80px;
    color: rgb(2, 187, 219);"><i class="fa fa-angle-right"></i></span>

                                <ul id="slides">


                                    <li class="slide showing">
                                        <div class="container">
                                            <img style="position: absolute;    width: 100%;    height: 100%;    top: 0;    left: 0;"
                                                 src="{{$product->getMainProductUrl()}}">
                                        </div>


                                    </li>
                                    @foreach($imgs as $img)
                                        <li>

                                            @if($img->url != $product->getMainProductUrl())
                                                <img class="slide"
                                                     style="position: absolute;    width: 100%;    height: 100%;    top: 0;    left: 0;"
                                                     src="{{$img->url}}">
                                            @endif

                                        </li>
                                    @endforeach
                                    {{--                    <li class="slide">Slide 3</li>--}}
                                    {{--                    <li class="slide">Slide 4</li>--}}
                                    {{--                    <li class="slide">Slide 5</li>--}}
                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="container">
                        <form class="content">
                            <div class="product-price">{{$product->getPriceWithDiscount()}} грн.</div>

                            <h2 class="product-title">{{$product->title}}</h2>
                            <div class="product-code">Code tovara: {{$product->code}}</div>
                            <div class="product-rating clearfix">
                                <div class="rating">
                                    <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                                </div>
                                <a class="reviews" href="#">({{$product->getAverageScore()}}
                                    - {{count($product->comments)}} users)</a>
                            </div>
                            <h3 style="color: #333333;  font-family: Roboto;  font-size: 22px;  font-weight: 500;">
                                Оберіть колір</h3>
                            {{--                        <img src="{{asset('storage/static_img/16-layers.png')}}">--}}

                            <br>
                            <input type="hidden"
                                   value="{{$product->colors->first() ? $product->colors()->first()->id : 0}}"
                                   name="color">
                            @foreach($product->colors as $color)
                                <div class="colors col-md-2" style="text-align: center;padding: 0; margin: 0">
                                    <img class="select_colors" data-color="{{$color->id}}"
                                         src="{{$color->getImage()->url}}" alt="">
                                    <p style="margin-left:4%;">{{$color->title}}</p>
                                </div>

                            @endforeach

                            <div class="col-md-12">


                                <form id="add-to-cart-form"></form>
                                <div class="buttons">
                                    <div class="quantity" style="float: left">
                                        <input form="add-to-cart-form" type="hidden" name="product_id"
                                               value="{{$product->id}}">
                                        <ul style="float: left">
                                            <li>
                                                <h3 style="color: #333333; font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                    Кількість:</h3>
                                            </li>
                                            <li>
                                                <input class="form-control qty" id="kolvo" form="add-to-cart-form"
                                                       type="number"
                                                       name="quantity" value="1"
                                                       min="1" max="99">
                                            </li>
                                        </ul>
                                        <!-- <button class="btn"><i class="fa fa-plus"></i></button>
                                         <button class="btn"><i class="fa fa-minus"></i></button>-->
                                    </div>

                                    <ul style="float: left; margin-top: 2%">
                                        <li class="col-md-8">
                                            <button id="add_to_cart" class="btn btn-theme btn-cart btn-icon-left"
                                                    type="submit">
                                                <i class="fa fa-shopping-cart"></i>Додати до кошика
                                            </button>
                                        </li>
                                        <li class="col-md-8">
                                            <a href="#" id="callme" class="btn btn-theme btn-cart"
                                               style="background-color: #9e9e9e;" type="submit">
                                                <i class="fa fa-phone"></i> Потрiбна консультацiя
                                            </a></li>
                                    </ul>

                                </div>
                            </div>
                    </div>


                    <div id="modal_form"><!-- Сaмo oкнo -->
                        <div>
                            <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть -->
                            <h3 style="    color: #02bbdb;">Замовлення дзвiнка</h3>
                        </div>

                        <div style="background-color: #f3f3f3;">
                            <p>Вкажіть Ваше ім'я з номером телефону і наші менеджери зателефонують Вам найближчим
                                часом. </p>
                        </div>

                        <form action="{{route('callback-send')}}">

                            <lable class="col-md-12" style="margin-top: 10px">Ваше iм'я</lable>
                            <input class="col-md-12" name="name" type="text" placeholder="Ваше iм'я">
                            <input type="hidden" value="{{$product->id}}" name="product">
                            <input type="hidden" name="type" value="product">

                            <lable class="col-md-12 " style="margin-top: 10px">Номер телефону</lable>
                            <input class="col-md-12" name="phone" type="text" placeholder="Номер телефону">

                            <input class="col-md-12 "
                                   style=" width: 50%;height: 35px;margin-left: 23%;margin-top: 10%;color: #FFFFFF;max-width: 100%; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2); border-radius: 10px;background-color: #4abf0c;"
                                   type="submit">

                        </form>
                        <!-- Тут любoе сoдержимoе -->
                    </div>
                    <div id="overlay"></div><!-- Пoдлoжкa -->


                    <!-- <div class="product-availability">Availability: <strong>In stock</strong> 21 Item(s)</div> -->
                    <hr class="page-divider small"/>


                    <hr class="page-divider"/>

                    <!-- PAGE -->
                    <section class="page-section">
                        <div class="container">
                            <div class="tabs-wrapper content-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#item-description" data-toggle="tab">Опис товару</a>
                                    </li>
                                    <li><a href="#complect" data-toggle="tab">Додаткові товари</a></li>
                                    <li><a href="#parametr" data-toggle="tab">Параметри</a></li>
                                    <li><a href="#video" data-toggle="tab">Відео</a></li>
                                    <li><a href="#reviews" data-toggle="tab">Відгуки </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="item-description">
                                        <p>{{$product->description}}</p>
                                    </div>

                                    <div class="tab-pane fade " id="complect">
                                        <table class="table">
                                            <thead>

                                            </thead>
                                            <tbody>
                                            @foreach($relatedProducts as $relatedProduct)
                                                                                                <form id="related-product-cart-{{$relatedProduct->id}}"></form>

{{--                                                                                                <p>Количество доп товара в комплекте: {{$relatedProduct->quantity}}</p>--}}
{{--                                                                                                <p>Скидка на доп товар: {{$relatedProduct->discount}}</p>--}}
{{--                                                                                                <p>Название доп товар: {{$relatedProduct->relatedProduct->title}}</p>--}}

{{--                                                                                                <p> цена : {{$price = $product->getPriceWithDiscount() + ($relatedProduct->relatedProduct->getPriceWithDiscount() ---}}
{{--                                                                                                                   $relatedProduct->relatedProduct->getPriceWithDiscount() * ($relatedProduct->discount/100)) * $relatedProduct->quantity }}</p>--}}

                                                                                                <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden"
                                                                                                       name="complex_id"
                                                                                                       value="{{$relatedProduct->id}}">
                                                                                                <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden"
                                                                                                       name="quantity"
                                                                                                       value="{{$relatedProduct->quantity}}">
                                                                                                <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden"
                                                                                                       name="discount"
                                                                                                       value="{{$relatedProduct->discount}}">
                                                                                                <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden"
                                                                                                       name="related_product_id"
                                                                                                       value="{{$relatedProduct->relatedProduct->id}}">
                                                                                                <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden"
                                                                                                       name="product_id"
                                                                                                       value="{{$product->id}}">


                                                <tr class="related-product-cart-{{$relatedProduct->id}}" style="border: solid 2px #e21e1e;">

                                                    <td style="vertical-align: inherit" class="image"><a class="media-link" href="#"><img
                                                                    width="200" height="150"
                                                                    src="{{$product->getMainProductUrl()}}" alt=""/></a>
                                                    </td>

                                                    <td style="vertical-align: inherit" class="description">
                                                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                            Назва основного товару: {{$product->title}}</h4>
                                                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                            Код основного товару: {{$product->code}}</p>
                                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">{{$product->getPriceWithDiscount()}}
                                                            грн</p>
                                                        <p class="skidka"
                                                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                            Знижка: {{$product->discount->value}}% </p>
                                                    </td>
                                                    <td style="vertical-align: inherit; width: 10%;text-align: center"><i style="font-size: 30px;" class="fa fa-plus"></i></td>

                                                    <td class="image" style="vertical-align: inherit"><a class="media-link" href="#"><img
                                                                    width="200" height="150"
                                                                    src="{{$relatedProduct->relatedProduct->getMainProductUrl()}}"
                                                                    alt=""/></a>
                                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">кiлькiсть додаткового
                                                            товару у комплектi: {{$relatedProduct->quantity}} шт.</p>
                                                    </td>

                                                    <td  class="total" style="padding-right: 50px;vertical-align: inherit">
                                                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                            Назва додаткового
                                                            товару: {{$relatedProduct->relatedProduct->title}}</h4>
                                                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                            Код додаткового товару: {{$relatedProduct->relatedProduct->code}} </p>
                                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                            цена : {{$price = $product->getPriceWithDiscount() + ($relatedProduct->relatedProduct->getPriceWithDiscount() -
                                                                   $relatedProduct->relatedProduct->getPriceWithDiscount() * ($relatedProduct->discount/100)) * $relatedProduct->quantity }} грн.</p>

                                                        <p class="skidka"
                                                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                            Знижка: {{$relatedProduct->discount}}% </p>


                                                    </td>

                                                    <td style="vertical-align: inherit">

                                                        <p class="complex_price" style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">Цiна
                                                            комплекту: {{$price * $relatedProduct->quantity + $product->getPriceWithDiscount()}}</p>

                                                        <button data-id="{{$relatedProduct->id}}"
                                                                class="related-product-add " style="margin-top: 10px;color: #FFFFFF; max-width: 100%; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2); border-radius: 10px; background-color: #4abf0c;">
                                                            Придбати комплект
                                                        </button>

                                                    </td>


                                                </tr>


                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade " id="parametr">


                                        <div style="color: #333333;font-family: Lato;font-size: 18px;font-weight: 700;letter-spacing: -0.63px;line-height: 45px;">
                                            <div style="padding: 35px;">
                                                @foreach($attributes as $attribute)
                                                    @if($attribute->attribute->title != 'price')
                                                        <div>
                                                            <p class="col-md-3">{{$attribute->attribute->title}}
                                                                : </p>
                                                            <p class="col-md-3">{{$attribute->value}}</p>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade " id="video">
                                        <div class="videos">
                                            @if ($videos)
                                                @foreach($videos as $video)
                                                    <div id="select-video-{{$video}}">


                                                        <iframe style="padding-top: 40px;" type="text/html"
                                                                width="640" height="385"
                                                                src="http://www.youtube.com/embed/{{$video}}"
                                                                frameborder="0"></iframe>


                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="reviews">
                                        {{--                                            @foreach($product->comments as $comment)--}}
                                        {{--                                                <div id="comment-{{$comment->id}}">--}}
                                        {{--                                                    {{$comment->user ? $comment->user->name : "Guest"}}--}}
                                        {{--                                                    <div id="rating-{{$comment->id}}">{{$comment->rating}}</div>--}}
                                        {{--                                                    <div id="text-{{$comment->id}}">{{$comment->text}}</div>--}}

                                        {{--                                                    @if ($comment->user && auth()->user() && ($comment->user->id === auth()->user()->id || auth()->user()->id === 1))--}}
                                        {{--                                                        <button data-id="{{$comment->id}}"--}}
                                        {{--                                                                data-category-name="{{$category->title}}"--}}
                                        {{--                                                                data-product-name="{{$product->title}}"--}}
                                        {{--                                                                form="update-comment-to-form"--}}
                                        {{--                                                                class="comment-update btn btn-success">--}}
                                        {{--                                                            Редактировать коммент--}}
                                        {{--                                                        </button>--}}

                                        {{--                                                        <button data-id="{{$comment->id}}"--}}

                                        {{--                                                                form="delete-comment-to-form"--}}
                                        {{--                                                                class="comment-delete btn btn-success">--}}
                                        {{--                                                            Удалить коммент--}}
                                        {{--                                                        </button>--}}
                                        {{--                                                    @endif--}}
                                        {{--                                                </div>--}}
                                        {{--                                            @endforeach--}}


                                        <div class="comments">
                                            @foreach($product->comments as $comment)
                                                <div class="media comment" id="comment-{{$comment->id}}">

                                                    <div class="media-body">
                                                        @if ($comment->user && auth()->user() && ($comment->user->id === auth()->user()->id || auth()->user()->id === 1))
                                                            <button data-id="{{$comment->id}}"
                                                                    data-category-name="{{$category->title}}"
                                                                    data-product-name="{{$product->title}}"
                                                                    form="update-comment-to-form"
                                                                    class="comment-update btn btn-success"
                                                            >
                                                                Редактировать коммент
                                                            </button>

                                                            <button data-id="{{$comment->id}}"

                                                                    form="delete-comment-to-form"
                                                                    class="comment-delete btn btn-success"
                                                            >
                                                                Удалить коммент
                                                            </button>
                                                        @endif
                                                        <p class="comment-meta">
                                                            <span class="comment-author">
                                                                <a href="#">{{$comment->user ? $comment->user->name : "Guest"}}</a>
{{--                                                                <span class="comment-date" >--}}
                                                                {{--                                                                    26 days ago--}}
                                                                {{--                                                                    <i class="fa fa-flag"></i>--}}
                                                                {{--                                                                </span>--}}
                                                            </span>
                                                        <p>{{$comment->rating}}</p>
                                                        </p>

                                                        <p id="text-{{$comment->id}}"
                                                           class="comment-text"
                                                           style="word-wrap: break-word;">{{$comment->text}}</p>


                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                        {{--                                                <form id="add-comment-to-form"--}}
                                        {{--                                                      action="{{route('add_comment',['category' => $category, 'product' => $product])}}"--}}
                                        {{--                                                      method="post" name="comments-form" id="comments-form"></form>--}}
                                        {{--                                                <input type="hidden" form="add-comment-to-form" name="_token" value="{{csrf_token()}}">--}}
                                        {{--                                                <textarea form="add-comment-to-form" name="text" placeholder="Your message"--}}
                                        {{--                                                          class="form-control"--}}
                                        {{--                                                          title="comments-form-comments"--}}
                                        {{--                                                          name="comments-form-comments"--}}
                                        {{--                                                          rows="6">Введите коммент</textarea>--}}
                                        {{--                                                <input form="add-comment-to-form" type="number" name="rating" min="0" max="5" value="5">--}}
                                        {{--                                                <button form="add-comment-to-form" class="comment-add btn btn-green">Отправить коммент</button>--}}


                                        <div class="comments-form">
                                            <h4 class="block-title">Додати коментар</h4>
                                            <form id="add-comment-to-form"
                                                  action="{{route('add_comment',['category' => $category, 'product' => $product])}}"
                                                  method="post" name="comments-form" id="comments-form"></form>
                                            <input type="hidden" form="add-comment-to-form" name="_token"
                                                   value="{{csrf_token()}}">
                                            {{--                                                    <div class="form-group"><input type="text"--}}
                                            {{--                                                                                   placeholder="Your name and surname"--}}
                                            {{--                                                                                   class="form-control"--}}
                                            {{--                                                                                   title="comments-form-name"--}}
                                            {{--                                                                                   name="comments-form-name"></div>--}}
                                            {{--                                                    <div class="form-group"><input type="text"--}}
                                            {{--                                                                                   placeholder="Your email adress"--}}
                                            {{--                                                                                   class="form-control"--}}
                                            {{--                                                                                   title="comments-form-email"--}}
                                            {{--                                                                                   name="comments-formemail"></div>--}}
                                            <div class="form-group"><textarea form="add-comment-to-form" name="text"
                                                                              placeholder="Your message"
                                                                              class="form-control"
                                                                              title="comments-form-comments"

                                                                              rows="6">Введите коммент</textarea>
                                            </div>

                                            <input form="add-comment-to-form" type="number" name="rating" min="0"
                                                   max="5" value="5" style="">
                                            <div class="form-group">
                                                <button form="add-comment-to-form"
                                                        type="submit"
                                                        class="btn btn-theme btn-theme-transparent btn-icon-left"
                                                        id="submit"><i class="fa fa-comment"></i> Надiслати
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- // -->

                                    </div>

                    </section>
                    <!-- /PAGE -->


                </div>
                <!-- /CONTENT AREA -->
@endsection


{{--<h1>{{$product->title}}</h1>--}}
{{--<img width="300" height="200" src="{{$product->getMainProductUrl()}}">--}}
{{--@foreach($imgs as $img)--}}
{{--    @if($img->url != $product->getMainProductUrl())--}}
{{--        <img width="100" height="100" src="{{$img->url}}">--}}
{{--    @endif--}}
{{--@endforeach--}}
{{--@foreach($attributes as $attribute)--}}
{{--    <h2>{{$attribute->attribute->title}} : {{$attribute->value}}</h2>--}}
{{--@endforeach--}}


{{--                <form id="add-to-cart-form"></form>--}}
{{--                <input form="add-to-cart-form" type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                <input form="add-to-cart-form" type="number" name="quantity" value="1" min="1" max="99">--}}
{{--                <button id="add_to_cart" class="btn btn-success">add to cart blyat pizdec nahuy</button>--}}


{{--@foreach($relatedProducts as $relatedProduct)--}}
{{--    <form id="related-product-cart-{{$relatedProduct->id}}"></form>--}}
{{--    <p>Купи комплект, жадоба:</p>--}}
{{--    <p>Количество хуйни: {{$relatedProduct->quantity}}</p>--}}
{{--    <p>Скидочка: {{$relatedProduct->discount}}</p>--}}
{{--    <p>Хоть название прочитай: {{$relatedProduct->relatedProduct->title}}</p>--}}

{{--    <p>а цена будет : {{$price =--}}
{{--        $product->getPriceWithDiscount() + (--}}
{{--        $relatedProduct->relatedProduct->getPriceWithDiscount() ---}}
{{--        $relatedProduct->relatedProduct->getPriceWithDiscount() *--}}
{{--        ($relatedProduct->discount/100)) * $relatedProduct->quantity--}}
{{--        }}</p>--}}
{{--    <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="complex_id"--}}
{{--           value="{{$relatedProduct->id}}">--}}
{{--    <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="quantity"--}}
{{--           value="{{$relatedProduct->quantity}}">--}}
{{--    <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="discount"--}}
{{--           value="{{$relatedProduct->discount}}">--}}
{{--    <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="related_product_id"--}}
{{--           value="{{$relatedProduct->relatedProduct->id}}">--}}
{{--    <input form="related-product-cart-{{$relatedProduct->id}}" type="hidden" name="product_id"--}}
{{--           value="{{$product->id}}">--}}
{{--    <button data-id="{{$relatedProduct->id}}" class="related-product-add btn btn-dark">Купить--}}
{{--        бомж-комплект--}}
{{--    </button>--}}


{{--@endforeach--}}
{{--@foreach($product->comments as $comment)--}}
{{--    <div id="comment-{{$comment->id}}">--}}
{{--        {{$comment->user ? $comment->user->name : "Guest"}}--}}
{{--        <div id="rating-{{$comment->id}}">{{$comment->rating}}</div>--}}
{{--        <div id="text-{{$comment->id}}">{{$comment->text}}</div>--}}

{{--        @if ($comment->user && auth()->user() && ($comment->user->id === auth()->user()->id || auth()->user()->id === 1))--}}
{{--            <button data-id="{{$comment->id}}"--}}
{{--                    data-category-name="{{$category->title}}"--}}
{{--                    data-product-name="{{$product->title}}"--}}
{{--                    form="update-comment-to-form"--}}
{{--                    class="comment-update btn btn-success">--}}
{{--                Редактировать коммент--}}
{{--            </button>--}}

{{--            <button data-id="{{$comment->id}}"--}}

{{--                    form="delete-comment-to-form"--}}
{{--                    class="comment-delete btn btn-success">--}}
{{--                Удалить коммент--}}
{{--            </button>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--@endforeach--}}
{{--<form id="add-comment-to-form"--}}
{{--      action="{{route('add_comment',['category' => $category, 'product' => $product])}}"--}}
{{--      method="post"></form>--}}
{{--<input type="hidden" form="add-comment-to-form" name="_token" value="{{csrf_token()}}">--}}

{{--<textarea form="add-comment-to-form" name="text">Введите коммент</textarea>--}}
{{--<input form="add-comment-to-form" type="number" name="rating" min="0" max="5" value="5">--}}
{{--<button form="add-comment-to-form" class="comment-add btn btn-green">Отправить коммент</button>--}}