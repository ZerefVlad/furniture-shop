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
                                <span class="nex" style="    position: absolute;top: 265px;right: 130px;font-size: 80px;color: rgb(2, 187, 219);"><i class="fa fa-angle-right"></i></span>

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
                                    {{--                    <li class="slide">Slide 3</li>--}}
                                    {{--                    <li class="slide">Slide 4</li>--}}
                                    {{--                    <li class="slide">Slide 5</li>--}}
                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="container">
                        <form class="content">
                            <h3 style="    position: relative;float: right;margin-top: 5%; color: #111111; font-family: Roboto;font-size: 24px;font-weight: 500;">/пог. м</h3>
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
{{--                            <h3 style="color: #333333;  font-family: Roboto;  font-size: 22px;  font-weight: 500;">--}}
{{--                                Оберіть колір</h3>--}}
{{--                            --}}{{--                        <img src="{{asset('storage/static_img/16-layers.png')}}">--}}

{{--                            <br>--}}
{{--                            <input type="hidden"--}}
{{--                                   value="{{$product->colors->first() ? $product->colors()->first()->id : 0}}"--}}
{{--                                   name="color">--}}
{{--                            @foreach($product->colors as $color)--}}
{{--                                <div class="colors col-md-2" style="text-align: center;padding: 0; margin: 0">--}}
{{--                                    <img class="select_colors" data-color="{{$color->id}}"--}}
{{--                                         src="{{$color->getImage()->url}}" alt="">--}}
{{--                                    <p style="margin-left:4%;">{{$color->title}}</p>--}}
{{--                                </div>--}}

{{--                            @endforeach--}}

                            <div class="col-md-12">


                                <form id="add-to-cart-form"></form>
                                <div class="buttons">


{{--                                        <li class="col-md-8">--}}
{{--                                            <button id="add_to_cart" class="btn btn-theme btn-cart btn-icon-left"--}}
{{--                                                    type="submit">--}}
{{--                                                <i class="fa fa-shopping-cart"></i>Додати до кошика--}}
{{--                                            </button>--}}
{{--                                        </li>--}}

                                            <a href="#" id="callme" class="btn btn-theme btn-cart"
                                               style="background-color: #9e9e9e;margin-top:20px" type="submit" >
                                                <i class="fa fa-phone"></i> Надiслати заявку
                                            </a>


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

                            <lable class="col-md-12 " style="margin-top: 10px" required>Номер телефону</lable>
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

                        <div class="container">
                            <div class="tabs-wrapper content-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#item-description" data-toggle="tab">Опис товару</a>
                                    </li>

                                    <li><a href="#parametr" data-toggle="tab">Параметри</a></li>
                                    <li><a href="#video" data-toggle="tab">Відео</a></li>
                                    <li><a href="#reviews" data-toggle="tab">Відгуки </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="item-description">
                                        <p>{{$product->description}}</p>
                                    </div>



                                    <div class="tab-pane fade " id="parametr">


                                        <div style="color: #333333;font-family: Lato;font-size: 18px;font-weight: 700;letter-spacing: -0.63px;line-height: 45px;">
                                            <div style="padding: 35px;">
                                                <table style="width: 100%">
                                                    <thead>

                                                    </thead>
                                                    <tbody>

                                                    @foreach($attributes as $attribute)
                                                        @if($attribute->attribute->id != 1)
                                                            <tr>

                                                                <th style="       border: solid 1px #e9e9e9; background-color: #0f0f0f; color: #FFFFFF; font-weight: 600; text-align: center;width: 40%">
                                                                    {{$attribute->attribute->title}}
                                                                </th>

                                                                <td style="    border: solid 1px #e9e9e9;text-align: center;    padding: 10px 0;">
                                                                    {{$attribute->value}}
                                                                </td>





                                                                {{--                                                        <div>--}}
                                                                {{--                                                            <p class="col-md-3">{{$attribute->attribute->title}}--}}
                                                                {{--                                                                : </p>--}}
                                                                {{--                                                            <p class="col-md-3">{{$attribute->value}}</p>--}}
                                                            </tr>       {{--                                                        </div>--}}
                                                        @endif
                                                    @endforeach

                                                    </tbody>
                                                </table>
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
                                                <h4 class="block-title" style="color: rgb(2, 187, 219)">Залишити відгук</h4>
                                                <form id="add-comment-to-form"
                                                      action="{{route('add_comment',['category' => $category, 'product' => $product])}}"
                                                      method="post" name="comments-form" ></form>
                                                <input type="hidden" form="add-comment-to-form" name="_token"
                                                       value="{{csrf_token()}}">

                                                <div class="form-group"><textarea form="add-comment-to-form" name="text"
                                                                                  placeholder="Ваш відгук"
                                                                                  class="form-control"
                                                                                  title="comments-form-comments"

                                                                                  rows="6" style="background-color:#AFEEEE;">Введіть відгук</textarea>
                                                </div>

                                                <input form="add-comment-to-form" type="number" name="rating" min="0"
                                                       max="5" value="5" style="">
                                                <button id="add-picture-slide">Додати зображення</button>
                                                <div class="picture-slides"></div>

                                                <div class="form-group">
                                                    <button form="add-comment-to-form"
                                                            type="submit"
                                                            class="btn btn-theme btn-theme-transparent btn-icon-left"
                                                            id="submit"><i class="fa fa-comment"></i> Надiслати
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
                                                                <a href="#">{{$comment->user ? $comment->user->name : "Guest"}}</a>
</span>
                                                        <p>{{$comment->rating}}</p>
                                                        </p>

                                                        <p id="text-{{$comment->id}}"
                                                           class="comment-text"
                                                           style="word-wrap: break-word;">{{$comment->text}}</p>
                                                            @foreach($comment->getPictures() as $img)
                                                                <img style="max-width:300px; height:200px;margin-left: 10px" src="{{$img->url}}" alt="">
                                                            @endforeach


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
                                                </div>
                                            @endforeach
                                        </div>




                                        <!-- // -->

                                    </div>

                    </section>
                    <!-- /PAGE -->


                </div>
                <!-- /CONTENT AREA -->
@endsection
