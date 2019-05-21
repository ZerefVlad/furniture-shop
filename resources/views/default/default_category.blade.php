@php
    $views =  \App\Models\Views::where('user_track', \Session::get('hash'))->get();

@endphp


@extends('layouts.app')

@section('content')




{{--    {{$views[0]->product->getMainProductUrl()}}--}}
    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->

        <section class="page-section breadcrumbs" style="box-shadow: 0 1px 1px rgba(0, 0, 0, 0.16)">
            <div class="container">
{{--                <div class="page-header">--}}
{{--                    <h1>Category Page</h1>--}}
{{--                </div>--}}
{{--                <ul class="breadcrumb">--}}
{{--                    <li><a href="#">Home</a></li>--}}
{{--                    <li><a href="#">Shop</a></li>--}}
{{--                    <li class="active">Category Grid View Page With Left Sidebar</li>--}}
{{--                </ul>--}}
                <div class="demo">
                    <input class="hide" id="hd-1" type="checkbox">
                    <label for="hd-1">Фiльтри      <i class="fa fa-angle-down"></i></label>
                    <div>
                        @include('default.filters', [
                               'filters' => $filters,
                               'filtersData' => $filtersData,
                               'category' => $category,
                               'filterRequest' => $filter,
                           ])
                    </div>

                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">

                    <!-- SIDEBAR -->

                    <!-- /SIDEBAR -->
                    <!-- CONTENT -->
                    <div class="content" id="content">


                        <!-- shop-sorting -->
{{--                        <div class="shop-sorting">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <form class="form-inline" action="">--}}
{{--                                        <div class="form-group selectpicker-wrapper">--}}
{{--                                            <select--}}
{{--                                                    class="selectpicker input-price" data-live-search="true"--}}
{{--                                                    data-width="100%"--}}
{{--                                                    data-toggle="tooltip" title="Select">--}}
{{--                                                <option>Product Name</option>--}}
{{--                                                <option>Product Name</option>--}}
{{--                                                <option>Product Name</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group selectpicker-wrapper">--}}
{{--                                            <select--}}
{{--                                                    class="selectpicker input-price" data-live-search="true"--}}
{{--                                                    data-width="100%"--}}
{{--                                                    data-toggle="tooltip" title="Select">--}}
{{--                                                <option>Select Manifacturers</option>--}}
{{--                                                <option>Select Manifacturers</option>--}}
{{--                                                <option>Select Manifacturers</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4 text-right-sm">--}}
{{--                                    <a class="btn btn-theme btn-theme-transparent btn-theme-sm" href="#"><img--}}
{{--                                                src="assets/img/icon-list.png" alt=""/></a>--}}
{{--                                    <a class="btn btn-theme btn-theme-transparent btn-theme-sm" href="#"><img--}}
{{--                                                src="assets/img/icon-grid.png" alt=""/></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- /shop-sorting -->

                        <!-- Products grid -->
                        <div class="row products grid">

{{--                            <div class="col-md-3 col-sm-6">--}}
{{--                                <div class="thumbnail no-border no-padding">--}}
{{--                                    <div class="media">--}}
{{--                                        <a class="media-link" href="#">--}}
{{--                                            <img style="width: 270px; height: 330px;"--}}
{{--                                                 src="{{asset('storage/static_img/prod1.jpg')}}" alt=""/>--}}
{{--                                            <span class="icon-view">--}}
{{--                                        <strong><i class="fa fa-eye"></i></strong>--}}
{{--                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="caption text-center">--}}
{{--                                        <h4 class="caption-title prodcateegorytitle">Standard Product Header</h4>--}}

{{--                                        <div class="price">--}}
{{--                                            <ins></ins>--}}
{{--                                            <del>$425.00</del>--}}
{{--                                        </div>--}}
{{--                                        <div class="buttons">--}}
{{--                                            <!----}}
{{--                                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i--}}
{{--                                                        class="fa fa-shopping-cart"></i>До кошику</a><!----}}
{{--                                    -->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            @foreach($products as $product)
                                <div class="col-md-3 col-sm-6">
                                    <div class="thumbnail no-border no-padding">
                                        <div class="media" style="width: 270px;height: 330px;display: table-cell;vertical-align: middle; text-align: center;">
                                            <a class="media-link" href="#">
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
                                                <h4 class="caption-title prodcateegorytitle">{{$product->title}}r</h4>
                                            </a>


                                            <div class="price">
                                                <ins>{{$product->getPriceWithDiscount()}} грн.</ins>
                                                @if($product->discount->value != '0')
                                                <del>{{$product->getPriceWithoutDiscount()}}грн.</del>
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
                                            <a class="media-link" href="#">
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
                                                <h4 class="caption-title prodcateegorytitle">{{$product->title}}r</h4>
                                            </a>


                                            <div class="price">
                                                <ins>{{$product->getPriceWithDiscount()}} грн.</ins>
                                                <del>{{$product->getPriceWithoutDiscount()}}</del>
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