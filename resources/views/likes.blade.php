@php
    if(auth()->guest()){
     $likes =  \App\Models\Likes::where('user_track', \Session::get('hash'))->get();
 } else
  {
        $likes =  \App\Models\Likes::where('user_track', auth()->user()->id)->get();

   }
@endphp

@extends('layouts.app')

@section('content')

    {{--    @foreach($likes as $likeProduct)--}}
    {{--        {{$likeProduct->product->getMainProductUrl()}}--}}
    {{--        {{$likeProduct->product->title}}--}}
    {{--    @endforeach--}}


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

                        @foreach($likes as $likeProduct)
                            <div class="col-md-3 col-sm-6">
                                <div class="thumbnail no-border no-padding">
                                    <div class="media"
                                         style=" width: 270px;height: 330px;display: table-cell;vertical-align: middle; text-align: center;">
                                        <a class="media-link" href="{{route('show_single_product', [ 'product' => $likeProduct->product, 'category' => $likeProduct->product->categories->first()])}}">
                                            <img style="max-width: 270px; max-height: 330px; "
                                                 src="{{$likeProduct->product->getImages()->first() ? $likeProduct->product->getImages()->first()->url : '#'}}"
                                                 alt=""/>
                                            <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                </span>
                                        </a>
                                    </div>
                                    <div class="caption text-center">
                                        <a href="{{route('show_single_product', [ 'product' => $likeProduct->product, 'category' => $likeProduct->product->categories->first()])}}">
                                            <h4 class="caption-title prodcateegorytitle">{{$likeProduct->product->title}}</h4>
                                        </a>


                                        <div class="price">
                                            @if($likeProduct->product->categories->first()->type != 'default')
                                                <ins>{{$likeProduct->product->getPriceWithDiscount()}} грн./від пог. м</ins>
                                                @if($likeProduct->discount->value != '0')
                                                    <del>{{$likeProduct->getPriceWithoutDiscount()}}грн./від пог. м</del>
                                                @endif
                                            @else
                                                <ins>{{$likeProduct->product->getPriceWithDiscount()}} грн.</ins>


                                                @if($likeProduct->product->discount->value != '0')
                                                    <del>{{$likeProduct->product->getPriceWithoutDiscount()}}</del>
                                                @endif

                                            @endif
                                        </div>
                                        <div class="buttons">

                                            @if(!$likeProduct->product->likes()->first())
                                                <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                   href="{{route("add_to_like", ['product' => $likeProduct->product,'category' => $likeProduct->product->categories->first()])}}"><i
                                                            style="color: #02bbdb;" class="fa fa-heart"></i></a>
                                            @else
                                                <a style="color: #ffffff; background-color: #1c94c4"
                                                   class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                   href="{{route("delete_like", ['likes' => $likeProduct->product->likes()->first()])}}"><i
                                                            class="fa fa-heart"></i></a>
                                            @endif
                                            <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                               href="{{route('show_single_product', [ 'product' => $likeProduct->product, 'category' => $likeProduct->product->categories->first()])}}">Детальныше</a>
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
                    <!-- /Products grid -->


                </div>
                <!-- /CONTENT -->

            </div>
        </div>
    </section>
@endsection