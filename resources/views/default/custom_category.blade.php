@php
    $views =  \App\Models\Views::where('user_track', \Session::get('hash'))->get();

@endphp


@extends('layouts.app')

@section('content')




    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->

        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">

                <!-- SIDEBAR -->

                <!-- /SIDEBAR -->
                <!-- CONTENT -->
                <div class="content" id="content">



                    <!-- Products grid -->
                    <div class="row products grid">




                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="thumbnail no-border no-padding">
                                    <div class="media">
                                        <a class="media-link" href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
                                            <img style="max-width: 270px; max-height: 330px; height: 100%;"
                                                 src="{{$product->getImages()->first() ? $product->getImages()->first()->url : '#'}}"
                                                 alt=""/>
                                            <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                </span>
                                        </a>
                                    </div>
                                    <div class="caption text-center">
                                        <a href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
                                            <h4 class="caption-title prodcateegorytitle">{{$product->title}}</h4>
                                        </a>


                                        <div class="price">
                                            <ins>{{$product->getPriceWithDiscount()}} грн./пог. м</ins>
                                            @if($product->discount->value != '0')
                                                <del>{{$product->getPriceWithoutDiscount()}}грн./пог. м</del>
                                            @endif
                                        </div>
                                        <div class="buttons">

                                            @if(!$product->likes()->first())
                                                <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="{{route("add_to_like", ['product' => $product,'category' => $product->categories->first()])}}"><i
                                                            style="color: #02bbdb;" class="fa fa-heart"></i></a>
                                            @else
                                                <a style="color: #ffffff; background-color: #1c94c4" class="btn btn-theme btn-theme-transparent btn-wish-list" href="{{route("delete_like", ['likes' => $product->likes()->first()])}}"><i
                                                            class="fa fa-heart"></i></a>
                                            @endif
                                            <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">Детальныше</a>
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
                        @foreach($category->children as $children)
                            @foreach($children->products as $product)
                                <div class="col-md-3 col-sm-6">
                                    <div class="thumbnail no-border no-padding">
                                        <div class="media">
                                            <a class="media-link" href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
                                                <img style="width: 270px; height: 330px;"
                                                     src="{{$product->getImages()->first() ? $product->getImages()->first()->url : '#'}}"
                                                     alt=""/>
                                                <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="caption text-center">
                                            <a href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
                                                <h4 class="caption-title prodcateegorytitle">{{$product->title}}</h4>
                                            </a>


                                            <div class="price">
                                                <ins>{{$product->getPriceWithDiscount()}} грн./пог. м</ins>
                                                @if($product->discount->value != '0')
                                                    <del>{{$product->getPriceWithoutDiscount()}}грн.</del>
                                                @endif
                                            </div>
                                            <div class="buttons">

                                                <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>До кошику</a>
                                                @if(!$product->likes()->first())
                                                    <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="{{route("add_to_like", ['product' => $product,'category' => $product->categories->first()])}}">До лайку</a>
                                                @else
                                                    <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="{{route("delete_like", ['likes' => $product->likes()->first()])}}">Delete лайку</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach


                    </div> <?php echo $products->links('layouts.paginate'); ?>
                <!-- /Products grid -->

                    <!-- Pagination -->
                {{--                        <div class="pagination-wrapper">--}}
                {{--                            <ul class="pagination">--}}
                {{--                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Previous</a>--}}
                {{--                                </li>--}}
                {{--                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>--}}
                {{--                                <li><a href="#">2</a></li>--}}
                {{--                                <li><a href="#">3</a></li>--}}
                {{--                                <li><a href="#">4</a></li>--}}
                {{--                                <li><a href="#">Next <i class="fa fa-angle-double-right"></i></a></li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                <!-- /Pagination -->

                </div>
                <!-- /CONTENT -->


            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->

        <!-- PAGE -->

        <!-- /PAGE -->

    </div>
    <!-- /CONTENT AREA -->

    @endsection