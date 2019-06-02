@php
    $views =  \App\Models\Views::where('user_track', \Session::get('hash'))->get();

@endphp


@extends('layouts.app')

@section('content')




    {{--    {{$views[0]->product->getMainProductUrl()}}--}}
    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->
        @if($filters->count() != 0)
            <section class="page-section breadcrumbs" style="box-shadow: 0 1px 1px rgba(0, 0, 0, 0.16)">
                <div class="container">

                    <div class="demo">
                        <input class="hide" id="hd-1" type="checkbox">
                        <label for="hd-1">Фiльтри <i class="fa fa-angle-down"></i></label>
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
    @endif
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
                                    <div class="media"
                                         style="width: 270px;height: 330px;display: table-cell;vertical-align: middle; text-align: center;">
                                        <a class="media-link"
                                           href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
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
                                            <ins>{{$product->getPriceWithDiscount()}} грн.</ins>
                                            @if($product->discount->value != '0')
                                                <del>{{$product->getPriceWithoutDiscount()}}грн.</del>
                                            @endif
                                        </div>
                                        <div class="buttons">

                                            @if(!$product->likes()->first())
                                                <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                   href="{{route("add_to_like", ['product' => $product,'category' => $product->categories->first()])}}"><i
                                                            style="" class="fa fa-heart"></i></a>
                                            @else
                                                <a style="color: #ffffff; background-color: #1c94c4"
                                                   class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                   href="{{route("delete_like", ['likes' => $product->likes()->first()])}}"><i
                                                            class="fa fa-heart"></i></a>
                                            @endif
                                            <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                               href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">Детальныше</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach($category->children as $children)
                            @foreach($children->products as $product)
                                <div class="col-md-3 col-sm-6">
                                    <div class="thumbnail no-border no-padding">
                                        <div class="media"
                                             style="width: 270px;height: 330px;display: table-cell;vertical-align: middle; text-align: center;">
                                            <a class="media-link"
                                               href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
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
                                                <ins>{{$product->getPriceWithDiscount()}} грн.</ins>
                                                @if($product->discount->value != '0')
                                                    <del>{{$product->getPriceWithoutDiscount()}}грн.</del>
                                                @endif
                                            </div>
                                            <div class="buttons">

                                                @if(!$product->likes()->first())
                                                    <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                       href="{{route("add_to_like", ['product' => $product,'category' => $product->categories->first()])}}"><i
                                                                style="color: #02bbdb;" class="fa fa-heart"></i></a>
                                                @else
                                                    <a style="color: #ffffff; background-color: #1c94c4"
                                                       class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                       href="{{route("delete_like", ['likes' => $product->likes()->first()])}}"><i
                                                                class="fa fa-heart"></i></a>
                                                @endif
                                                <a class="btn btn-theme btn-theme-transparent btn-wish-list"
                                                   href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">Детальныше</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach


                    </div> <?php echo $products->links('layouts.paginate'); ?>
                <!-- /Products grid -->


                </div>
                <!-- /CONTENT -->


            </div>
        </section>


    </div> <!-- /CONTENT AREA -->

@endsection