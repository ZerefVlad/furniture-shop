@php
use App\Models\Category;
    $user_ip = request()->ip();
    /**
        @var app/Models/Category
    **/
    $categories_header = Category::all();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bella Shop</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="{{ asset('js/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/prettyphoto/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/owl-carousel2/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/owl-carousel2/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/plugins/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <!--<link href="assets/css/theme-green-1.css" rel="stylesheet" id="theme-config-link">-->

    <!-- Head Libs -->
    <script src="{{ asset('js/plugins/modernizr.custom.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('js/plugins/iesupport/html5shiv.js') }}"></script>
    <script src="{{ asset('js/plugins/iesupport/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body id="home" class="wide">
{{--<!-- PRELOADER -->--}}
{{--<div id="preloader">--}}
{{--    <div id="preloader-status">--}}
{{--        <div class="spinner">--}}
{{--            <div class="rect1"></div>--}}
{{--            <div class="rect2"></div>--}}
{{--            <div class="rect3"></div>--}}
{{--            <div class="rect4"></div>--}}
{{--            <div class="rect5"></div>--}}
{{--        </div>--}}
{{--        <div id="preloader-title">Loading</div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- /PRELOADER -->--}}

<!-- WRAPPER -->
<div class="wrapper">

    <!-- Popup: Shopping cart items -->
    <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="container">
                <div class="cart-items">
                    <div class="cart-items-inner">
                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object item-image"
                                                               src="assets/img/preview/shop/order-1s.jpg" alt=""></a>
                            <p class="pull-right item-price">$450.00</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title"><a href="#">1x Standard Product</a></h4>
                                <p class="item-desc">Lorem ipsum dolor</p>
                            </div>
                        </div>
                        <div class="media">
                            <p class="pull-right item-price">$450.00</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title summary">Subtotal</h4>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a><!--
                                    --><a href="shopping-cart.html"
                                          class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Popup: Shopping cart items -->

    <!-- Header top bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <ul class="list-inline">

                    <li class="hidden-xs"><a href="about.html">About</a></li>
                    <li class="hidden-xs"><a href="blog.html">Blog</a></li>
                    <li class="hidden-xs"><a href="contact.html">Contact</a></li>
                    <li class="hidden-xs"><a href="faq.html">FAQ</a></li>
                    <li class="hidden-xs"><a href="wishlist.html">My Wishlist</a></li>


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
                    <a href="index.html"><img src="{{asset('storage/static_img/Logo.png')}}" alt="Alka Shop"/></a>
                </div>
                <!-- /Logo -->

                <!-- Header search -->
                <div class="header-left">
                    <a id="tophead-text1" href="#">ip({{$user_ip}}) </a>
                    <p id="tophead-text2"> | </p>
                    <p id="tophead-text3"> +38 (066) 1234567</p>
                </div>
                <!-- /Header search -->

                <!-- Header shopping cart -->
                <div class="header-cart">
                    <div class="header-search">
                        <input class="form-control" type="text" placeholder="What are you looking?"/>
                        <button><i class="fa fa-search"></i></button>
                    </div>
                    <div class="cart-wrapper">
                        <a href="wishlist.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i
                                    class="fa fa-heart"></i></a>
                        <!--<a href="compare-products.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>-->
                        <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i
                                    class="fa fa-shopping-cart"></i> <span class="hidden-xs"> </i></a>
                        <!-- Mobile menu toggle button -->
                        <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                        <!-- /Mobile menu toggle button -->
                        <a href="login.html" class="log-in"> <span>Войти</span></a>
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
                                <li class="megamenu"><a href="#main">{{$category->title}}</a>
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
                                                                <img width="274px" height="168px" class="media-object"
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin ultrices
                                suscipit. Sed commodo vel mauris vel dapibus. Lorem ipsum dolor sit amet, consectetur
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
                            <form action="#">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Your Mail"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-theme btn-theme-transparent">Subscribe</button>
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
                        <div class="copyright">Copyright 2019 ALKAMEBEL SHOP | All Rights Reserved</div>
                    </div>


                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>
<!-- /WRAPPER -->

<!-- JS Global -->
<script src="{{ asset('js/plugins/jquery/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('js/plugins/superfish/js/superfish.min.js')}}"></script>
<script src="{{ asset('js/plugins/prettyphoto/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('js/plugins/owl-carousel2/owl.carousel.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.sticky.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.easing.min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.smoothscroll.min.js')}}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js')}}"></script>

<script src="{{asset('js/cart.js')}}"></script>
<script src="{{asset('js/comment.js')}}"></script>

<!-- JS Page Level -->
<script src="{{asset('js/theme.js')}}"></script>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ asset('js/plugins/jquery.cookie.js')}}"></script>
<!--<script src="assets/js/theme-config.js"></script>-->
<!--<![endif]-->

</body>
</html>