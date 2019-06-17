@extends('layouts.app')

@section('content')

    <!-- CONTENT AREA -->


    <section class="page-section no-padding slider" style="background-color: #f3f3f3;    padding-top: 50px;">
        <div class="container full-width">

{{--            <div class="main-slider">--}}

{{--                <span class="pre"--}}
{{--                      style="    position: absolute;     top: 265px;    left: 150px;    font-size: 80px;    color: rgb(2, 187, 219);"><i--}}
{{--                            class="fa fa-angle-left"></i></span>--}}
{{--                <span class="nex" style="    position: absolute;--}}
{{--        top: 265px;--}}
{{--    right: 127px;--}}
{{--    font-size: 80px;--}}
{{--    color: rgb(2, 187, 219);"><i class="fa fa-angle-right"></i></span>--}}

{{--                <ul id="slides">--}}
{{--                    @if ($textSlides)--}}
{{--                        @foreach($textSlides as $slide)--}}
{{--                            <li class="slide showing">--}}
{{--                                <div class="item slide1 dark alt">--}}
{{--                                    <div class="caption">--}}
{{--                                        <div class="container" style="background-color: rgb(243, 243, 243);">--}}
{{--                                            <div class="div-table">--}}
{{--                                                <div class="div-cell">--}}
{{--                                                    <div class="caption-content"--}}
{{--                                                         style="background-color: rgb(243, 243, 243);">--}}
{{--                                                        <h2 class="caption-title"--}}
{{--                                                            style=" color: #333333;">{{$slide->title}}</h2>--}}
{{--                                                        <h3 class="caption-text"--}}
{{--                                                            style=" color: #333333;word-break: break-all">{{$slide->description}}</h3>--}}
{{--                                                        <p class="caption-text">--}}
{{--                                                            <a class="btn btnslider"--}}
{{--                                                               href="{{$slide->url}}">Детальніше</a>--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <img style="width: 516px; height: 388px;     position: absolute;    top: 0;  right: 0;"--}}
{{--                                             src="{{$slide->image}}" alt=""/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}

{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                    @if ($videoSlides)--}}
{{--                        @foreach($videoSlides as $slide)--}}
{{--                            <li class="slide showing">--}}
{{--                                <div class="item slide3 dark">--}}

{{--                                    <div class="caption">--}}
{{--                                        <div class="container" style="background-color: rgb(243, 243, 243);">--}}
{{--                                            <iframe width="90%" height="100%"--}}

{{--                                                    src="https://www.youtube.com/embed/{{$slide}}" frameborder="0"--}}
{{--                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
{{--                                                    allowfullscreen></iframe>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                    @if ($pictureSlides)--}}
{{--                        @foreach($pictureSlides as $slide)--}}
{{--                            <li class="slide showing">--}}
{{--                                <div class="item slide3 dark">--}}

{{--                                    <div class="caption">--}}
{{--                                        <div class="container"--}}
{{--                                             style="background-color: rgb(243, 243, 243);text-align: center">--}}
{{--                                            <a href="{{$slide->url_picture}}">--}}
{{--                                                <img style="max-width: 100%; max-height: 100%"--}}
{{--                                                     src="{{$slide->picture}}" alt=""/>--}}
{{--                                            </a>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                    --}}{{--                    <li class="slide">Slide 3</li>--}}
{{--                    --}}{{--                    <li class="slide">Slide 4</li>--}}
{{--                    --}}{{--                    <li class="slide">Slide 5</li>--}}
{{--                </ul>--}}
{{--            </div>--}}


            <div class="w3-content w3-display-container" style="max-width:1170px">

                @if ($pictureSlides)
                    @foreach($pictureSlides as $slide)

                    <div class="mySlides" style="text-align: center; height: 500px">

                        <img style="max-width: 100%; max-height: 500px;"
                             src="{{$slide->picture}}">

                    </div>

                    @endforeach
                @endif

                    @if ($textSlides)
                        @foreach($textSlides as $slide)

                            <div class="mySlides" style=" height: 500px">

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
                                             src="{{$slide->image}}" alt=""/>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                    @if ($videoSlides)
                        @foreach($videoSlides as $slide)

                            <div class="mySlides" style="text-align: center; height: 500px">



                                        <iframe height="100%"

                                                src="https://www.youtube.com/embed/{{$slide}}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>



                            </div>

                        @endforeach
                    @endif

                <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle"
                     style="width:100%">
                    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                    @for($i = 1; $i <= count($pictureSlides)+count($textSlides)+count($videoSlides); $i++)
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white"
                              onclick="currentDiv({{$i}})"></span>

                    @endfor

                </div>
            </div>

            <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                    showDivs(slideIndex += n);
                }

                function currentDiv(n) {
                    showDivs(slideIndex = n);
                }

                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("demo");
                    if (n > x.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = x.length
                    }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" w3-white", "");
                    }
                    x[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " w3-white";
                }
            </script>
        </div>
    </section>


    {{--@foreach($products as $product)--}}
    {{--{{$product->title}}--}}
    {{--@endforeach--}}

    <!-- PAGE -->
    <section class="page-section">
        <div class="container">

            <div class="tabs">
                <h1 class="titletabs">Оцініть останні новинки</h1>
                <p class="titletext ">Представляємо Вашій увазі нові моделі м’яких та корпусних меблів сезону літо
                    2019.</p>
            </div>


            <div class="tab-content">


                <!-- tab 2 -->
                <div class="tab-pane fade active in" id="tab-2">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="thumbnail no-border no-padding">
                                    <div class="media"
                                         style=" width: 270px;height: 330px;display: table-cell;vertical-align: middle; text-align: center;">
                                        <a class="media-link"
                                           href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
                                            <img style="max-width: 270px; max-height: 330px; "
                                                 src="{{$product->getImages()->first() ? $product->getImages()->first()->url : '#'}}"
                                                 alt=""/>
                                            <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                </span>
                                        </a>
                                    </div>
                                    <div class="caption text-center">
                                        <a href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
                                            <h4 class="caption-title prodcateegorytitle">{{$product->title}}</h4>
                                        </a>


                                        <div class="price">
                                            @if($product->categories->first()->type != 'default')
                                                <ins>{{$product->getPriceWithDiscount()}} грн./пог. м</ins>

                                                @if($product->discount->value != '0')
                                                    <del>{{$product->getPriceWithoutDiscount()}}грн./пог. м</del>
                                                @endif
                                            @else
                                                <ins>{{$product->getPriceWithDiscount()}} грн.</ins>


                                                @if($product->discount->value != '0')
                                                    <del>{{$product->getPriceWithoutDiscount()}}грн.</del>
                                                @endif

                                            @endif
                                        </div>
                                        <div class="buttons">

                                            @if(!$product->likes()->first())
                                                <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                   href="{{route("add_to_like", ['product' => $product,'category' => $product->categories->first()])}}"><i
                                                            style="color: #02bbdb;" class="fa fa-heart"></i></a>
                                            @else
                                                <a style="color: #ffffff; background-color: #1c94c4"
                                                   class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                   href="{{route("delete_like", ['likes' => $product->likes()->first()])}}"><i
                                                            class="fa fa-heart"></i></a>
                                            @endif
                                            <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                               href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">Детальныше</a>
                                            {{--                                                @if(!$product->likes()->first())--}}
                                            {{--                                                <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="{{route("add_to_like", ['product' => $product,'category' => $product->categories->first()])}}">До лайку</a>--}}
                                            {{--                                                @else--}}
                                            {{--                                                <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="{{route("delete_like", ['likes' => $product->likes()->first()])}}">Delete лайку</a>--}}
                                            {{--                                                @endif--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                <p class="titletext ">Саме для Вас компанія Breston пропонує вигідні пропозиції</p>
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
                     src="{{isset($block2->image) ? $block2->image: ''}}" alt=""/>
                <img style="max-width: 200px; max-height: 200px; position: absolute;    right: 400px;;z-index:1;"
                     src="{{isset($block2->image2) ? $block2->image2: ''}}" alt=""/>

            </div>


        </div>
    </section>
    <!-- /PAGE -->



    <section class="page-section" style="padding-bottom: 80px">
        <div class="container">

            <div class="tabs">
                <h1 class="titletabs">Подивiться наше вiдео</h1>

            </div>

            <div style="    margin: 0 8%;height: 570px;
    box-shadow: 20px 12px 60px rgba(0,0,0,0.5);">
                <iframe width="80%" height="100%"

                        src="https://www.youtube.com/embed/{{isset($block3->video) ? $block3->video: ''}}"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <section class="page-section" style="">
        <div class="container">

            <div class="tabs">
                <h1 class="titletabs">Про Нашу Компанiю</h1>
                <p class="titletext ">Breston – твій надійний партнер у світі меблів!</p>
            </div>

            <div class="col-md-6" style="width: 50%;padding: 0% 3%;">

                {{--            <p class="lead" style="font-weight: 600;font-family: Lato;font-size: 22px;">Наша компанія пропонує Вашій увазі широкий асортимент корпусних та м’яких меблів класу «економ», «стандарт», «преміум», «люкс» на будь-який смак. </p>--}}

                <p style="font-weight: 300;font-family: Lato;font-size: 20px;">
                    Наша компанія пропонує Вашій увазі широкий асортимент корпусних та м’яких меблів класу «економ»,
                    «стандарт», «преміум», «люкс» на будь-який смак.
                </p>
                <p style="font-weight: 300;font-family: Lato;font-size: 20px;">
                    Завітайте до наших салонів і ми допоможемо Вам створити оселю Вашої мрії. Наші менеджери
                    запропонують Вам найкращі варіанти меблів, нададуть якісну консультацію щодо вибору тієї чи іншої
                    моделі, матеріалу виходячи із Ваших побажань. </p>
                <p style="font-weight: 300;font-family: Lato;font-size: 20px;">
                    Наша місія – забезпечити Вас якісними, комфортними, привабливими меблями, які будуть створювати
                    затишок у Вашому домі.
                </p>
            </div>
            <div class="col-md-6" style="width: 50%; height: 320px">
                <table style="color: #FFFFFF; background-color: #02bbdb; width: 100%; height: 100%;text-align: center; border-radius: 15px;border-collapse: separate;">


                    <tr>
                        <td style="width: 50%;box-shadow: rgba(0, 0, 0, 0.5) 15px 15px 30px;"><a class="1000plus"
                                                                                                 style="color: #FFFFFF"
                                                                                                 href="{{route('about')}}">
                                <p style="margin-bottom: 5px;   ;font-size: 36px;">
                                    50000+
                                </p>
                                <p style="margin: 5% 10%;font-family: Lato;font-size: 22px;    font-weight: 500;">
                                    Реалізованих товарів
                                </p>
                            </a>
                        </td>
                        <td style="width: 50%;    border: 1px solid;">
                            <p style="margin: 5% 10%;font-family: Lato;font-size: 22px;    font-weight: 500;">
                                Висококваліфікована команда
                            </p>


                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;    border: 1px solid;">
                            <p style="margin-bottom: 5px;   ;font-size: 36px;">
                                10+
                            </p>
                            <p style="margin: 5% 10%;font-family: Lato;font-size: 22px;    font-weight: 500;">
                                Років на ринку меблів України
                            </p>
                        </td>
                        <td style="width: 50%;   ">

                            <p style="margin: 5% 10%;font-family: Lato;font-size: 22px;    font-weight: 500;">
                                Вигідні пропозиції
                            </p>
                            <p style="margin: 5% 10%;font-family: Lato;font-size: 22px;    font-weight: 500;">
                                Програма лояльності
                            </p>
                            <p style="margin: 5% 10%;font-family: Lato;font-size: 22px;    font-weight: 500;">
                                Привабливі знижки
                            </p>
                        </td>
                    </tr>

                </table>

            </div>
            {{--            <div class="col-md-12" style="padding: 0% 3%;">--}}

            {{--                <p style="font-weight: 300;font-family: Lato;font-size: 18px;">--}}
            {{--                    Наша місія – забезпечити Вас якісними, комфортними, привабливими меблями, які будуть створювати затишок у Вашому домі.--}}
            {{--            </div>--}}
        </div>
    </section>

    <!-- PAGE -->
    {{--    <section class="page-section">--}}
    {{--        <div class="container">--}}
    {{--            <img src="{{asset('storage/static_img/43-layers.png')}}">--}}
    {{--        </div>--}}
    {{--    </section>--}}
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
                @foreach($posts as $post)

                    <div class="col-md-4">
                        <div class="recent-post">
                            <div class="media"
                                 style="    width: 330px; height: 230px; display: table-cell; vertical-align: middle;  text-align: center;">
                                <a class="pull-left media-link" href="#" style="float: none !important;">
                                    <img style="    max-width: 330px; max-height: 210px;" class="media-object"
                                         src="{{$post->getImage() ? $post->getImage()->url : '#'}}" alt="">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="media-body" style="float: left; width: 100%;text-align: left;">

                                    <h4 class="media-heading" style="text-align: center"><a
                                                href="#">{{$post->title}}</a></h4>
                                    <p style="color: #171717;font-family: Montserrat;font-size: 18px;font-weight: 400;line-height: 25px;    word-break: break-all;">
                                        {{mb_substr("$post->text",0,200,'utf-8')}}</p>

                                </div>
                                <a style="color: #02bbdb;font-family: Montserrat;font-size: 20px;font-weight: 400;line-height: 19px;"
                                   href="{{route('show-post', ['post' => $post])}}">показати бiльше</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <a style="    margin-left: 40%;" class="btn btnslider" href="{{route('show-posts')}}">Детальніше</a>
        </div>

    </section>
    <!-- /PAGE -->


    </div>
    <!-- /CONTENT AREA -->

@endsection
