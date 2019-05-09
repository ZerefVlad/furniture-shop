@extends('layouts.app')

@section('content')
{{$post->title}}
    <!-- BREADCRUMBS -->
    <div class="tabs">
        <h1 class="titletabs" style="color: #171717;font-family: Montserrat;font-size: 38px;font-weight: 700;line-height: 55px;text-transform: uppercase;">SAMPLE TITLE TEXT WILL BE HERE</h1>
        <p class="titletext" style="color: #252424;font-family: Montserrat;font-size: 18px;font-weight: 400;padding: 0;">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.
        </p>
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
                            <a href="assets/img/post22.jpg" data-gal="prettyPhoto"><img src="{{asset('storage/static_img/blogsingle.jpeg')}}" alt=""></a>
                        </div>
                        <div class="post-header">

                            <div class="post-meta">By <a href="#">author name here</a> / 6th June 2014 </div>
                        </div>
                        <div class="post-body">
                            <div class="post-excerpt">

                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. In posuere odio sed libero tincidunt commodo a vel ipsum. Mauris fringilla tellus aliquam, egestas sem in, malesuada nunc. Etiam condimentum felis odio, vel mollis est tempor non...</p>
                                <p>Donec ullamcorper nulla non metus auctor fringilla. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Sed posuere consectetur est at lobortis. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

                                <p>Fusce gravida interdum eros a mollis. Sed non lorem varius, volutpat nisl in, laoreet ante. Quisque suscipit mauris ipsum, eu mollis arcu laoreet vel. In posuere odio sed libero tincidunt commodo a vel ipsum. Mauris fringilla tellus aliquam, egestas sem in, malesuada nunc. Etiam condimentum felis odio, vel mollis est tempor non...</p>
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