

        <div class="cart-items">
            <div class="cart-items-inner">
@foreach($products as $product)
{{--    <div >--}}
{{--    <img style="float: left" width="30px" height="30px" src="{{$product->getMainProductUrl()}}" alt="">--}}
{{--    <p style="float: left">{{$product->title}}</p>--}}
{{--    </div>--}}

    <div class="media">
        <a class="pull-left" href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}"><img class="media-object item-image"
                                           src="{{$product->getMainProductUrl()}}"
                                           alt=""></a>
        <p class="pull-right item-price">{{$product->getPriceWithDiscount()}} грн.</p>
        <div class="media-body">
            <h4 class="media-heading item-title">Назва товару: <a href="{{route('show_single_product', [ 'product' => $product, 'category' => $product->categories->first()])}}">
                    {{$product->title}}
                </a></h4>
            <p class="item-desc">Код товару: {{$product->code}}</p>
        </div>
    </div>

@endforeach

            </div>
        </div>



