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
                            <p class="pull-right item-price">{{$singleProduct['quantity']}} шт.</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title">Назва товару: <a href="#">
                                        {{$singleProduct['product']->title}}
                                    </a></h4>
                                <p class="item-desc">Код товару: {{$singleProduct['product']->code}}</p>
                            </div>
                        </div>
                    @endforeach
                        @foreach($multiple as $multipleProduct)
                       <div style="border: solid 4px #e21e1e">
                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object item-image"
                                                               src="{{$multipleProduct['product']->getMainProductUrl()}}"
                                                               alt=""></a>
                            <p class="pull-right item-price">{{$multipleProduct['product']->getPriceWithDiscount()}} грн.</p>
                            <p class="pull-right item-price">x1 шт.</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title">Назва товару: <a href="#">
                                        {{$multipleProduct['product']->title}}
                                    </a></h4>
                                <p class="item-desc">Код товару: {{$multipleProduct['product']->code}}</p>
                            </div>
                        </div>

                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object item-image"
                                                               src="{{$multipleProduct['related_product']->getMainProductUrl()}}"
                                                               alt=""></a>
                            <p class="pull-right item-price">{{$multipleProduct['related_product']->getPriceWithDiscount()-$multipleProduct['related_product']->getPriceWithDiscount()*$multipleProduct['discount']/100}} грн.</p>
                            <p class="pull-right item-price" style="color: #e21e1e">Знижка: {{$multipleProduct['discount']}} %</p>

                            <p class="pull-right item-price">x{{$multipleProduct['quantity']}} шт.</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title">Назва товару: <a href="#">
                                        {{$multipleProduct['related_product']->title}}
                                    </a></h4>
                                <p class="item-desc">Код товару: {{$multipleProduct['related_product']->code}}</p>
                            </div>
                        </div>

                            <div class="media">
                                <p class="pull-right item-price">{{($multipleProduct['related_product']->getPriceWithDiscount()-$multipleProduct['related_product']->getPriceWithDiscount()*$multipleProduct['discount']/100)*$multipleProduct['quantity']+$multipleProduct['product']->getPriceWithDiscount()}}</p>


                                    <h4 style="margin-top: 0" class="pull-right item-price">Цiна комплекту:</h4>

                            </div>
                       </div>
                    @endforeach

                    <div class="media">
                        <p class="pull-right item-price">{{$total}} грн.</p>
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
