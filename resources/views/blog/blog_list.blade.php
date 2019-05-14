@php
        @endphp
@extends('layouts.app')

@section('content')

{{--    @foreach($posts as $post)--}}
{{--       <a href="{{route('show-post', ['post' => $post])}}"> {{ $post->title}}</a>--}}
{{--    @endforeach--}}


    <section class="content">
        <div class="container">
            <div class="tabs">
                <h1 class="titletabs">Наш блог</h1>
                <p class="titletext" style="color: #252424;font-family: Roboto;font-size: 18px;
                    font-weight: 400;">But I must explain to you how all this mistaken idea of denouncing pleasure and
                    praising pain was born and I will give you a complete account of the system.
                </p>
            </div>


            <div class="content">
{{--                <div class="post-wrap">--}}

{{--                    <div class="caption-content" style="position: relative;float:left;width: 50%;margin-top: 50px;">--}}
{{--                        <h2 class="caption-title"--}}
{{--                            style="color: #02bbdb;font-family: Montserrat;font-size: 28px;font-weight: 500;line-height: 30px; text-transform: uppercase;">--}}
{{--                            Диван "Імперия ІІ" (Україна)</h2>--}}
{{--                        <h3 class="caption-text" style=" color: #31353d;font-family: Montserrat;font-size: 14px;font-weight: 400;--}}
{{--                            line-height: 23px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
{{--                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
{{--                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Sed ut perspiciatis--}}
{{--                            unde omnis iste natus error sit voluptatem accusantium doloremque.--}}

{{--                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque--}}
{{--                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi--}}
{{--                            architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit--}}
{{--                            aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione--}}
{{--                            voluptatem sequi nesciunt:--}}
{{--                            - Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet;--}}
{{--                            - Consectetur, adipisci velit, sed quia non numquam eius modi;--}}
{{--                            - Tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.--}}
{{--                            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,--}}
{{--                            nisi ut aliquid ex ea commodi consequatur?--}}
{{--                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea--}}
{{--                            commodo consequat.--}}
{{--                            Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae--}}
{{--                            consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</h3>--}}

{{--                        <p class="caption-text">--}}
{{--                            <a class="btn btnslider" href="#" style="border-radius: 29px;">Детальніше</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div style="position: relative;">--}}
{{--                        <img style="width: 440px; height: 510px;float:right;margin-top: 50px; "--}}
{{--                             src="{{asset('storage/static_img/bloglist.jpeg')}}" alt=""/>--}}


{{--                    </div>--}}
{{--                </div>--}}
                @foreach($posts as $post)
                <div class="post-wrap">

                    <div class="caption-content" style="position: relative;float:left;width: 50%; margin-top: 100px;">
                         <h2 class="caption-title"
                            style="color: #02bbdb;font-family: Montserrat;font-size: 28px;font-weight: 500;line-height: 30px; text-transform: uppercase;">
                                {{$post->title}}</h2>
                        <h3 class="caption-text" style=" color: #31353d;font-family: Montserrat;font-size: 14px;font-weight: 400;
                            line-height: 23px;">{{$post->text}}</h3>

                        <p class="caption-text">
                            <a class="btn btnslider" href="{{route('show-post', ['post' => $post])}}" style="border-radius: 29px;">Детальніше</a>
                        </p>
                    </div>
                    <div style="position: relative;">
                        <img style="max-width: 440px; max-height: 510px;float:right;margin-top: 50px; "
                             src="{{$post->getImage() ? $post->getImage()->url : '#'}}" alt=""/>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /PAGE -->
    <!-- Pagination -->
{{--    <div class="pagination-wrapper">--}}
{{--        <ul class="pagination">--}}
{{--            <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Previous</a></li>--}}
{{--            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>--}}
{{--            <li><a href="#">2</a></li>--}}
{{--            <li><a href="#">3</a></li>--}}
{{--            <li><a href="#">4</a></li>--}}
{{--            <li><a href="#">Next <i class="fa fa-angle-double-right"></i></a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}

<?php echo $posts->links('layouts.paginate'); ?>
    <!-- /Pagination -->

@endsection