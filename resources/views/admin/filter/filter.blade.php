
@extends('admin.admin-page')
@section('content')

<form action="{{route('create-filter')}}">

    <input type="text" name="title">

    <select name="attribute_id" id="">
        @foreach($attributes as $attribute)
            <option value="{{$attribute->id}}">{{$attribute->title}}</option>
        @endforeach
    </select>

    <select name="type" id="">
        <option value="between">Больше/Меньше</option>
        <option value="equal">Равна</option>
    </select>

    <input type="submit" value="Сохранить">
</form>

<div class="row users-data">
    <div class="col-12 col-md-12 user-item">
        <div class="users-info">

            <form action="" class="change-form ">
                <ul class="data-list">
                    <li class="list-item">
                        <i class="fas fa-user"></i><input class="change-input user-name" type="text" value="Keven Feil">
                    </li>
                    <li class="list-item">
                        <i class="fas fa-envelope"></i><input class="change-input user-mail" type="text"  value="sample_mail@gmail.com">
                    </li>
                    <li class="list-item">
                        <i class="fas fa-envelope"></i><input class="change-input user-password" type="text"  value="password">
                    </li>
                </ul>
                <div class="button-group">
                    <button class="btn cancel">Отмена</button>
                    <button class="btn save">Сохранить</button>
                </div>
            </form>
        </div>

    </div>

</div>


@foreach($filters as $filter)
    {{$filter->title}} <a href="{{route('delete-filter', ['filter' => $filter])}}">Delete</a>
@endforeach

@endsection