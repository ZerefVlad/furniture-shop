@extends('admin.dashboard')

@section('content')
    <h1>Введите пользователя</h1>
    @if (Session::has('user_edit_success'))
        <div class="alert-success">{{Session::get('user_edit_success')}}</div>
    @endif
    @if (Session::has('user_create_success'))
        <div class="alert-success">{{Session::get('user_create_success')}}</div>
    @endif
    <form action="@if ($action === 'edit') {{route('user_edit', ['user' => $user])}} @else {{route('user_create')}}
    @endif">
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

@endsection
