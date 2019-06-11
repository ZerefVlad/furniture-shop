@php
    use App\Models\Category;
    use App\Models\Product;


        $user_ip = request()->ip();
        /**            * @var app/Models/Category        **/
        $categories_header = Category::all();

$product = isset($product) ? $product : null;
$meta_title = '';
$meta_description = '';
if (request()->route()->getName() === 'show_single_product') {
    $meta_title = $product&& !is_array($product) ? $product->meta_title : '';
    $meta_description = $product && !is_array($product) ? $product->meta_description : '';
}


$result = 'Kyiv';
$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$user_ip));
if($ip_data && $ip_data->geoplugin_countryName != null)
{
    $result = $ip_data->geoplugin_city;
    if(!$result) {
        $result = 'Kyiv';
    }
}

    if(auth()->guest()){
     $views =  \App\Models\Views::where('user_track', \Session::get('hash'))->skip(0)->latest('created_at')->take(4)->get();
 } else
  {
        $views =  \App\Models\Views::where('user_track', auth()->user()->id)->skip(0)->latest('created_at')->take(4)->get();

  }


@endphp
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Breston - Iнтернет магазин меблiв | Интернет магазин мебели {{$meta_title}}</title>
    <meta name="description"
          content="{{$meta_description}} Мебель для дома в магазине Breston. &#9742;     (066) 971-29-21. Самые низкие цены! Мебель для дома с доставкой по Украине."/>

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="{{asset('storage/static_img/logo1.png')}}" type="images/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <style>

    </style>


    <!-- CSS Global -->
    <link href="{{ asset('js/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/prettyphoto/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/owl-carousel2/assets/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/owl-carousel2/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/animate/animate.min.css')}}" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">

    <!-- Head Libs -->
    <script src="{{ asset('js/plugins/modernizr.custom.js')}}"></script>


    <script src="{{asset('js/slides.js')}}"></script>

    <script>


    </script>


</head>
<body>

<div id="app">

    <main class="py-4">
        {{--            @yield('content')--}}
    </main>

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- Popup: Shopping cart items -->
        <!-- /Popup: Shopping cart items -->

        <!-- Header top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <ul class="list-inline">

                        <li class="hidden-xs"><a href="{{route('about')}}">Про нас</a></li>
                        <li class="hidden-xs"><a href="{{route('show-posts')}}">Блог</a></li>
                        <li class="hidden-xs"><a href="{{route('contact')}}">Контакти</a></li>
                        <li class="hidden-xs"><a href="{{route('faq')}}">Популярнi питання</a></li>
                        <li class="hidden-xs"><a href="{{route('comments')}}">Коментарі</a></li>


                    </ul>
                </div>
                <div class="top-bar-right">
                    <ul class="list-inline">


                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        {{--                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>--}}
                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                        {{--                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Header top bar -->

        <!-- HEADER -->
        <header class="header">
            <div class="header-wrapper">
                <div class="container" style="text-align: -webkit-center;">

                    <!-- Logo -->
                    <div class="logo" style="margin: 0 !important;">
                        <a href="{{route('main-page')}}"><img src="{{asset('storage/static_img/Logo.png')}}"
                                                              alt="Alka Shop"/></a>
                    </div>
                    <!-- /Logo -->

                    <!-- Header search -->
                    <div class="header-left">
                        <div style="position: relative;float: left;     margin-top: -4%;">
                            <a id="tophead-text1" style="margin-bottom: 2%" href="#">{{$result}}</a>
                            <p id="tophead-text2"> | </p>
                        </div>

                        <div style="position: relative;float: left;    margin-top: -10px;">
                            <p style="margin: 0 0 0px 20px;"> +38 096 7062381</p>
                            <p style="margin: 0 0 0px 20px;"> +38 067 2013772</p>
                            <p style="margin: 0 0 0px 20px;"> +38 066 9712921</p>
                        </div>







                    </div>
                    <!-- /Header search -->

                    <!-- Header shopping cart -->
                    <div class="header-cart">
                        <div class="header-search"
                             style="    top: 0px;    position: absolute;    right: 95%;   width: 270px;    max-width: 50%;">
                            <input id="search-product" class="form-control" type="text" placeholder="Пошук"/>
                            <button><i class="fa fa-search" style="    color: rgb(2, 187, 219);"></i></button>
                        </div>
                        <div class="search-result" style="
    position: absolute;
        top: 60%;
    right: 40%;
    z-index: 1024;
    background-color: #fff;
    width: 155%;
    border-radius: 2px;
    box-sizing: border-box;">

                        </div>
                        <div class="cart-wrapper">
                            <a href="{{route('show-likes')}}" class="btn btn-theme-transparent hidden-xs hidden-sm"><i
                                        class="fa fa-heart" style="    color: rgb(2, 187, 219);"></i></a>
                            <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i
                                        class="fa fa-shopping-cart" style="    color: rgb(2, 187, 219);"></i> <span
                                        id="cart-product-count" class="badge-success"
                                        style="    color: rgb(2, 187, 219);"></span> </i> </a>

                            @guest


                                <ul style="float: right; font-size: 12px; margin-top: 3%;">

                                    <li>
                                        <a href="{{ route('login') }}" class="log-in"> <span>Увiйти</span></a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li><a style="padding: 10%;color: #02bbdb;" href="{{ route('register') }}">Зарееструватися</a>
                                        </li>
                                    @endif</ul>
                            @else




                                <ul style="float: right; font-size: 12px; margin-top: 3%;">

                                    @if(auth()->user()->hasRole('admin')||auth()->user()->hasRole('manager'))
                                        <li>
                                            <a href="{{ route('admin-page') }}" class="log-in">
                                                <span>Адмін панель</span></a>
                                        </li>

                                    @else
                                        <li>

                                            <a style="color: #02bbdb;    padding: 6px 10px;" class="log-in"
                                               href="{{ route('account') }}">
                                                Особистий кабiнет
                                            </a>
                                        </li>
                                    @endif

                                    <li><a style="    padding: 0% 40%;color: #02bbdb;" href="{{ route('logout') }} "
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Вийти</a>
                                    </li>
                                </ul>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="float: right;margin-top: 0%;">
                                    @csrf
                                </form>

                            @endguest


                        </div>
                    </div>
                    <!-- Header shopping cart -->

                </div>
            </div>

            <div class="navigation-wrapper"  style=" height: 80px     ">

                <!-- Mobile menu toggle button -->
                <a href="#" class="navbar-toggle btn btn-theme-transparent"  data-toggle="collapse" data-target="#navig"><i class="fa fa-bars"></i></a>

                <!-- /Mobile menu toggle button -->
                <div class="container">



                    <!-- Navigation -->
                    <nav class=" navbar navigation closed clearfix" id="navig" role="navigation">
                        <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                        <ul class="nav sf-menu" style="text-align: center">


                            @foreach($categories_header as $category)
                                @if ($category->isParent())
                                    <li class="megamenu"
                                        style="width: 11.111%; height: 80px; text-transform: uppercase; font-weight: 800;">
                                        <a href="#main"
                                           style="    line-height: 20px;height: 100%;font-weight: 500;font-family: serif,sans-serif;"> {{$category->title}}</a>
                                        <ul>
                                            <li class="row">

                                                <div class="col-md-4">
                                                    <div class="product-list">

                                                        <div class="media" style="text-align: center">
                                                            <a class="pull-left media-link"
                                                               href="{{route('show_product', ['category' => $category])}}"
                                                               style="">
                                                                <img width="274px" height="168px" class="media-object"
                                                                     src="{{$category->getImage() ? $category->getImage()->url : '#'}}"
                                                                     alt="">

                                                            </a>


                                                            <h4 class="media-heading" id="textmediabody"
                                                                style="padding: 0; margin: 0; "><a
                                                                        style="color: rgb(2, 187, 219)"
                                                                        href="{{route('show_product', ['category' => $category])}}">{{$category->title}}</a>
                                                            </h4>


                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach($category->children as $children)
                                                    <div class="col-md-4">
                                                        <div class="product-list">

                                                            <div class="media" style="text-align: center">
                                                                <a class="pull-left media-link"
                                                                   href="{{route('show_product', ['category' => $children])}}">
                                                                    <img width="274px" height="168px"
                                                                         class="media-object"
                                                                         src="{{$children->getImage() ? $children->getImage()->url : '#'}}"
                                                                         alt="">

                                                                </a>

                                                                <h4 class="media-heading" id="textmediabody"
                                                                    style="padding-left: 0"><a
                                                                            style="color: rgb(2, 187, 219)"
                                                                            href="{{route('show_product', ['category' => $children])}}">{{$children->title}}</a>
                                                                </h4>


                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>


                                @endif
                            @endforeach

                        </ul>
                    </nav>
                    <!-- /Navigation -->
                </div>
            </div>
        </header>

        <!-- /HEADER -->

