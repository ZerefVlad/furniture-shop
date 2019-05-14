@extends('layouts.app')
@section('content')
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <!--   <section class="page-section breadcrumbs">
               <div class="container">
                   <div class="page-header">
                       <h1>Shopping Cart</h1>
                   </div>
                   <ul class="breadcrumb">
                       <li><a href="#">Home</a></li>
                       <li><a href="#">Shop</a></li>
                       <li class="active">Shopping Cart</li>
                   </ul>
               </div>
           </section>-->
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section color">
            <div class="container">


                <form action="{{route('submit_order')}}" method="get" class="form-delivery"
                      style="box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.19);border-radius: 10px;background-color:#383940 "
                      id="zakaz">
                    {{csrf_field()}}
                    <div class="row" style="background-color:#383940">
                        <h3 class="block-title alt" style="color: #ffffff;
font-family: Lato;
font-size: 28px;
font-weight: 900;
margin-top: 30px;"> Информация о покупателе</h3>
                        <div class="col-md-4" style="background-color:#383940 ">
                            <div class="form-group"><p><input class="form-control" type="text" name="first_name"
                                                              id="first_name" placeholder="Имя">
                                <p></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><input class="form-control" type="text" name="middle_name"
                                                           id="middle_name" placeholder="Отчество"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><input class="form-control" type="text" name="second_name"
                                                           id="second_name" placeholder="Фамилия"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><input class="form-control" type="text" name="address" id="address"
                                                           placeholder="Аддресс"></div>
                        </div>
                        {{--                        <div class="col-md-6">--}}
                        {{--                            <div class="form-group selectpicker-wrapper">--}}
                        {{--                                <select--}}
                        {{--                                        class="selectpicker input-price" data-live-search="true" data-width="100%"--}}
                        {{--                                        data-toggle="tooltip" title="Select">--}}
                        {{--                                    <option>Country</option>--}}
                        {{--                                    <option>Country</option>--}}
                        {{--                                    <option>Country</option>--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-6">--}}
                        {{--                            <div class="form-group selectpicker-wrapper">--}}
                        {{--                                <select--}}
                        {{--                                        class="selectpicker input-price" data-live-search="true" data-width="100%"--}}
                        {{--                                        data-toggle="tooltip" title="Select">--}}
                        {{--                                    <option>City</option>--}}
                        {{--                                    <option>City</option>--}}
                        {{--                                    <option>City</option>--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="form-group"><input class="form-control" type="text" placeholder="Postcode/ZIP"></div>--}}
                        {{--                        </div>--}}
                        <div class="col-md-6">
                            <div class="form-group"><input class="form-control" type="email" name="email" id="email"
                                                           placeholder="Email"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><input class="form-control" type="text" name="mobile" id="mobile"
                                                           placeholder="Номер мобильного"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><textarea class="form-control"
                                                              placeholder="Дополнительная информация" name="name"
                                                              id="id" cols="30" rows="10"></textarea></div>
                        </div>

                    </div>
                </form>


                <div class="row orders">
                    <h3 class="block-title " style="color: #333333;
font-family: Lato;
font-size: 32px;
font-weight: 600;margin: 30px;padding-bottom: 20px">Список товарів</h3>
                    <div class="content">


                        <table class="table">
                            <thead>

                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr id="cart-item-{{$product['product']->id}}">

                                    <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                                    width="300" height="200"
                                                    src="{{$product['product']->getMainProductUrl()}}" alt=""/></a></td>
                                    <td class="description">
                                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;"><a href="{{route('show_single_product', ['product' => $product['product'],        'category' => $product['product']->categories->first(),
                                                             ])}}">{{$product['product']->title}}</a></h4>
                                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">Код товару: {{$product['product']->code}}</p>
                                    </td>
{{--@php( dd($product['color']))--}}
                                    <td><img style="margin-top: 30%"  src="{{$product['color'] ? $product['color']->first()->getImage()->url : ''}}" alt=""></td>
                                    <td class="quantity">x{{$product['quantity']}}</td>

                                    <td class="total" style="padding-right: 50px">
                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">{{$product['price'] }}
                                            грн</p>
                                        <p class="skidka"
                                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                            Знижка: {{$product['discount']}}% </p>


                                    </td>
                                    <td style="padding-top: 5%;">
                                        <button  id="delete-product-cart">
                                            <i data-id="{{$product['product']->id}}" class="fa fa-close" style="color:#e21e1e;font-size: 30px;"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach

                            @foreach($complexes as $complex)
                                <tr class="complex-item-{{$complex['complex_id']}}">

                                    <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                                    width="200" height="150"
                                                    src="{{$complex['product']->getMainProductUrl()}}" alt=""/></a></td>

                                    <td class="description">
                                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">Назва основного товару: {{$complex['product']->title}}</h4>
                                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">Код основного товару: {{$complex['product']->code}}</p>
                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">{{$complex['product']->getPriceWithDiscount()}}
                                            грн</p>
                                        <p class="skidka"
                                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                            Знижка: {{$complex['product']->discount->value}}% </p>
                                    </td>

                                    <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                                    width="200" height="150"
                                                    src="{{$complex['related_product']->getMainProductUrl()}}" alt=""/></a>
                                        <p>кiлькiсть додаткового товару: {{$complex['quantity']}} шт.</p>
                                    </td>

                                    <td class="total" style="padding-right: 50px">
                                        <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">Назва додаткового товару: {{$complex['related_product']->title}}</h4>
                                        <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">Код додаткового товару: {{$complex['related_product']->code}}</p>
                                        <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">Цiна: {{ ($complex['related_product']->getPriceWithDiscount() - $complex['related_product']->getPriceWithDiscount()* $complex['discount']/100) * $complex['quantity'] }}
                                            грн</p>
                                        <p class="skidka"
                                           style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                            Знижка: {{$complex['discount']}}% </p>



                                    </td>

                                    <td >

                                        <p class="complex_price">Цiна комплекту: {{$complex['price'] * $complex['total_quantity']}}</p>
                                        <label> К-сть комплектiв: </label>
                                        <input type="number" class="quantity-complex-cart" data-id="{{$complex['complex_id']}}" required min="1"
                                               max="99" value="{{$complex['total_quantity']}}">

                                    </td>
                                    <td style="padding-top: 5%;">
                                        <button  id="delete-complex-cart">
                                            <i data-id="{{$complex['complex_id']}}" class="fa fa-close" style="color:#e21e1e;font-size: 30px;"></i>
                                        </button>
                                    </td>




                                </tr>

                            @endforeach



                            {{--                            <tr>--}}
                            {{--                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img src="assets/img/cart.jpg" alt=""/></a></td>--}}
                            {{--                                <td class="description">--}}
                            {{--                                    <h4 style="color: #333333;--}}
                            {{--font-family: Roboto;--}}
                            {{--font-size: 22px;--}}
                            {{--font-weight: 500;"><a href="#">Standard Product Name Header Here</a></h4>--}}
                            {{--                                    <p style="color: #9e9e9e;--}}
                            {{--font-family: Roboto;--}}
                            {{--font-size: 18px;--}}
                            {{--font-weight: 400;">Код товару: 232332</p>--}}
                            {{--                                </td>--}}
                            {{--                                <td class="quantity">x3</td>--}}

                            {{--                                <td class="total" style="padding-right: 50px" >--}}
                            {{--                                    <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">7550грн</p>--}}
                            {{--                                    <p class="skidka" style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">Skidka: 0%    </p>--}}


                            {{--                                </td>--}}
                            {{--                                <td style="    padding-top: 5%;"><a href="#" style="" ><i class="fa fa-close" style="color:#e21e1e;font-size: 30px;"></i></a></td>--}}
                            {{--                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <div style="    margin-right: 15px;position: relative;float: right;color: #9e9e9e;font-family: Roboto;
                                    font-size: 22px;font-weight: 400;">Загальна сумма:<span><p id="total-price" style="color: #333333;font-family: Roboto;
                                    font-size: 22px;font-weight: 500;">{{$total}} грн</p></span>

                    </div>


                </div>
                <div style="position: relative;float: right;margin-bottom: 50px;">
                    <button form="zakaz" type="submit" name="submit" id="submit" class="btn btn-theme pull-right"
                            style="position: relative;float: right;   box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);border-radius: 10px;background-color: #4abf0c;width: 346px;" id="total-price">Оформити покупку
                    </button>
                </div>


                <!-- /PAGE -->

            </div>
            <!-- /CONTENT AREA -->
@endsection

{{--@foreach ($products as $product)--}}
{{--    <div id="cart-item-{{$product['product']->id}}">--}}
{{--        <a href="{{route('show_single_product', [--}}
{{--            'product' => $product['product'],--}}
{{--            'category' => $product['product']->categories->first(),--}}
{{--            ])}}">--}}
{{--            <h2>{{$product['product']->title}}</h2>--}}
{{--        </a>--}}
{{--        <img width="300" height="200" src="{{$product['product']->getMainProductUrl()}}">--}}

{{--        <label for="">Quantity: </label>--}}
{{--        <input type="number" class="quantity-cart" data-id="{{$product['product']->id}}" required min="1" max="99"--}}
{{--               value="{{$product['quantity']}}">--}}

{{--        <h2 class="price">Price: {{$product['price'] }}</h2>--}}
{{--        <h2>Discount: {{$product['discount']}}</h2>--}}
{{--        <button data-id="{{$product['product']->id}}" class="delete-product-cart">delete</button>--}}
{{--    </div>--}}
{{--@endforeach--}}

{{--@foreach($complexes as $complex)--}}
{{--    <div class="complex-item-{{$complex['complex_id']}}">--}}
{{--        <h2>{{$complex['product']->title}}</h2>--}}

{{--        <img width="300" height="200" src="{{$complex['product']->getMainProductUrl()}}">--}}
{{--        <p>Price: {{$complex['product']->getPriceWithDiscount()}}</p>--}}
{{--        <p>Скидка для основного продукта: {{$complex['product']->discount->value}}%</p>--}}

{{--        <h2>{{$complex['related_product']->title}}</h2>--}}
{{--        <img width="300" height="200" src="{{$complex['related_product']->getMainProductUrl()}}">--}}
{{--        <p>Price: {{--}}
{{--            (--}}
{{--             $complex['related_product']->getPriceWithDiscount()--}}
{{--              - $complex['related_product']->getPriceWithDiscount()--}}
{{--              * $complex['discount']/100) * $complex['quantity']}}</p>--}}
{{--        <p>Скидка для привязанного продукта: {{$complex['discount']}}%</p>--}}
{{--        <p>Kol-vo привязанного продукта: {{$complex['quantity']}}</p>--}}

{{--        <p class="complex_price">Complex price: {{$complex['price'] * $complex['total_quantity']}}</p>--}}
{{--        <input type="number" class="quantity-complex-cart" data-id="{{$complex['complex_id']}}" required min="1"--}}
{{--               max="99" value="{{$complex['total_quantity']}}">--}}
{{--        <button data-id="{{$complex['complex_id']}}" class="delete-complex-cart">delete</button>--}}

{{--    </div>--}}
{{--@endforeach--}}

{{--<form action="{{route('submit_order')}}" method="get">--}}
{{--    {{csrf_field()}}--}}
{{--    <label for="first_name">First name</label>--}}
{{--    <input type="text" name="first_name" id="first_name">--}}
{{--    <label for="second_name">Second name</label>--}}
{{--    <input type="text" name="second_name" id="second_name">--}}
{{--    <label for="middle_name">Middle name</label>--}}
{{--    <input type="text" name="middle_name" id="middle_name">--}}
{{--    <label for="email">Email</label>--}}
{{--    <input type="email" name="email" id="email">--}}
{{--    <label for="mobile">Mobile phone</label>--}}
{{--    <input type="text" name="mobile" id="mobile">--}}
{{--    <label for="address">address</label>--}}
{{--    <input type="hidden" id='total-price-input' name="total" value="{{$total}}">--}}
{{--    <input type="text" name="address" id="address">--}}
{{--    <input type="submit" name="submit" id="submit" value="submit">--}}
{{--</form>--}}
{{--<p id="total-price">Total price: {{$total}}</p>--}}