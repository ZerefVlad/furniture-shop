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
                            <li><a style="color: #02bbdb;font-family: Roboto;font-size: 18px;font-weight: 400;"
                                   href="#see-product" data-toggle="tab">Переглянуті товари</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="user-orders">
                                <table class="table">
                                    <thead>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                                        src="assets/img/cart.jpg" alt=""/></a></td>
                                        <td class="description">
                                            <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                <a href="#">Standard Product Name Header Here</a></h4>
                                            <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                Код товару: 232332</p>
                                            <p>1 шт.</p>
                                        </td>
                                        <td class="quantity"></td>

                                        <td class="total" style="padding-right: 50px">
                                            <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                7550грн</p>
                                            <p class="skidka"
                                               style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                Знижка: 0% </p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img
                                                        src="assets/img/cart.jpg" alt=""/></a></td>
                                        <td class="description">
                                            <h4 style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                <a href="#">Standard Product Name Header Here</a></h4>
                                            <p style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                Код товару: 232332</p>
                                            <p>1 шт.</p>
                                        </td>
                                        <td class="quantity"></td>

                                        <td class="total" style="padding-right: 50px">
                                            <p style="color: #333333;font-family: Roboto;font-size: 22px;font-weight: 500;">
                                                7550грн</p>
                                            <p class="skidka"
                                               style="color: #9e9e9e;font-family: Roboto;font-size: 18px;font-weight: 400;">
                                                Знижка: 0% </p>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade " id="see-product">
                                <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare
                                    massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas.
                                    Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis,
                                    feugiat sodales ipsum consectetur nec. </p>
                                <p>Morbi imperdiet lacus nec ante blandit, sit amet fermentum magna faucibus. Nunc nec
                                    libero id urna vulputate venenatis. Aenean vulputate odio felis, in rhoncus sapien
                                    auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh.
                                    Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu
                                    bibendum molestie vel et metus. Aenean iaculis purus et velit iaculis, nec convallis
                                    ipsum ornare. Integer a orci enim.</p>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /PAGE -->
    </div>
    <!-- /CONTENT AREA -->
    <section class="subscribe">
        <div class="container full-width" style="background-color: #02bbdb;width: 100%; ">
            <div class="container">
                <h1 style="color: #ffffff;font-family: Montserrat;font-size: 68px;font-weight: 700;line-height: 78px;        margin-top: 7%; margin-bottom: 3%;">
                    Join our mailing list to get the latest announcements
                </h1>
                <form action="#">
                    <div class="form-group">
                        <input style="opacity: 0.6;color: #ffffff;font-family: Montserrat;font-size: 18px;font-weight: 400;line-height: 78px;    width: 70%;     margin: 0 2% 7% 0;    float: left;"
                               class="form-control" type="text" placeholder="Enter Your Mail"/>


                        <button style="box-shadow: 3px 6px 12px rgba(23, 23, 23, 0.2);border-radius: 29px;background-color: #ffffff;"
                                class="btn btn-theme btn-theme-transparent">Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

<ul>


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
{{--            --}}{{--<a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>--}}

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
