<div class="content" style="text-align: left;    width: 90%; font-family: sans-serif;    margin: 0 auto;">




    <h2>Номер заказа:{{$order->id}}</h2>
    <h3>Время заказа: {{$order->getCreatedAt()}} </h3>
    <h1 style="color: rgb(2, 187, 219)">Сумма заказа: {{$order->getOrderTotal()}} грн.</h1>



<h2>ФИO заказчика: {{$order->getUserData()->second_name}} {{$order->getUserData()->first_name}} {{$order->getUserData()->middle_name}}</h2>
    <h2>Телефон заказчика: {{$order->getUserData()->mobile}}</h2>
    <h4>Аддресс заказчика: {{$order->getUserData()->address}}</h4>
    <h4>E-Mail заказчика: {{$order->getUserData()->email}}</h4>
    <h4>Сообщение заказчика: {{$order->getUserData()->name}}</h4>






    <table class="table">
        <thead>

        </thead>
        <tbody>
        @if ($order->getProductObjects())
            @foreach($order->getProductObjects() as $product)
                <tr id="cart-item-{{$product['product']->id}}">

                    <td class="image"><a class="media-link" href="#"><img
                                    width="300" height="200"
                                    src="{{$product['product']->getMainProductUrl()}}" alt=""/></a></td>
                    <td class="description">
                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;"><a href="{{route('show_single_product', ['product' => $product['product'],        'category' => $product['product']->categories->first(),
                                                             ])}}">{{$product['product']->title}}</a></h4>
                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">Код товару: {{$product['product']->code}}</p>
                    </td>
                    {{--@php( dd($product['color']))--}}
                    <td class="image"><a class="media-link" href="#"><img style=""  src="{{$product['color'] ? $product['color']->getImage()->url : ''}}" alt=""></a></td>
                    <td class="quantity">
                        <p>Кiлькiсть товару: x{{$product['quantity']}}<p>
                        <p style="margin-top: 30px">Цiна одного товару: {{$product['product']->getPriceWithDiscount()}} грн.</p>
                    </td>

                    <td class="total" style="padding-right: 50px">
                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">{{$product['product']->getPriceWithDiscount()*$product['quantity'] }}
                            грн</p>
                        <p class="skidka"
                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                            Знижка: {{$product['product']->discount->value}}% </p>


                    </td>


                </tr>
            @endforeach
        @endif

        @if ($order->getComplexesObjects())
            @foreach($order->getComplexesObjects() as $complex)
                <tr class="complex-item-">


                    <td class="image"><a class="media-link" href="#"></i><img
                                    width="200" height="150"
                                    src="{{$complex['product']->getMainProductUrl()}}" alt=""/></a></td>

                    <td class="description">
                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                            <a href="{{route('show_single_product', ['product' => $complex['product'],'category' => $complex['product']->categories->first(),])}}">
                            Назва основного товару: {{$complex['product']->title}}
                            </a>
                        </h4>
                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">Код основного товару: {{$complex['product']->code}}</p>
                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">{{$complex['product']->getPriceWithDiscount()}}
                            грн</p>
                        <p class="skidka"
                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                            Знижка: {{$complex['product']->discount->value}}% </p>
                    </td>

                    <td class="image"><a class="media-link" href="#"></i><img
                                    width="200" height="150"
                                    src="{{$complex['related_product']->getMainProductUrl()}}" alt=""/></a>
                        <p>кiлькiсть додаткового товару: {{$complex['quantity']}} шт.</p>
                        <p>цiна одного додаткового товару: {{$complex['related_product']->getPriceWithDiscount()}} грн.</p>

                    </td>

                    <td class="total" style="padding-right: 50px">
                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                            <a href="{{route('show_single_product', ['product' => $complex['related_product'],'category' => $complex['related_product']->categories->first(),])}}">

                            Назва додаткового товару: {{$complex['related_product']->title}}
                            </a>
                        </h4>
                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">Код додаткового товару: {{$complex['related_product']->code}}</p>
                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">Цiна: {{ ($complex['related_product']->getPriceWithDiscount() - $complex['related_product']->getPriceWithDiscount()* $complex['discount']/100) * $complex['quantity'] }}
                            грн</p>
                        <p class="skidka"
                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                            Знижка: {{$complex['discount']}}% </p>



                    </td>

                    <td>


                        <label> К-сть комплектiв: x{{$complex['total_quantity']}}</label>
                        <p class="complex_price" style=" color: #02bbdb; margin-top: 20px; font-family: Roboto;font-size: 22px;font-weight: 500;">Цiна комплекту: {{($complex['related_product']->getPriceWithDiscount() - $complex['related_product']->getPriceWithDiscount()* $complex['discount']/100) * $complex['quantity']  * $complex['total_quantity'] + $complex['product']->getPriceWithDiscount()}} грн.</p>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

</div>