@php
    use App\Models\Category;
    use App\Models\Product;


        $user_ip = request()->ip();
        /**            * @var app/Models/Category        **/
        $categories_header = Category::all();



$result = 'Kyiv';
$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$user_ip));
if($ip_data && $ip_data->geoplugin_countryName != null)
{
    $result = $ip_data->geoplugin_city;
    if(!$result) {
        $result = 'Kyiv';
    }
}



@endphp
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Breston</title>

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="{{asset('storage/static_img/Logo.png')}}" type="images/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <style >

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
    {{--        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
    {{--            <div class="container">--}}
    {{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
    {{--                    {{ config('app.name', 'Laravel') }}--}}
    {{--                </a>--}}
    {{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
    {{--                    <span class="navbar-toggler-icon"></span>--}}
    {{--                </button>--}}

    {{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
    {{--                    <!-- Left Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav mr-auto">--}}

    {{--                    </ul>--}}

    {{--                    <!-- Right Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav ml-auto">--}}





    {{--                        <a href="#main">--}}
    {{--                        <li>--}}
    {{--                            <i class="material-icons">--}}
    {{--                                shopping_cart--}}
    {{--                            </i>--}}
    {{--                            <span id="cart-product-count" data-count="0" class="badge-success"></span>--}}
    {{--                        </li>--}}
    {{--                        </a>--}}

                            <!-- Authentication Links -->
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



                    </ul>
                </div>
                <div class="top-bar-right">
                    <ul class="list-inline">
                        <!--
                        <li class="icon-user"><a href="login.html"><img src="assets/img/icon-1.png" alt=""/> <span>Login</span></a></li>
                        <li class="icon-form"><a href="login.html"><img src="assets/img/icon-2.png" alt=""/> <span>Not a Member? <span class="colored">Sign Up</span></span></a></li>
                        <li><a href="mailto:support@yourdomain.com"><i class="fa fa-envelope"></i> <span>support@yourdomain.com</span></a></li>
                         -->

                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Header top bar -->

        <!-- HEADER -->
        <header class="header">
            <div class="header-wrapper">
                <div class="container">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{route('main-page')}}"><img src="{{asset('storage/static_img/Logo.png')}}" alt="Alka Shop"/></a>
                    </div>
                    <!-- /Logo -->

                    <!-- Header search -->
                    <div class="header-left">
                        <div style="position: relative;float: left;     margin-top: -4%;">
                            <a id="tophead-text1"  style="margin-bottom: 2%" href="#">{{$result}}</a>
                            <p id="tophead-text2"> | </p>
                        </div>

                        <div style="position: relative;float: left">
                            <p  style="margin: 0 0 5px 20px;"> +38 (066) 1234567</p>
                            <p style="margin: 0 0 5px 20px;"> +38 (066) 1234567</p>
                        </div>

                    </div>
                    <!-- /Header search -->

                    <!-- Header shopping cart -->
                    <div class="header-cart">
                        <div class="header-search" style="    top: 0px;    position: absolute;    right: 95%;   width: 270px;    max-width: 50%;">
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
                            <!--<a href="compare-products.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>-->
                            <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i
                                        class="fa fa-shopping-cart" style="    color: rgb(2, 187, 219);"></i> <span id="cart-product-count" class="badge-success" style="    color: rgb(2, 187, 219);"></span> </i> </a>
                            <!-- Mobile menu toggle button -->
                            <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                            <!-- /Mobile menu toggle button -->
                            @guest <ul style="float: right; font-size: 12px; margin-top: 3%;">
                                <li>
                                <a href="{{ route('login') }}" class="log-in"> <span>Увiйти</span></a></li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
                                @if (Route::has('register'))
{{--                                    <li class="nav-item">--}}
                                      <li>  <a style="padding: 10%;color: #02bbdb;" href="{{ route('register') }}">Зарееструватися</a></li>
{{--                                    </li>--}}
                                @endif</ul>
                            @else

                                <ul style="float: right; font-size: 12px; margin-top: 3%;">
                                    <li>

                                         <a style="color: #02bbdb;    padding: 6px 10px;" class="log-in" href="{{ route('account') }}"  >
                                            Особистий кабiнет
                                         </a>
                                    </li>
                                    <li>  <a style="    padding: 0% 40%;color: #02bbdb;" href="{{ route('logout') }} "onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Вийти</a></li>
                                </ul>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="style=float: right;margin-top: 0%;">
                                            @csrf
                                        </form>

                            @endguest


                        </div>
                    </div>
                    <!-- Header shopping cart -->

                </div>
            </div>
            <div class="navigation-wrapper">
                <div class="container">
                    <!-- Navigation -->
                    <nav class="navigation closed clearfix">
                        <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                        <ul class="nav sf-menu">


                            @foreach($categories_header as $category)
                                @if ($category->isParent())
                                    <li class="megamenu"><a href="#main" style="color: #02bbdb;"> {{$category->title}}</a>
                                        <ul>
                                            <li class="row">

                                                <div class="col-md-4">
                                                    <div class="product-list">

                                                        <div class="media">
                                                            <a class="pull-left media-link"
                                                               href="{{route('show_product', ['category' => $category])}}">
                                                                <img width="274px" height="168px" class="media-object"
                                                                     src="{{$category->getImage() ? $category->getImage()->url : '#'}}"
                                                                     alt="">
                                                                <i class="fa fa-plus"></i>
                                                            </a>

                                                            <div class="media-body">
                                                                <h4 class="media-heading" id="textmediabody"><a
                                                                            href="{{route('show_product', ['category' => $category])}}">Вся
                                                                        категорiя</a></h4>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach($category->children as $children)
                                                    <div class="col-md-4">
                                                        <div class="product-list">

                                                            <div class="media">
                                                                <a class="pull-left media-link"
                                                                   href="{{route('show_product', ['category' => $children])}}">
                                                                    <img width="274px" height="168px"
                                                                         class="media-object"
                                                                         src="{{$children->getImage() ? $children->getImage()->url : '#'}}"
                                                                         alt="">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading" id="textmediabody"><a
                                                                                href="{{route('show_product', ['category' => $children])}}">{{$children->title}}</a>
                                                                    </h4>

                                                                </div>
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
    @yield('content')


    <!-- FOOTER -->
        <footer class="footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin
                                    ultrices
                                    suscipit. Sed commodo vel mauris vel dapibus. Lorem ipsum dolor sit amet,
                                    consectetur
                                    adipiscing elit.</p>
                                <ul class="social-icons">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">News Letter</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <form action="{{route('add_subscriber')}}" method="post" >
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="text" placeholder="Enter Your Mail"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit"  class="btn btn-theme btn-theme-transparent" value="Отправить">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Information</h4>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="#">Private Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Category</h4>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="#">Private Policy</a></li>
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
