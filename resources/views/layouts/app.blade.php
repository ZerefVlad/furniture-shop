{{--@php--}}
{{--    use App\Models\Category;--}}
{{--    use App\Models\Product;--}}


{{--        $user_ip = request()->ip();--}}
{{--        /**            * @var app/Models/Category        **/--}}
{{--        $categories_header = Category::all();--}}

{{--$product = isset($product) ? $product : null;--}}

{{--$meta_title = $product&& !is_array($product) ? $product->meta_title : '';--}}
{{-- $meta_description = $product && !is_array($product) ? $product->meta_description : '';--}}

{{--$result = 'Kyiv';--}}
{{--$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$user_ip));--}}
{{--if($ip_data && $ip_data->geoplugin_countryName != null)--}}
{{--{--}}
{{--    $result = $ip_data->geoplugin_city;--}}
{{--    if(!$result) {--}}
{{--        $result = 'Kyiv';--}}
{{--    }--}}
{{--}--}}

{{--    if(auth()->guest()){--}}
{{--     $views =  \App\Models\Views::where('user_track', \Session::get('hash'))->skip(0)->latest('created_at')->take(4)->get();--}}
{{-- } else--}}
{{--  {--}}
{{--        $views =  \App\Models\Views::where('user_track', auth()->user()->id)->skip(0)->latest('created_at')->take(4)->get();--}}

{{--  }--}}


{{--@endphp--}}
{{--        <!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>Breston - Iнтернет магазин меблiв | Интернет магазин мебели {{$meta_title}}</title>--}}
{{--    <meta name="description" content="{{$meta_description}} Мебель для дома в магазине Breston. &#9742;     (066) 123-45-67. Самые низкие цены! Товары для дома и сувениры с доставкой по Украине." />--}}

{{--    <script--}}
{{--            src="https://code.jquery.com/jquery-3.3.1.min.js"--}}
{{--            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    <link rel="icon" href="{{asset('storage/static_img/Logo.png')}}" type="images/png">--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
{{--    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">--}}
{{--    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>--}}
{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

{{--    <style >--}}

{{--    </style>--}}


{{--    <!-- CSS Global -->--}}
{{--    <link href="{{ asset('js/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{ asset('js/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{ asset('js/plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{ asset('js/plugins/prettyphoto/css/prettyPhoto.css')}}" rel="stylesheet">--}}
{{--    <link href="{{ asset('js/plugins/owl-carousel2/assets/owl.carousel.css')}}" rel="stylesheet">--}}
{{--    <link href="{{ asset('js/plugins/owl-carousel2/assets/owl.theme.default.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{ asset('js/plugins/animate/animate.min.css')}}" rel="stylesheet">--}}
{{--    <!-- Theme CSS -->--}}
{{--    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">--}}

{{--    <!-- Head Libs -->--}}
{{--    <script src="{{ asset('js/plugins/modernizr.custom.js')}}"></script>--}}


{{--    <script src="{{asset('js/slides.js')}}"></script>--}}

{{--<script>--}}


{{--</script>--}}


{{--</head>--}}
{{--<body>--}}

{{--<div id="app">--}}
{{--    --}}{{--        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
{{--    --}}{{--            <div class="container">--}}
{{--    --}}{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--    --}}{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--    --}}{{--                </a>--}}
{{--    --}}{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--    --}}{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--    --}}{{--                </button>--}}

{{--    --}}{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--    --}}{{--                    <!-- Left Side Of Navbar -->--}}
{{--    --}}{{--                    <ul class="navbar-nav mr-auto">--}}

{{--    --}}{{--                    </ul>--}}

{{--    --}}{{--                    <!-- Right Side Of Navbar -->--}}
{{--    --}}{{--                    <ul class="navbar-nav ml-auto">--}}





{{--    --}}{{--                        <a href="#main">--}}
{{--    --}}{{--                        <li>--}}
{{--    --}}{{--                            <i class="material-icons">--}}
{{--    --}}{{--                                shopping_cart--}}
{{--    --}}{{--                            </i>--}}
{{--    --}}{{--                            <span id="cart-product-count" data-count="0" class="badge-success"></span>--}}
{{--    --}}{{--                        </li>--}}
{{--    --}}{{--                        </a>--}}

{{--                            <!-- Authentication Links -->--}}
{{--                            @guest--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                                @if (Route::has('register'))--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <li class="nav-item dropdown">--}}
{{--                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                        {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                    </a>--}}

{{--                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                           onclick="event.preventDefault();--}}
{{--                                                         document.getElementById('logout-form').submit();">--}}
{{--                                            {{ __('Logout') }}--}}
{{--                                        </a>--}}

{{--                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endguest--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </nav>--}}

{{--    <main class="py-4">--}}
{{--        --}}{{--            @yield('content')--}}
{{--    </main>--}}

{{--    <!-- WRAPPER -->--}}
{{--    <div class="wrapper">--}}

{{--        <!-- Popup: Shopping cart items -->--}}
{{--        <!-- /Popup: Shopping cart items -->--}}

{{--        <!-- Header top bar -->--}}
{{--        <div class="top-bar">--}}
{{--            <div class="container">--}}
{{--                <div class="top-bar-left">--}}
{{--                    <ul class="list-inline">--}}

{{--                        <li class="hidden-xs"><a href="{{route('about')}}">Про нас</a></li>--}}
{{--                        <li class="hidden-xs"><a href="{{route('show-posts')}}">Блог</a></li>--}}
{{--                        <li class="hidden-xs"><a href="{{route('contact')}}">Контакти</a></li>--}}
{{--                        <li class="hidden-xs"><a href="{{route('faq')}}">Популярнi питання</a></li>--}}



{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="top-bar-right">--}}
{{--                    <ul class="list-inline">--}}
{{--                        <!----}}
{{--                        <li class="icon-user"><a href="login.html"><img src="assets/img/icon-1.png" alt=""/> <span>Login</span></a></li>--}}
{{--                        <li class="icon-form"><a href="login.html"><img src="assets/img/icon-2.png" alt=""/> <span>Not a Member? <span class="colored">Sign Up</span></span></a></li>--}}
{{--                        <li><a href="mailto:support@yourdomain.com"><i class="fa fa-envelope"></i> <span>support@yourdomain.com</span></a></li>--}}
{{--                         -->--}}

{{--                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>--}}
{{--                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>--}}
{{--                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>--}}
{{--                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /Header top bar -->--}}

{{--        <!-- HEADER -->--}}
{{--        <header class="header">--}}
{{--            <div class="header-wrapper">--}}
{{--                <div class="container" style="text-align: -webkit-center;">--}}

{{--                    <!-- Logo -->--}}
{{--                    <div class="logo" style="margin: 0 !important;">--}}
{{--                        <a href="{{route('main-page')}}"><img src="{{asset('storage/static_img/Logo.png')}}" alt="Alka Shop"/></a>--}}
{{--                    </div>--}}
{{--                    <!-- /Logo -->--}}

{{--                    <!-- Header search -->--}}
{{--                    <div class="header-left">--}}
{{--                        <div style="position: relative;float: left;     margin-top: -4%;">--}}
{{--                            <a id="tophead-text1"  style="margin-bottom: 2%" href="#">{{$result}}</a>--}}
{{--                            <p id="tophead-text2"> | </p>--}}
{{--                        </div>--}}

{{--                        <div style="position: relative;float: left;    margin-top: -10px;">--}}
{{--                            <p style="margin: 0 0 0px 20px;"> +38 096 7062381</p>--}}
{{--                            <p style="margin: 0 0 0px 20px;"> +38 067 2013772</p>--}}
{{--                            <p style="margin: 0 0 0px 20px;"> +38 066 9712921</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <!-- /Header search -->--}}

{{--                    <!-- Header shopping cart -->--}}
{{--                    <div class="header-cart">--}}
{{--                        <div class="header-search" style="    top: 0px;    position: absolute;    right: 95%;   width: 270px;    max-width: 50%;">--}}
{{--                            <input id="search-product" class="form-control" type="text" placeholder="Пошук"/>--}}
{{--                            <button><i class="fa fa-search" style="    color: rgb(2, 187, 219);"></i></button>--}}
{{--                        </div>--}}
{{--                        <div class="search-result" style="--}}
{{--    position: absolute;--}}
{{--        top: 60%;--}}
{{--    right: 40%;--}}
{{--    z-index: 1024;--}}
{{--    background-color: #fff;--}}
{{--    width: 155%;--}}
{{--    border-radius: 2px;--}}
{{--    box-sizing: border-box;">--}}

{{--                        </div>--}}
{{--                        <div class="cart-wrapper">--}}
{{--                            <a href="{{route('show-likes')}}" class="btn btn-theme-transparent hidden-xs hidden-sm"><i--}}
{{--                                        class="fa fa-heart" style="    color: rgb(2, 187, 219);"></i></a>--}}
{{--                            <!--<a href="compare-products.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>-->--}}
{{--                            <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i--}}
{{--                                        class="fa fa-shopping-cart" style="    color: rgb(2, 187, 219);"></i> <span id="cart-product-count" class="badge-success" style="    color: rgb(2, 187, 219);"></span> </i> </a>--}}
{{--                            <!-- Mobile menu toggle button -->--}}
{{--                            <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>--}}
{{--                            <!-- /Mobile menu toggle button -->--}}
{{--                            @guest <ul style="float: right; font-size: 12px; margin-top: 3%;">--}}
{{--                                <li>--}}
{{--                                <a href="{{ route('login') }}" class="log-in"> <span>Увiйти</span></a></li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                                @if (Route::has('register'))--}}
{{--                                    <li class="nav-item">--}}
{{--                                      <li>  <a style="padding: 10%;color: #02bbdb;" href="{{ route('register') }}">Зарееструватися</a></li>--}}
{{--                                    </li>--}}
{{--                                @endif</ul>--}}
{{--                            @else--}}

{{--                                <ul style="float: right; font-size: 12px; margin-top: 3%;">--}}
{{--                                    <li>--}}

{{--                                         <a style="color: #02bbdb;    padding: 6px 10px;" class="log-in" href="{{ route('account') }}"  >--}}
{{--                                            Особистий кабiнет--}}
{{--                                         </a>--}}
{{--                                    </li>--}}
{{--                                    <li>  <a style="    padding: 0% 40%;color: #02bbdb;" href="{{ route('logout') }} "onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Вийти</a></li>--}}
{{--                                </ul>--}}

{{--                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="style=float: right;margin-top: 0%;">--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}

{{--                            @endguest--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Header shopping cart -->--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="navigation-wrapper" style=" height: 80px     ">--}}
{{--                <div class="container" >--}}
{{--                    <!-- Navigation -->--}}
{{--                    <nav class="navigation closed clearfix">--}}
{{--                        <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>--}}
{{--                        <ul class="nav sf-menu" style="text-align: center">--}}


{{--                            @foreach($categories_header as $category)--}}
{{--                                @if ($category->isParent())--}}
{{--                                    <li class="megamenu" style="width: 11%; height: 80px; text-transform: uppercase; font-weight: 800;"><a href="#main" style="color: #02bbdb;font-weight: 500;font-family: serif;"> {{$category->title}}</a>--}}
{{--                                        <ul>--}}
{{--                                            <li class="row" >--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="product-list">--}}

{{--                                                        <div class="media">--}}
{{--                                                            <a class="pull-left media-link"--}}
{{--                                                               href="{{route('show_product', ['category' => $category])}}" style="">--}}
{{--                                                                <img width="274px" height="168px" class="media-object"--}}
{{--                                                                     src="{{$category->getImage() ? $category->getImage()->url : '#'}}"--}}
{{--                                                                     alt="">--}}
{{--                                                                <i class="fa fa-plus"></i>--}}
{{--                                                            </a>--}}

{{--                                                            <div class="media-body">--}}
{{--                                                                <h4 class="media-heading" id="textmediabody" style="padding-left: 0"><a--}}
{{--                                                                            href="{{route('show_product', ['category' => $category])}}">Вся--}}
{{--                                                                        категорiя</a></h4>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                @foreach($category->children as $children)--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <div class="product-list">--}}

{{--                                                            <div class="media">--}}
{{--                                                                <a class="pull-left media-link"--}}
{{--                                                                   href="{{route('show_product', ['category' => $children])}}">--}}
{{--                                                                    <img width="274px" height="168px"--}}
{{--                                                                         class="media-object"--}}
{{--                                                                         src="{{$children->getImage() ? $children->getImage()->url : '#'}}"--}}
{{--                                                                         alt="">--}}
{{--                                                                    <i class="fa fa-plus"></i>--}}
{{--                                                                </a>--}}
{{--                                                                <div class="media-body">--}}
{{--                                                                    <h4 class="media-heading" id="textmediabody"  style="padding-left: 0"><a--}}
{{--                                                                                href="{{route('show_product', ['category' => $children])}}">{{$children->title}}</a>--}}
{{--                                                                    </h4>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}


{{--                                @endif--}}
{{--                            @endforeach--}}

{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                    <!-- /Navigation -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </header>--}}
{{--        <!-- /HEADER -->--}}
@php
use App\Models\Category;

    if(auth()->guest()){
     $views =  \App\Models\Views::where('user_track', \Session::get('hash'))->skip(0)->latest('created_at')->take(4)->get();
 } else
  {
        $views =  \App\Models\Views::where('user_track', auth()->user()->id)->skip(0)->latest('created_at')->take(4)->get();

  }

 /**            * @var app/Models/Category        **/
        $categories_header = Category::all();
@endphp

    @include('layouts.header')

    @yield('content')

        @if($views->count() != 0)
        <section class="page-section">
            <div class="container">

                <div class="tabs">
                    <h1 class="titletabs">Переглянутi товари</h1>


                </div>


                <div class="tab-content">


                    <!-- tab 2 -->
                    <div class="tab-pane fade active in" id="tab-2">
                        <div class="row">
                            @foreach($views as $view)
                                <div class="col-md-3 col-sm-6">
                                    <div class="thumbnail no-border no-padding">
                                        <div class="media" style=" width: 270px;height: 330px;display: table-cell;vertical-align: middle; text-align: center;">
                                            <a class="media-link" href="{{route('show_single_product', [ 'product' => $view->product, 'category' => $view->product->categories->first()])}}">
                                                <img style="max-width: 270px; max-height: 330px; "
                                                     src="{{$view->product->getImages()->first() ? $view->product->getImages()->first()->url : '#'}}"
                                                     alt=""/>
                                                <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="caption text-center">
                                            <a href="{{route('show_single_product', [ 'product' => $view->product, 'category' => $view->product->categories->first()])}}">
                                                <h4 class="caption-title prodcateegorytitle">{{$view->product->title}}</h4>
                                            </a>



                                            <div class="price">
                                                @if($view->product->categories->first()->type != 'default')
                                                    <ins>{{$view->product->getPriceWithDiscount()}} грн./пог. м</ins>
                                                    @if($view->product->discount->value != '0')
                                                        <del>{{$view->product->getPriceWithoutDiscount()}} грн./пог. м</del>
                                                    @endif
                                                @else
                                                    <ins>{{$view->product->getPriceWithDiscount()}} грн.</ins>


                                                    @if($view->product->discount->value != '0')
                                                        <del>{{$view->product->getPriceWithoutDiscount()}} грн.</del>
                                                    @endif

                                                @endif
                                            </div>
                                            <div class="buttons">

                                                @if(!$view->product->likes()->first())
                                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="{{route("add_to_like", ['product' => $view->product,'category' => $view->product->categories->first()])}}"><i
                                                                style="color: #02bbdb;" class="fa fa-heart"></i></a>
                                                @else
                                                    <a style="color: #ffffff; background-color: #1c94c4" class="btn btn-theme btn-theme-transparent btn-wish-list" href="{{route("delete_like", ['likes' => $view->product->likes()->first()])}}"><i
                                                                class="fa fa-heart"></i></a>
                                                @endif
                                                <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="{{route('show_single_product', [ 'product' => $view->product, 'category' => $view->product->categories->first()])}}">Детальныше</a>
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
    @endif

        <section class="subscribe">
    <div class="container full-width" style="background-color: #02bbdb;width: 100%; ">
        <div class="container">
            <h1 style="color: #ffffff;font-family: Montserrat, Roboto, sans-serif;font-size: 68px;font-weight: 700;line-height: 78px;        margin:0;">
                Підпишіться на наші оновлення
            </h1>
            <form action="{{route('add_subscriber')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <input style="opacity: 0.6;color: #ffffff;font-family: Montserrat;font-size: 18px;font-weight: 400;line-height: 78px;    width: 80%;         float: left;"
                           class="form-control" type="email" name="email" placeholder="Введіть свій Е-Mail" required/>


                    <input style="float: right; margin: 0% 3% 1% 0%; box-shadow: 3px 6px 12px rgba(23, 23, 23, 0.2);border-radius: 29px;background-color: #ffffff;"
                           type="submit" class="btn btn-theme btn-theme-transparent" value="Підписатися">

                </div>
            </form>
        </div>
    </div>
</section>

    <!-- FOOTER -->
        <footer class="footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">Про нас</h4>
                                <p>ULorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin
                                    ultrices
                                    suscipit. Sed commodo vel mauris vel dapibus. Lorem ipsum dolor sit amet,
                                    consectetur
                                    adipiscing elit.

                                   </p>
                                <ul class="social-icons">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
{{--                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>--}}
                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
{{--                                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">Підписатися </h4>
                                <p>Підпишіться на наші оновлення та завжди будьте в курсі останніх новинок та вигідних пропозицій.</p>
                                <form action="{{route('add_subscriber')}}" method="post" >
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email" placeholder="Введіть свій Е-Mail" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit"  class="btn btn-theme btn-theme-transparent" value="Надіслати">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Інформація</h4>
                                <ul>
                                    <li class="hidden-xs"><a href="{{route('about')}}">Про нас</a></li>
                                    <li class="hidden-xs"><a href="{{route('show-posts')}}">Блог</a></li>
                                    <li class="hidden-xs"><a href="{{route('contact')}}">Контакти</a></li>
                                    <li class="hidden-xs"><a href="{{route('faq')}}">Популярнi питання</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-categories">
                                <h4 class="widget-title">категорiЇ</h4>
                                <ul>
                                    @foreach($categories_header as $category)
                                        @if($category->isParent())
                                    <li><a href="{{route('show_product', ['category' => $category])}}">{{$category->title}}</a></li>
                                    @endif
                                        @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="footer-meta">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="copyright">Copyright 2019 Breston SHOP | All Rights Reserved</div>
                        </div>


                    </div>
                </div>
            </div>
        </footer>
        <!-- /FOOTER -->

        <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

    </div>
    <!-- /WRAPPER -->

</div>
</div>


<script src="{{asset('js/comment.js')}}"></script>

<!-- JS Global -->
<script src="{{ asset('js/plugins/jquery/jquery-1.11.1.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
{{--<script src="{{ asset('js/plugins/superfish/js/superfish.min.js')}}"></script>--}}
{{--<script src="{{ asset('js/plugins/prettyphoto/js/jquery.prettyPhoto.js')}}"></script>--}}
{{--<script src="{{ asset('js/plugins/owl-carousel2/owl.carousel.js')}}"></script>--}}
{{--<script src="{{ asset('js/plugins/jquery.sticky.min.js')}}"></script>--}}
{{--<script src="{{ asset('js/plugins/jquery.easing.min.js')}}"></script>--}}
{{--<script src="{{ asset('js/plugins/jquery.smoothscroll.min.js')}}"></script>--}}
{{--<script src="{{ asset('js/plugins/smooth-scrollbar.min.js')}}"></script>--}}


<script src="{{asset('js/cart.js')}}"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/callback.js')}}"></script>

<!-- JS Page Level -->
{{--<script src="{{asset('js/theme.js')}}"></script>--}}
</body>
</html>
