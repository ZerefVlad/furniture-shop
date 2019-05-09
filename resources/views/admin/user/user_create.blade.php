@extends('admin.admin-page')

@section('content')

    <div class="row users-data">
        <div class="col-12 col-md-12 user-item">
            <h1 <h1 style="    font-family: Montserrat;    font-size: 22px;    font-weight: 700;    margin: 30px;    text-align: center;">Введите пользователя</h1>
            <div class="users-info">


                @if (Session::has('user_edit_success'))
                    <div class="alert-success">{{Session::get('user_edit_success')}}</div>
                @endif
                @if (Session::has('user_create_success'))
                    <div class="alert-success">{{Session::get('user_create_success')}}</div>
                @endif

                <form action="@if ($action === 'edit') {{route('user_edit', ['user' => $user])}} @else {{route('user_create')}}
                @endif" class="change-form ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <ul class="data-list">
                        <li class="list-item">
                            <i class="fas fa-user"></i><input class="change-input user-name" name="name" id="name_user" type="text" @if ($user) value="{{$user->name}}" @else value="Введите имя" @endif >
                        </li>
                        <li class="list-item">
                            <i class="fas fa-user"></i><input class="change-input user-name" name="surname" id="surname_user" type="text" @if ($user) value="{{$user->surname}}" @else value="Введите фамилию" @endif>
                        </li>
                        <li class="list-item">
                            <i class="fas fa-envelope"></i><input class="change-input user-mail" name="email" id="email_user" type="email" @if ($user) value="{{$user->email}}" @else value="Введите email" @endif>
                        </li>
                        <li class="list-item">
                            <i class="fas fa-envelope"></i><input class="change-input user-password" name="password" id="password_user" type="text"  value="Введите пароль">
                        </li>
                    </ul>
                    <div class="button-group">

                        <input type="submit" class="btn save" style="width: 150px;    -webkit-border-radius: 21px;    border-radius: 21px;
                                background-color: #09b81b; color: #ffffff; padding: 10px; font-family: Montserrat; font-size: 14px;
                                font-weight: 600; line-height: 1;"/>

                        <a href="{{route('user_list')}}" class="btn cancel">Отмена</a>
                    </div>
                </form>
            </div>

        </div>

    </div>

{{--    @if (Session::has('user_edit_success'))--}}
{{--        <div class="alert-success">{{Session::get('user_edit_success')}}</div>--}}
{{--    @endif--}}
{{--    @if (Session::has('user_create_success'))--}}
{{--        <div class="alert-success">{{Session::get('user_create_success')}}</div>--}}
{{--    @endif--}}
{{--    <form action="@if ($action === 'edit') {{route('user_edit', ['user' => $user])}} @else {{route('user_create')}}--}}
{{--    @endif">--}}
{{--        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}

{{--        <label for="name_user">Введите имя</label>--}}
{{--        <input name="name" id="name_user" type="text" @if ($user) value="{{$user->name}}" @endif >--}}

{{--        <label for="surname_user">Введите фамилию</label>--}}
{{--        <input name="surname" id="surname_user" type="text" @if ($user) value="{{$user->surname}}" @endif>--}}

{{--        <label for="email_user">Введите email</label>--}}
{{--        <input name="email" id="email_user" type="email" @if ($user) value="{{$user->email}}" @endif>--}}

{{--        <label for="password_user">Введите пароль</label>--}}
{{--        <input name="password" id="password_user" type="text" >--}}


{{--        <input type="submit" value="Отправить">--}}

{{--    </form>--}}

@endsection
