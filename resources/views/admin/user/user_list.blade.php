@extends('admin.admin-page')

@section('content')


    <a href="{{route('user_action_create')}}"><h1 style="
    font-family: Montserrat;
    font-size: 22px;
    font-weight: 700;
    margin: 30px;
    text-align: center;">Создать пользователя</h1></a>
    <div class="row users-data">
        <div class="col-12 col-md-12 user-item">

            @if (Session::has('user_delete_success'))
                <div class="alert-success">{{Session::get('user_delete_success')}}</div>
            @endif

                @foreach($users as $user)
            <div class="users-info">

                <ul class="data-list static-list">
                    <li class="list-item">
                        <i class="fas fa-user"></i><span>{{$user->name}} {{$user->sername}}</span>
                    </li>
                    <li class="list-item">
                        <i class="fas fa-envelope"></i><span>{{$user->email}}</span>
                    </li>
                    <li class="list-item">
                        <form id="roles-{{$user->id}}" action="{{route('user_action_change_role', ['id' => $user->id])}}">
                            <select name="role_id" form="roles-{{$user->id}}"> Roles
                                @foreach($roles as $role)
                                    <option @if($user->roles()->first()->id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </form>
                    </li>
                    <li class="list-item">
                       <span> <a href="{{route('user_action_edit', ['id' => $user->id, 'name' => $user->name])}}" ><i class="fas fa-cog"></i><span>Изменить</span></a></span>
                    </li>
                    <li class="list-item">
                        <span><a href="{{route('user_action_delete', ['id' => $user->id])}}" style=" color: #eb1717;"><span>удалить</span></a></span>
                    </li>

                </ul>

            </div>
                @endforeach


                <script
                        src="https://code.jquery.com/jquery-3.3.1.min.js"
                        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                        crossorigin="anonymous"></script>
                <script src="{{ asset('js/script.js') }}" defer></script>

        </div>

    </div>


{{--   <a href="{{route('user_action_create')}}">create user</a>--}}
{{--   @if (Session::has('user_delete_success'))--}}
{{--       <div class="alert-success">{{Session::get('user_delete_success')}}</div>--}}
{{--   @endif--}}
{{--    <ul>--}}
{{--        @foreach($users as $user)--}}
{{--            <li>--}}
{{--                {{$user->name}}--}}

{{--                <a href="{{route('user_action_edit', ['id' => $user->id, 'name' => $user->name])}}">edit</a>--}}
{{--                <a href="{{route('user_action_delete', ['id' => $user->id])}}">delete</a>--}}
{{--                <form id="roles-{{$user->id}}" action="{{route('user_action_change_role', ['id' => $user->id])}}">--}}
{{--                    <select name="role_id" form="roles-{{$user->id}}"> Roles--}}
{{--                        @foreach($roles as $role)--}}
{{--                            <option @if($user->roles()->first()->id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </form>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection
