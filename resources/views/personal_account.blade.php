@extends('layouts.app')

@section('content')
    <section class="page-section color">
        <div class="container">


            <div class="row orders" style="margin: 0">
                <h3 class="block-title "
                    style=" color: #1c1c1c;font-family: Roboto;font-size: 32px;font-weight: bold;padding-bottom: 20px">
                    Особисті данні
                </h3>
                <h4 class="block-title "
                    style="text-transform: none; color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 550;">
                    Актуальные данные помогут Вам удобнее пользоваться нашим магазином. В часности, актуальный номер
                    телефона поможет Вам видеть Ваши заказы. Если Вы не видите нужный заказ в списке, то, пожалуйста,
                    добавьте номер телефона по которому вы его делали.
                </h4>
                <div class="content " id="parametr" style="">
                    <form action=" {{route('user_edit', ['user' => $user])}} }} ">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <input type="submit" value="Зберегти змiни" style="color: #02bbdb;font-family: Montserrat;font-size: 18px;font-weight: 400;float: right;border-radius: 5px;
    border: 1px solid #02bbdb; background-color: #ffffff;   margin: 20px;">

                        <div style="color: #333333;font-family: Lato;font-size: 18px;font-weight: 700;letter-spacing: -0.63px;
                                        line-height: 45px;padding-bottom: 20px;box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);border-radius: 5px;background-color: #ffffff;">
                            <div style="padding: 35px;">
                                <p class="col-md-3"
                                   style="color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 500;">
                                    Прiзвище: </p>
                                <input class="col-md-3" name="surname" id="surname_user" type="text" @if ($user) value="{{$user->surname}}" @endif
                                       style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;    height: 30px;    margin-top: 1%;"/>
                            </div>
                            <div style="padding: 35px;">
                                <p class="col-md-3"
                                   style="color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 500;">
                                    Iм'я: </p>
                                <input class="col-md-3" name="name" id="name_user" type="text" @if ($user) value="{{$user->name}}" @endif
                                       style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;    height: 30px;    margin-top: 1%;"/>
                            </div>
                            <div style="padding: 35px;">
                                <p class="col-md-3"
                                   style="color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 500;">
                                    Email: </p>
                                <input class="col-md-3" name="email" id="email_user" type="email" @if ($user) value="{{$user->email}}" @endif
                                       style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;    height: 30px;    margin-top: 1%;"/>
                            </div>
                            <div style="padding: 35px;">
                                <p class="col-md-3"
                                   style="color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 500;">
                                    Password: </p>
                                <input class="col-md-3" name="password" id="password_user" type="password"
                                       style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;    height: 30px;    margin-top: 1%;"/>
                            </div>

                        </div>


                    </form>





                    <div style="color: #333333;font-family: Lato;font-size: 18px;font-weight: 700;letter-spacing: -0.63px;
                                        line-height: 45px;padding-bottom: 20px;box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);border-radius: 5px;background-color: #ffffff;">
                        <h3 style=" color: #1c1c1c;font-family: Roboto;font-size: 32px;font-weight: bold;padding: 15px;   ">
                            Відділ обслуговування клієнтів</h3>
                        <div style="padding: 35px;">
                            <p class="col-md-3"
                               style="color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 500;">
                                Телефон: </p>
                            <p class="col-md-6"
                               style="color: #02bbdb;font-family: Roboto;font-size: 18px;font-weight: 400;">+38(066)123
                                4567 / +38(066)123 4567</p>
                        </div>
                        <div style="padding: 35px;">
                            <p class="col-md-3"
                               style="color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 500;">Пн -
                                Пт: </p>
                            <p class="col-md-3"
                               style="color: #333333;font-family: Roboto;font-size: 18px;font-weight: 400;">09:00 -
                                18:00</p>
                        </div>
                        <div style="padding: 35px;">
                            <p class="col-md-3"
                               style="color: #1c1c1c;font-family: Roboto;font-size: 18px;font-weight: 500;">Сб -
                                Нед: </p>
                            <p class="col-md-3"
                               style="color: #333333;font-family: Roboto;font-size: 18px;font-weight: 400;">09:00 -
                                18:00</p>
                        </div>


                    </div>
                </div>


                <div class="content">
                    <div class="tabs-wrapper content-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a
                                        style="color: #02bbdb;font-family: Roboto;font-size: 18px;font-weight: 400;"
                                        href="#user-orders" data-toggle="tab">Історія замовлень</a></li>


                        </ul>
                        <div class="tab-content">


                                        <table class="rate-table" style="text-align: center">
                                            <thead>
                                            <tr >
                                                <th scope="col" style="width: 6%; text-align: center">Номер заказа</th>

                                                <th scope="col" style="width: 25%; text-align: center">Товар </th>
                                                <th scope="col" style="width: 12%; text-align: center">Время закза</th>
                                                <th scope="col" style="width: 35%; text-align: center"   >Комплекты</th>
                                                <th scope="col" style="text-align:center">Общая сумма заказа</th>
                                                <th scope="col">Статус заказа</th>

                                            </tr>

                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr >
                                                    <td>{{$order->id}} </td>


                                                    <td style="word-wrap: break-word;text-align: center" >
                                                        @if ($order->getProductObjects())
                                                            @foreach($order->getProductObjects() as $product)
                                                                <p>Название :  {{$product['product']->title}}</p>
                                                                <p>Код :  {{$product['product']->code}}</p>

                                                                <img style="margin-left: 15%;" width="150" height="150" src="{{$product['product']->getMainProductUrl()}}">
                                                            @endforeach
                                                        @endif


                                                    </td>

                                                    <td style="text-align: center">{{$order->getCreatedAt()}} </td>

                                                    <td>



                                                        @if ($order->getComplexesObjects())
                                                            @foreach($order->getComplexesObjects() as $complex)
                                                                <div style = "border: 1px solid #0159a1; border-radius: 25px;" >
                                                                    <img style="margin-top: 15px"
                                                                            width="200" height="150"
                                                                            src="{{$complex['product']->getMainProductUrl()}}" alt=""/></a>
                                                                    <h3>Название основного продукста: {{$complex['product']->title}}</h3>
                                                                    <img style=""
                                                                         width="200" height="150"
                                                                         src="{{$complex['related_product']->getMainProductUrl()}}" alt=""/>
                                                                    <h3>Название доп продукта: {{$complex['related_product']->title}}</h3>

                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </td>


                                                    <td >{{$order->getOrderTotal()}}грн. </td>


                                                    <td >{{$order->status}} </td>



                                                </tr>
                                            </tbody>

                                            @endforeach
                                        </table>
                                    </div>

                            </div>




                </div>

            </div>
        </div>
    </section>
    <!-- /PAGE -->
    </div>
    <!-- /CONTENT AREA -->

@endsection

{{--<ul>--}}


{{--    @foreach($orders as $order)--}}
{{--        <li>--}}

{{--            @if ($order->getProductObjects())--}}
{{--                @foreach($order->getProductObjects() as $product)--}}
{{--                    <h3>{{$product['product']->title}}</h3>--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--            @if ($order->getComplexesObjects())--}}
{{--                @foreach($order->getComplexesObjects() as $complex)--}}
{{--                    <h3>{{$complex['product']->title}}</h3>--}}
{{--                    <h3>{{$complex['related_product']->title}}</h3>--}}

{{--                @endforeach--}}
{{--            @endif--}}
{{--            <h2>Номер заказа:{{$order->id}}</h2>--}}
{{--            <h2>Статус заказа: {{$order->status}}</h2>--}}
{{--            <h2>Фамилия заказчика: {{$order->getUserData()->second_name}}</h2>--}}
{{--            <h2>Сумма: {{$order->getOrderTotal()}}</h2>--}}
{{--            <h2>Время заказа: {{$order->getCreatedAt()}}</h2>--}}

{{--        </li>--}}
{{--    @endforeach--}}

{{--    <form action=" {{route('user_edit', ['user' => $user])}} }} ">--}}
{{--        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}

{{--        <label for="name_user">Введите имя</label>--}}
{{--        <input name="name" id="name_user" type="text" @if ($user) value="{{$user->name}}" @endif >--}}

{{--        <label for="surname_user">Введите фамилию</label>--}}
{{--        <input name="surname" id="surname_user" type="text" @if ($user) value="{{$user->surname}}" @endif>--}}

{{--        <label for="email_user">Введите email</label>--}}
{{--        <input name="email" id="email_user" type="email" @if ($user) value="{{$user->email}}" @endif>--}}

{{--        <label for="password_user">Введите пароль</label>--}}
{{--        <input name="password" id="password_user" type="text">--}}


{{--        <input type="submit" value="Отправить">--}}

{{--    </form>--}}

{{--</ul>--}}
{{--@if (!$user->isSubscribe())--}}
{{--    <form action="{{route('add_subscriber')}}" method="post">--}}
{{--        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
{{--        <div class="form-group">--}}
{{--            <input name="email" type="hidden" value="{{$user->email}}"/>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <input type="submit" class="btn btn-theme btn-theme-transparent" value="Подписаться">--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@else--}}
{{--    <a href="{{route('subscriber_delete', ['subscribe' => \App\Models\Subscribe::where('email',$user->email)->first()])}}">ОДУМАЙСЯ</a>--}}
{{--@endif--}}
