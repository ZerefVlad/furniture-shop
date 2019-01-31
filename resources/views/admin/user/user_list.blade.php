@extends('admin.dashboard')

@section('content')
   <a href="{{route('user_action_create')}}">create user</a>
   @if (Session::has('user_delete_success'))
       <div class="alert-success">{{Session::get('user_delete_success')}}</div>
   @endif
    <ul>
        @foreach($users as $user)
            <li>
                {{$user->name}}

                <a href="{{route('user_action_edit', ['id' => $user->id, 'name' => $user->name])}}">edit</a>
                <a href="{{route('user_action_delete', ['id' => $user->id])}}">delete</a>
                <form id="roles-{{$user->id}}" action="{{route('user_action_change_role', ['id' => $user->id])}}">
                    <select name="role_id" form="roles-{{$user->id}}"> Roles
                        @foreach($roles as $role)
                            <option @if($user->roles()->first()->id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
