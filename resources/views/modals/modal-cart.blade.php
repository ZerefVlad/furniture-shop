<div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="container">
            <div class="cart-items">
                <div class="cart-items-inner">
                    @foreach($single as $singleProduct)
                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object item-image"
                                                               src="{{$singleProduct['product']->getMainProductUrl()}}"
                                                               alt=""></a>
                            <p class="pull-right item-price">{{$singleProduct['product']->getPriceWithDiscount()*$singleProduct['quantity']}} грн.</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title">Назва товару: <a href="#">
                                        {{$singleProduct['product']->title}}
                                    </a></h4>
                                <p class="item-desc">Код товару: {{$singleProduct['product']->code}}</p>
                            </div>
                        </div>
                    @endforeach

                    <div class="media">
                        <p class="pull-right item-price">{{$total}}</p>
                        <div class="media-body">
                            <h4 class="media-heading item-title summary">Загальна сумма:</h4>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div>
                                <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Закрити</a><!--
                                    --><a href="{{route('open_cart')}}" class="btn btn-theme btn-theme-transparent btn-call-checkout">До кошику</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
