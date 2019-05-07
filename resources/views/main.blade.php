@extends('layouts.app')

@section('content')

    <!-- CONTENT AREA -->

    <div class="content-area">

        <!-- PAGE -->
        <section class="page-section no-padding slider">
            <div class="container full-width">

                <div class="main-slider">
                    <div class="owl-carousel" id="main-slider">

                        <!-- Slide 1 -->
                        <div class="item slide1 dark alt">

                            <div class="caption">
                                <div class="container">
                                    <div class="div-table">
                                        <div class="div-cell">
                                            <div class="caption-content">
                                                <h2 class="caption-title" style=" color: #333333;">But I must explain to
                                                    you how all this mistaken idea of denouncing pleasure and praising
                                                    pain.</h2>
                                                <h3 class="caption-text" style=" color: #333333;">Lorem ipsum dolor sit
                                                    amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                    invidunt ut labore et dolore magna aliquyam.</h3>
                                                <p class="caption-text">
                                                    <a class="btn btnslider" href="#">Детальніше</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img style="width: 516px; height: 388px; float:right;"  src="{{asset('storage/static_img/bed.jpg')}}" alt=""/>
                            </div>
                        </div>
                        <!-- /Slide 1 -->


                        <!-- Slide 3 -->
                        <div class="item slide3 dark">
                            <img class="slide-img"
                                 src="{{asset('storage/static_img/bed.jpg')}}" alt=""/>
                            <div class="caption">
                                <div class="container">
                                    <iframe width="90%" height="100%"
                                            style="margin-left: 30px;"
                                            src="https://www.youtube.com/embed/tqGPIvIZo3I"  frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- /Slide 3 -->

                    </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

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
                                            <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>

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
                                            <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>

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
                                            <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>

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
                                            <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>

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
                     letter-spacing: 0.84px;">Диван "Імперия ІІ" (Україна)</h2>
                    <h3 class="caption-text" style="
                     color: #5e6471;
                     font-family: Lato;
                     font-size: 18px;
                     font-weight: 400;
">Де ж як не на дивані приємно відпочити після насиченого дня?
                        На цьому предметі інтер'єру лежить велика відповідальність - він повинен бути неймовірно
                        зручним! Ви тільки подивіться на ці м'які закруглені боковини - ніякого ризику напоротися
                        головою на гострі кути. Ви можете повністю розслабитися і відпочити, не думаючи ні про що
                        зайвому.
                        Спецiальна пропозицiя для цього товару:
                        При покупцi дивану "Iмперiя II" ми надаємо знижку для столу "Flower"!</h3>
                    <h2 class="caption-title" style="color: #333333;
                     font-family: Montserrat;
                     font-size: 21px;
                     font-weight: 600;
                     letter-spacing: 0.84px;">Диван "Імперия ІІ" (Україна)</h2>

                    <h3 class="caption-text" style="
                     color: #5e6471;
                     font-family: Lato;
                     font-size: 18px;
                     font-weight: 400;
">

                        Справжнє диво сучасного дизайну. Незважаючи на уявну компактність, стіл може розкладатися,
                        завдяки бічним висувним "крильцям". Також є нижня полиця. Стільниця виконана з скла з
                        візерунками. Колір малюнка надається на вибір: сніжно-білий або кремовий. Ніжки металеві
                        хромовані. Ця модель припаде до душі любителям хай-тека.</h3>
                    <p class="caption-text">
                        <a class="btn btnslider" href="#">Детальніше</a>
                    </p>
                </div>
                <div style="position: relative;">
                    <img style="width: 516px; height: 388px; position: absolute;right: 0;z-index: 0;"
                         src="{{asset('storage/static_img/bed.jpg')}}" alt=""/>
                    <img style="width: 126px; height: 125px; position: absolute;    right: 400px;;z-index:1;"
                         src="{{asset('storage/static_img/dop_tov.jpg')}}" alt=""/>

                </div>


            </div>
        </section>
        <!-- /PAGE -->

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