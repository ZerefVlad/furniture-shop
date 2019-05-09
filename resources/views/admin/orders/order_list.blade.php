@extends('admin.admin-page')
@section('content')

    <h1 style="
    font-family: Montserrat;
    font-size: 22px;
    font-weight: 700;
    margin: 30px;
    text-align: center;">Страница заказов</h1>
    @if (Session::has('comment_delete_success'))
        <div class="alert-success">{{Session::get('comment_delete_success')}}</div>
    @endif
    <div class="tab-content" id="tab-content" style="width: 1170px">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <table class="rate-table">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 6%">Номер заказа</th>
                        <th scope="col" style="width: 15%">Информация о пользователе</th>

                        <th scope="col" style="width: 20%">Товар </th>
                        <th scope="col" style="width: 12%">Время закза</th>
                        <th scope="col" style="width: 20%"   >Комплекты</th>
                        <th scope="col">Общая сумма заказа</th>
                        <th scope="col">Статус заказа</th>
                        <th scope="col"> Детали </th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr >
                            <td>{{$order->id}} </td>
                            <td style="word-wrap: break-word;" >
                                ФИО:{{$order->getUserData()->second_name}} {{$order->getUserData()->first_name}} {{$order->getUserData()->middle_name}}
                                Тел.:{{$order->getUserData()->mobile}}
                                Email:{{$order->getUserData()->email}}
                                Aдреса:{{$order->getUserData()->address}}
                            </td>

                            <td style="word-wrap: break-word;text-align: center" >
                                @if ($order->getProductObjects())
                                    @foreach($order->getProductObjects() as $product)
                                        <p>Название :  {{$product['product']->title}}</p>
                                        <p>Код :  {{$product['product']->code}}</p>

                                        <img style="margin-left: 15%" width="150" height="150" src="{{$product['product']->getMainProductUrl()}}">
                                    @endforeach
                                @endif


                            </td>

                            <td style="text-align: center">{{$order->getCreatedAt()}} </td>

                            <td>



                                @if ($order->getComplexesObjects())
                                    @foreach($order->getComplexesObjects() as $complex)
                                        <div style = "border: 1px solid #0159a1; border-radius: 25px;" >
                                            <img
                                                    width="200" height="150"
                                                    src="{{$complex['product']->getMainProductUrl()}}" alt=""/></a>
                                            <h3>Название основного продукста: {{$complex['product']->title}}</h3>
                                            <img style="margin-left: 10%"
                                                    width="200" height="150"
                                                    src="{{$complex['related_product']->getMainProductUrl()}}" alt=""/>
                                        <h3>Название доп продукта: {{$complex['related_product']->title}}</h3>

                                        </div>
                                    @endforeach
                                @endif

                            </td>


                            <td >{{$order->getOrderTotal()}}грн. </td>


                            <td >{{$order->status}} </td>


                            <td ><a href="{{route('single_order', ['id' => $order->id])}}">подробнее</a> </td>

                        </tr>
                    </tbody>

                    @endforeach
                </table>
            </div>
        </div>
    </div>








{{--    <ul>--}}


{{--        @foreach($orders as $order)--}}


{{--                @if ($order->getProductObjects())--}}
{{--                    @foreach($order->getProductObjects() as $product)--}}
{{--                        <h3>Название продукта: {{$product['product']->title}}</h3>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--                @if ($order->getComplexesObjects())--}}
{{--                    @foreach($order->getComplexesObjects() as $complex)--}}
{{--                            <h3>Название основного продукста: {{$complex['product']->title}}</h3>--}}
{{--                            <h3>Название доп продукта: {{$complex['related_product']->title}}</h3>--}}

{{--                    @endforeach--}}
{{--                @endif--}}
{{--                    <h2>Номер заказа:{{$order->id}}</h2>--}}
{{--                    <h2>Статус заказа: {{$order->status}}</h2>--}}
{{--                    <h2>Фамилия заказчика: {{$order->getUserData()->second_name}}</h2>--}}
{{--                    <h2>Сумма: {{$order->getOrderTotal()}}</h2>--}}
{{--                    <h2>Время заказа: {{$order->getCreatedAt()}}</h2>--}}
{{--                <a href="{{route('single_order', ['id' => $order->id])}}">подробнее</a>--}}
{{--                --}}{{--<a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>--}}


{{--        @endforeach--}}
{{--    </ul>--}}
@endsection