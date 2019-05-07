<ul>


    @foreach($orders as $order)
        <li>

            @if ($order->getProductObjects())
                @foreach($order->getProductObjects() as $product)
                    <h3>{{$product['product']->title}}</h3>
                @endforeach
            @endif
            @if ($order->getComplexesObjects())
                @foreach($order->getComplexesObjects() as $complex)
                    <h3>{{$complex['product']->title}}</h3>
                    <h3>{{$complex['related_product']->title}}</h3>

                @endforeach
            @endif
                <h2>Номер заказа:{{$order->id}}</h2>
                <h2>Статус заказа: {{$order->status}}</h2>
                <h2>Фамилия заказчика: {{$order->getUserData()->second_name}}</h2>
                <h2>Сумма: {{$order->getOrderTotal()}}</h2>
                <h2>Время заказа: {{$order->getCreatedAt()}}</h2>
            {{--<a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>--}}

        </li>
    @endforeach

        <form action=" {{route('user_edit', ['user' => $user])}} }} ">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <label for="name_user">Введите имя</label>
            <input name="name" id="name_user" type="text" @if ($user) value="{{$user->name}}" @endif >

            <label for="surname_user">Введите фамилию</label>
            <input name="surname" id="surname_user" type="text" @if ($user) value="{{$user->surname}}" @endif>

            <label for="email_user">Введите email</label>
            <input name="email" id="email_user" type="email" @if ($user) value="{{$user->email}}" @endif>

            <label for="password_user">Введите пароль</label>
            <input name="password" id="password_user" type="text" >


            <input type="submit" value="Отправить">

        </form>

</ul>
@if (!$user->isSubscribe())
<form action="{{route('add_subscriber')}}" method="post" >
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <input  name="email" type="hidden"  value="{{$user->email}}"/>
    </div>
    <div class="form-group">
        <input type="submit"  class="btn btn-theme btn-theme-transparent" value="Подписаться">
    </div>
</form>
@else
    <a href="{{route('subscriber_delete', ['subscribe' => \App\Models\Subscribe::where('email',$user->email)->first()])}}">ОДУМАЙСЯ</a>
@endif
