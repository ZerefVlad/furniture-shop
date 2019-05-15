@php
    $likes =  \App\Models\Likes::where('user_track', \Session::get('hash'))->get();

@endphp

@extends('layouts.app')

@section('content')

    @foreach($likes as $likeProduct)
    {{$likeProduct->product->getMainProductUrl()}}
    {{$likeProduct->product->title}}
    @endforeach


    <section class="page-section with-sidebar" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <!-- SIDEBAR -->

                <!-- /SIDEBAR -->
                <!-- CONTENT -->
                <div class="content" id="content">



                    <!-- shop-sorting -->

                    <!-- /shop-sorting -->

                    <!-- Products grid -->
                    <div class="row products grid">
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" href="#">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>
                                        <span class="icon-view">
                                        <strong><i class="fa fa-eye"></i></strong>
                                    </span>
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title prodcateegorytitle">Standard Product Header</h4>

                                    <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                    <div class="buttons">
                                        <!--
                                --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>До кошику</a><!--
                                    -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" href="#">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>
                                        <span class="icon-view">
                                        <strong><i class="fa fa-eye"></i></strong>
                                    </span>
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title prodcateegorytitle">Standard Product Header</h4>

                                    <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                    <div class="buttons">
                                        <!--
                                --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>До кошику</a><!--
                                    -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" href="#">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>
                                        <span class="icon-view">
                                        <strong><i class="fa fa-eye"></i></strong>
                                    </span>
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title prodcateegorytitle">Standard Product Header</h4>

                                    <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                    <div class="buttons">
                                        <!--
                                --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>До кошику</a><!--
                                    -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" href="#">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>
                                        <span class="icon-view">
                                        <strong><i class="fa fa-eye"></i></strong>
                                    </span>
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title prodcateegorytitle">Standard Product Header</h4>

                                    <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                    <div class="buttons">
                                        <!--
                                --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>До кошику</a><!--
                                    -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail no-border no-padding">
                                <div class="media">
                                    <a class="media-link" href="#">
                                        <img src="{{asset('storage/static_img/apartment.jpg')}}" alt=""/>
                                        <span class="icon-view">
                                        <strong><i class="fa fa-eye"></i></strong>
                                    </span>
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <h4 class="caption-title prodcateegorytitle">Standard Product Header</h4>

                                    <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                    <div class="buttons">
                                        <!--
                                --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>До кошику</a><!--
                                    -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /Products grid -->



                </div>
                <!-- /CONTENT -->

            </div>
        </div>
    </section>
@endsection