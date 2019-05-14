@extends('admin.admin-page')
@php

        @endphp
@section ('content')


    <div class="tab-content" id="tab-content">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <div><h1 style="font-family: Montserrat;font-size: 22px;font-weight: 700; margin: 30px; text-align: center">
                        Номер замовлення: {{$orders->id}} <span style="font-size: 16px;font-weight: 500;color: #02bbdb;">Час замовлення: {{$orders->getCreatedAt()}}</span>
                        Вартiсть товару в замовленнi: {{$orders->getOrderTotal()}}
                    </h1>
                </div>
                <div style="float: inherit;">
                <select style="    float: left" class="form-control col-md-8" name="status" id="change-status-order-select">
                    <option value="processing" @if($orders->status == 'processing') selected @endif>
                        В обробцi
                    </option>
                    <option value="ready" @if($orders->status == 'ready') selected @endif>
                        Готовий
                    </option>
                    <option value="canceled" @if($orders->status == 'canceled') selected @endif>
                        Скасований
                    </option>
                </select>
                <button id="change-status-order " data-id="{{$orders->id}}" class="change-status-order btn btn-dark col-md-4">
                    Змiнити статус замовлення
                </button>
                </div>



                <div class="row users-data">
                    <div class="col-12 col-md-12 user-item">
                        <div class="users-info">

                            <ul class="data-list static-list">
                                <li class="list-item">
                                    <i class="fas fa-user"></i><span>{{$orders->getUserData()->second_name}} {{$orders->getUserData()->first_name}} {{$orders->getUserData()->middle_name}}</span>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-envelope"></i><span>{{$orders->getUserData()->email}}</span>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-phone"></i><span>{{$orders->getUserData()->mobile}}</span>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-home"></i><span>{{$orders->getUserData()->address}}</span>
                                </li>
                                <li class="list-item col-md-12" >
                                    <i class="fas fa-info" ></i><span style="word-wrap: break-word;     width: 100%;">{{$orders->getUserData()->name}}</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


                <table class="table">
                    <thead>

                    </thead>
                    <tbody>
                    @if ($orders->getProductObjects())
                        @foreach($orders->getProductObjects() as $product)
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

                    @if ($orders->getComplexesObjects())
                        @foreach($orders->getComplexesObjects() as $complex)
                        <tr class="complex-item-">


                            <td class="image"><a class="media-link" href="#"></i><img
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

                            <td class="image"><a class="media-link" href="#"></i><img
                                            width="200" height="150"
                                            src="{{$complex['related_product']->getMainProductUrl()}}" alt=""/></a>
                                <p>кiлькiсть додаткового товару: {{$complex['quantity']}} шт.</p>
                                <p>цiна одного додаткового товару: {{$complex['related_product']->getPriceWithDiscount()}} грн.</p>

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


                                <label> К-сть комплектiв: x{{$complex['total_quantity']}}</label>
                                <p class="complex_price" style=" color: #02bbdb; margin-top: 20px; font-family: Roboto;font-size: 22px;font-weight: 500;">Цiна комплекту: {{($complex['related_product']->getPriceWithDiscount() - $complex['related_product']->getPriceWithDiscount()* $complex['discount']/100) * $complex['quantity']  * $complex['total_quantity'] + $complex['product']->getPriceWithDiscount()}} грн.</p>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>




{{--    <h2>{{$orders->getUserData()->second_name}}</h2>--}}
{{--    --}}



{{--    @if ($orders->getProductObjects())--}}
{{--        @foreach($orders->getProductObjects() as $product)--}}
{{--            {{$product['product']->title}}--}}
{{--            <img src="{{$product['color'] ? $product['color']->getImage()->url : ''}}" alt="">--}}
{{--            <img width="300" height="200" src="{{$product['product']->getMainProductUrl()}}">--}}
{{--        @endforeach--}}
{{--    @endif--}}
{{--    @if ($orders->getComplexes())--}}
{{--        @foreach($orders->getComplexes() as $complex)--}}
{{--        @endforeach--}}
{{--    @endif--}}




@endsection