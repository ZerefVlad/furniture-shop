@extends('layouts.app')

@section('content')




    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">

                <!-- SIDEBAR -->

                <!-- /SIDEBAR -->
                <!-- CONTENT -->
                <div class="content" id="content">


                    <div class="row products grid">


                        @foreach($galeries as $g)
                            <div class="col-md-3 col-sm-6">
                                <div class="thumbnail no-border no-padding">
                                    <div class="media"
                                         style="width: 270px;height: 330px;display: table-cell;vertical-align: middle; text-align: center;">
{{----}}
                                            <img style="max-width: 270px; max-height: 330px; height: 100%;"
                                                 src="{{$g->getImage()->first() ? $g->getImage()->first()->url : '#'}}"
                                                 alt=""/>
                                            <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                </span>
{{--                                        </a>--}}
                                    </div>
                                    <div class="caption text-center">
                                        @if(count($g->children)>0)
<a href="{{route('element_fotogalery', [ 'galery' => $g ])}}">

                                            <h4 class="caption-title prodcateegorytitle">{{$g->title}}</h4>
{{--                                        </a>--}}</a>
@else <h4 class="caption-title prodcateegorytitle">{{$g->title}}</h4>
                                            @endif

                                    </div>
                                </div>
                            </div>
                    @endforeach



                </div>
                    <!-- /CONTENT -->


                </div>
        </section>


    </div> <!-- /CONTENT AREA -->

@endsection
