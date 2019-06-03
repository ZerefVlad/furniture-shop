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

                    <div class="container">
                        <div class="back-to-category">
                            <a
                                    style="color: #02bbdb;font-family: Roboto;font-size: 16px;font-weight: 400;"
                                    href="{{route('show_product', ['category' => $category])}}"> <span class="link"><i
                                            class="fa fa-angle-left"></i> Повернутися до {{$category->title}}</a></span>


                        </div>

                        <div class="container full-width">

                            <div class="main-slider">
                                <span class="pre" style="    position: absolute;
        top: 265px;
    left: 150px;
    font-size: 80px;
    color: rgb(2, 187, 219);"><i class="fa fa-angle-left"></i></span>
                                <span class="nex"
                                      style="    position: absolute;top: 265px;right: 130px;font-size: 80px;color: rgb(2, 187, 219);"><i
                                            class="fa fa-angle-right"></i></span>

                                <ul id="slides">


                                    <li class="slide showing" style="text-align: center">
                                        <div class="container">
                                            <img style="max-width: 100%; max-height: 500px"
                                                 src="{{$product->getMainProductUrl()}}">
                                        </div>


                                    </li>
                                    @foreach($imgs as $img)


                                        @if($img->url != $product->getMainProductUrl())
                                            <li class="slide " style="text-align: center">
                                                <div class="container">
                                                    <img style="max-width: 100%; max-height: 500px;"
                                                         src="{{$img->url}}">
                                                </div>


                                            </li>
                                        @endif


                                    @endforeach

                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="container">
                        <form class="content">
                            <del style="    position: relative;float: right;margin-top: 5%; color: #111111; font-family: Roboto;font-size: 24px;font-weight: 500;">{{$product->getPriceWithoutDiscount()}}грн.</del>
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
                            <input class="col-md-12" name="name" type="text" placeholder="Ваше iм'я" required>
                            <input type="hidden" value="{{$product->id}}" name="product">
                            <input type="hidden" name="type" value="product">

                            <lable class="col-md-12 " style="margin-top: 10px">Номер телефону</lable>
                            <input class="col-md-12" name="phone" type="text" placeholder="Номер телефону" required>

                            <input class="col-md-12 "
                                   style=" width: 50%;height: 35px;margin-left: 23%;margin-top: 10%;color: #FFFFFF;max-width: 100%; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2); border-radius: 10px;background-color: #4abf0c;"
                                   type="submit">

                        </form>
                        <!-- Тут любoе сoдержимoе -->
                    </div>
                    <div id="overlay"></div><!-- Пoдлoжкa -->



                    <hr class="page-divider small"/>
                    <hr class="page-divider"/>

                    <!-- PAGE -->

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


                                                <tr class="related-product-cart-{{$relatedProduct->id}}"
                                                    style="border: solid 2px #e21e1e;">

                                                    <td style="vertical-align: inherit" class="image"><a
                                                                class="media-link" href="#"><img
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
                                                    <td style="vertical-align: inherit; width: 10%;text-align: center">
                                                        <i style="font-size: 30px;" class="fa fa-plus"></i></td>

                                                    <td class="image" style="vertical-align: inherit"><a
                                                                class="media-link" href="#"><img
                                                                    width="200" height="150"
                                                                    src="{{$relatedProduct->relatedProduct->getMainProductUrl()}}"
                                                                    alt=""/></a>
                                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                            кiлькiсть додаткового
                                                            товару у комплектi: {{$relatedProduct->quantity}} шт.</p>
                                                    </td>

                                                    <td class="total"
                                                        style="padding-right: 50px;vertical-align: inherit">
                                                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                            Назва додаткового
                                                            товару: {{$relatedProduct->relatedProduct->title}}</h4>
                                                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                            Код додаткового
                                                            товару: {{$relatedProduct->relatedProduct->code}} </p>
                                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                            цена : {{$price = $product->getPriceWithDiscount() + ($relatedProduct->relatedProduct->getPriceWithDiscount() -
                                                                   $relatedProduct->relatedProduct->getPriceWithDiscount() * ($relatedProduct->discount/100)) * $relatedProduct->quantity }}
                                                            грн.</p>

                                                        <p class="skidka"
                                                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                            Знижка: {{$relatedProduct->discount}}% </p>


                                                    </td>

                                                    <td style="vertical-align: inherit">

                                                        <p class="complex_price"
                                                           style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                            Цiна
                                                            комплекту: {{$price * $relatedProduct->quantity + $product->getPriceWithDiscount()}}</p>

                                                        <button data-id="{{$relatedProduct->id}}"
                                                                class="related-product-add "
                                                                style="margin-top: 10px;color: #FFFFFF; max-width: 100%; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2); border-radius: 10px; background-color: #4abf0c;">
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
                                                    @if($attribute->attribute->id != 1)
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

                                        <div class="comments">

                                            <div class="comments-form">
                                                <h4 class="block-title" style="color: rgb(2, 187, 219)">Залишити
                                                    відгук</h4>
                                                <form id="add-comment-to-form"
                                                      action="{{route('add_comment',['category' => $category, 'product' => $product])}}"
                                                      method="post" name="comments-form"></form>
                                                <input type="hidden" form="add-comment-to-form" name="_token"
                                                       value="{{csrf_token()}}">

                                                <div class="form-group"><textarea form="add-comment-to-form" name="text"
                                                                                  placeholder="Ваш відгук"
                                                                                  class="form-control"
                                                                                  title="comments-form-comments"

                                                                                  rows="6"
                                                                                  style="background-color:#AFEEEE;">Введіть відгук</textarea>
                                                </div>

                                                <input form="add-comment-to-form" type="number" name="rating" min="0"
                                                       max="5" value="5" style="">
                                                <div class="form-group">
                                                    <button form="add-comment-to-form"
                                                            type="submit"
                                                            class="btn btn-theme btn-theme-transparent btn-icon-left"
                                                            id="submit"><i class="fa fa-comment"></i> <span style="">Надiслати</span>
                                                    </button>
                                                </div>
                                                </form>
                                            </div>

                                            @foreach($product->comments as $comment)
                                                @if($comment->isParent())

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
                                                                <a href="#">{{$comment->user ? $comment->user->name : "Guest"}}</a></span>
                                                            <p>{{$comment->rating}}</p>
                                                            </p>

                                                            <p id="text-{{$comment->id}}"
                                                               class="comment-text"
                                                               style="word-wrap: break-word;">{{$comment->text}}</p>


                                                        </div>
                                                    </div>
                                                    @foreach($comment->children as $children)
                                                        <div class="media comment" id="comment-{{$comment->id}}"
                                                             style="width: 80%">

                                                            <div class="media-body">
                                                                <h4>Вiдповiдь Адмiнiстратора</h4>

                                                                @if ($children->user && auth()->user() && ($children->user->id === auth()->user()->id || auth()->user()->id === 1))
                                                                    <button data-id="{{$children->id}}"
                                                                            data-category-name="{{$children->title}}"
                                                                            data-product-name="{{$children->title}}"
                                                                            form="update-comment-to-form"
                                                                            class="comment-update btn btn-success"
                                                                    >
                                                                        Редактировать коммент
                                                                    </button>

                                                                    <button data-id="{{$children->id}}"

                                                                            form="delete-comment-to-form"
                                                                            class="comment-delete btn btn-success"
                                                                    >
                                                                        Удалить коммент
                                                                    </button>
                                                                @endif
                                                                <p class="comment-meta">
                                                            <span class="comment-author">
                                                                <a href="#">{{$children->user ? $children->user->name : "Guest"}}</a>   </span>
                                                                <p>{{$children->rating}}</p>
                                                                </p>

                                                                <p id="text-{{$children->id}}"
                                                                   class="comment-text"
                                                                   style="word-wrap: break-word;">{{$children->text}}</p>


                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                    </section>
                    <!-- /PAGE -->


                </div>
                <!-- /CONTENT AREA -->
@endsection
