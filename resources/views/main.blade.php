@extends('layouts.app')

@section('content')

    <!-- CONTENT AREA -->


    <section class="page-section no-padding slider" style="background-color: #f3f3f3;">
        <div class="container full-width">

            <div class="main-slider">

 <span class="pre" style="    position: absolute;
        top: 265px;
    left: 150px;
    font-size: 80px;
    color: rgb(2, 187, 219);"><i class="fa fa-angle-left"></i></span>
                <span class="nex" style="    position: absolute;
        top: 265px;
    right: 127px;
    font-size: 80px;
    color: rgb(2, 187, 219);"><i class="fa fa-angle-right"></i></span>

                <ul id="slides">
                    @if ($textSlides)
                        @foreach($textSlides as $slide)
                            <li class="slide showing">
                                <div class="item slide1 dark alt">
                                    <div class="caption">
                                        <div class="container" style="background-color: rgb(243, 243, 243);">
                                            <div class="div-table">
                                                <div class="div-cell">
                                                    <div class="caption-content"
                                                        style="background-color: rgb(243, 243, 243);">
                                                        <h2 class="caption-title"
                                                            style=" color: #333333;">{{$slide->title}}</h2>
                                                        <h3 class="caption-text"
                                                            style=" color: #333333;word-break: break-all">{{$slide->description}}</h3>
                                                        <p class="caption-text">
                                                            <a class="btn btnslider"
                                                                href="{{$slide->url}}">Детальніше</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img style="width: 516px; height: 388px;     position: absolute;    top: 0;  right: 0;"
                                            src="{{$slide->image}}" alt="" />
                                    </div>
                                </div>
                            </li>

                        @endforeach
                    @endif
                    @if ($videoSlides)
                        @foreach($videoSlides as $slide)
                            <li class="slide showing">
                                <div class="item slide3 dark">

                                    <div class="caption">
                                        <div class="container" style="background-color: rgb(243, 243, 243);">
                                            <iframe width="90%" height="100%"

                                                src="https://www.youtube.com/embed/{{$slide}}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    {{--                    <li class="slide">Slide 3</li>--}}
                    {{--                    <li class="slide">Slide 4</li>--}}
                    {{--                    <li class="slide">Slide 5</li>--}}
                </ul>
            </div>
        </div>
    </section>





    <!-- PAGE -->
    <section class="page-section">
        <div class="container">

            <div class="tabs">
                <h1 class="titletabs">Оцініть останні новинки</h1>
                <p class="titletext ">But I must explain to you how all this mistaken idea of denouncing pleasure
                    and praising pain was born and I will give you a complete account of the system.</p>
            </div>


            <div class="tab-content">


                <!-- tab 2 -->
                <div class="tab-pane fade active in" id="tab-2">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" data-gal="prettyPhoto"
                                        href="{{asset('storage/static_img/apartment.jpg')}}">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt="" />

                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title"><a href="product-details.html">Standard Product
                                            Header</a></h4>

                                    <div class="price">
                                        <ins>$400.00</ins>
                                        <del>$425.00</del>
                                    </div>
                                    <div class="buttons">
                                        <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                                class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                                class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                                class="fa fa-exchange"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" data-gal="prettyPhoto" href="assets/img/apartment.jpg">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt="" />

                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title"><a href="product-details.html">Standard Product
                                            Header</a></h4>

                                    <div class="price">
                                        <ins>$400.00</ins>
                                        <del>$425.00</del>
                                    </div>
                                    <div class="buttons">
                                        <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                                class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                                class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                                class="fa fa-exchange"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" data-gal="prettyPhoto" href="assets/img/apartment2.jpg">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt="" />

                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title"><a href="product-details.html">Standard Product
                                            Header</a></h4>

                                    <div class="price">
                                        <ins>$400.00</ins>
                                        <del>$425.00</del>
                                    </div>
                                    <div class="buttons">
                                        <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                                class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                                class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                                class="fa fa-exchange"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" data-gal="prettyPhoto" href="assets/img/apartment2.jpg">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt="" />

                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title"><a href="product-details.html">Standard Product
                                            Header</a></h4>

                                    <div class="price">
                                        <ins>$400.00</ins>
                                        <del>$425.00</del>
                                    </div>
                                    <div class="buttons">
                                        <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i
                                                class="fa fa-heart"></i></a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i
                                                class="fa fa-shopping-cart"></i>Add to Cart</a><!--
                                            --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i
                                                class="fa fa-exchange"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- /PAGE -->
    <!-- PAGE -->
    <section class="page-section no-padding slider">
        <div class="container" style="height:500px">
            <div class="tabs">
                <h1 class="titletabs">СПЕЦІАЛЬНА ПРОПОЗИЦІЯ</h1>
                <p class="titletext ">But I must explain to you how all this mistaken idea of denouncing pleasure
                    and praising pain was born and I will give you a complete account of the system.</p>
            </div>


            <div class="caption-content" style="position: relative;float:left;width: 50%;">
                <h2 class="caption-title" style="color: #333333;
                     font-family: Montserrat;
                     font-size: 21px;
                     font-weight: 600;
                     letter-spacing: 0.84px;">{{isset($block2->title) ? $block2->title: ''}}</h2>
                <h3 class="caption-text" style="
                     color: #5e6471;
                     font-family: Lato;
                     font-size: 18px;
                     font-weight: 400;
">{{isset($block2->description) ? $block2->description: ''}}</h3>
                <h2 class="caption-title" style="color: #333333;
                     font-family: Montserrat;
                     font-size: 21px;
                     font-weight: 600;
                     letter-spacing: 0.84px;">{{isset($block2->title2) ? $block2->title2: ''}}</h2>

                <h3 class="caption-text" style="
                     color: #5e6471;
                     font-family: Lato;
                     font-size: 18px;
                     font-weight: 400;
">

                    {{isset($block2->description2) ? $block2->description2: ''}}</h3>
                <p class="caption-text">
                    <a class="btn btnslider" href="{{isset($block2->url) ? $block2->url: ''}}">Детальнiше</a>
                </p>
            </div>
            <div style="position: relative;">
                <img style="width: 516px; height: 388px; position: absolute;right: 0;z-index: 0;"
                    src="{{isset($block2->image) ? $block2->image: ''}}" alt="" />
                <img style="width: 126px; height: 125px; position: absolute;    right: 400px;;z-index:1;"
                    src="{{isset($block2->image2) ? $block2->image2: ''}}" alt="" />

            </div>


        </div>
    </section>
    <!-- /PAGE -->
    <section class="page-section">
        <div class="container">
            <iframe width="90%" height="100%"

                src="https://www.youtube.com/embed/{{isset($block3->video) ? $block3->video: ''}}" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </section>

    <!-- PAGE -->
    <section class="page-section">
        <div class="container">
            <img src="{{asset('storage/static_img/43-layers.png')}}">
        </div>
    </section>
    <!-- /PAGE -->

    <!-- PAGE -->
    <section class="page-section">
        <div class="container">

            <h2 class="block-title" style="color: #171717;
font-family: Montserrat;
font-size: 30px;
font-weight: 700;
line-height: 43px;
text-transform: uppercase;text-align: center;">Подивіться наш блог</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="recent-post">
                        <div class="media">
                            <a class="pull-left media-link" href="#">
                                <img class="media-object" src="{{asset('storage/static_img/blog1.jpg')}}" alt="">
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading"><a href="#">Standard Post Comment Header Here</a></h4>
                                <p style="color: #171717;
font-family: Montserrat;
font-size: 18px;
font-weight: 400;
line-height: 25px;">Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante.</p>

                            </div>
                            <a style="
    color: #02bbdb;
    font-family: Montserrat;
    font-size: 20px;
    font-weight: 400;
    line-height: 19px;
    margin-left: 25%;" href="#">show more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-post">
                        <div class="media">
                            <a class="pull-left media-link" href="#">
                                <img class="media-object" src="{{asset('storage/static_img/blog2.jpg')}}" alt="">
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading"><a href="#">Standard Post Comment Header Here</a></h4>
                                <p style="color: #171717;
font-family: Montserrat;
font-size: 18px;
font-weight: 400;
line-height: 25px;">Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante.</p>

                            </div>
                            <a style="
    color: #02bbdb;
    font-family: Montserrat;
    font-size: 20px;
    font-weight: 400;
    line-height: 19px;
    margin-left: 25%;" href="#">show more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-post">
                        <div class="media">
                            <a class="pull-left media-link" href="#">
                                <img class="media-object" src="{{asset('storage/static_img/blog3.jpg')}}" alt="">
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading"><a href="#">Standard Post Comment Header Here</a></h4>
                                <p style="color: #171717;
font-family: Montserrat;
font-size: 18px;
font-weight: 400;
line-height: 25px;">Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante.</p>

                            </div>
                            <a style="
    color: #02bbdb;
    font-family: Montserrat;
    font-size: 20px;
    font-weight: 400;
    line-height: 19px;
    margin-left: 25%;" href="#">show more</a>
                        </div>
                    </div>
                </div>

            </div>
            <a style="    margin-left: 40%;" class="btn btnslider" href="#">Детальніше</a>
        </div>

    </section>
    <!-- /PAGE -->


    </div>
    <!-- /CONTENT AREA -->

@endsection
