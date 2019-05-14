@extends('layouts.app')

@section('content')

    <!-- BREADCRUMBS -->
    <div class="tabs">
        <h1 class="titletabs" style="color: #171717;font-family: Montserrat;font-size: 38px;font-weight: 700;line-height: 55px;text-transform: uppercase;">{{$post->title}}</h1>
{{--        <p class="titletext" style="color: #252424;font-family: Montserrat;font-size: 18px;font-weight: 400;padding: 0;">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.--}}
{{--        </p>--}}
    </div>
    <!-- /BREADCRUMBS -->

    <!-- PAGE WITH SIDEBAR -->
    <section class="page-section with-sidebar">
        <div class="container">
            <div class="row">

                <!-- CONTENT -->
                <div class="col-md-12 content" id="content">

                    <!-- Blog post -->
                    <article class="post-wrap post-single">
                        <div class="post-media">
                            <a href="assets/img/post22.jpg" data-gal="prettyPhoto"><img style="max-width: 1140px" src="{{$post->getImage() ? $post->getImage()->url : '#'}}" alt=""></a>
                        </div>
                        <div class="post-header">

                            <div class="post-meta"> <a href="#">Пост создан:</a> {{$post->created_at->format('d F, Y')}} </div>
                        </div>
                        <div class="post-body">
                            <div class="post-excerpt">

                                <p>{{$post->text}}</p>

                            </div>
                        </div>
                    </article>
                    <!-- /Blog post -->



                </div>
                <!-- /CONTENT -->

            </div>
        </div>
    </section>
    <!-- /PAGE WITH SIDEBAR -->




@endsection