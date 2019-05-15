
@extends('admin.admin-page')
@section('content')

{{--<form action="{{route('create-filter')}}">--}}

{{--    <input type="text" name="title">--}}

{{--    <select name="attribute_id" id="">--}}
{{--        @foreach($attributes as $attribute)--}}
{{--            <option value="{{$attribute->id}}">{{$attribute->title}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    <select name="type" id="">--}}
{{--        <option value="between">Больше/Меньше</option>--}}
{{--        <option value="equal">Равна</option>--}}
{{--    </select>--}}

{{--    <input type="submit" value="Сохранить">--}}
{{--</form>--}}

<div class="row users-data">
    <div class="col-12 col-md-7 user-item">
        <div class="users-info">

            <form action="{{route('create-filter')}}" class="change-form">
                <ul class="data-list">
                <li class="list-item">
                <input class="change-input user-mail" type="text" value="Введiть назву фiльтру" name="title">
                </li>
                    <li class="list-item">
                        <p>Оберiть атрибут: </p>
                <select name="attribute_id" id="" style="width: 200px;">
                    @foreach($attributes as $attribute)
                        <option value="{{$attribute->id}}">{{$attribute->title}}</option>
                    @endforeach
                </select>
                    </li>
                    <li class="list-item">
                        <p>Оберiть вид фiльтру: </p>
                <select name="type" id="">
                    <option value="between">Больше/Меньше</option>
                    <option value="equal">Равна</option>
                </select>
                    </li>
                </ul>

                        <div class="button-group">

                            <input class="btn save" type="submit" value="Зберегти" style="width: 150px;    -webkit-border-radius: 21px;    border-radius: 21px;
                                background-color: #09b81b; color: #ffffff; padding: 10px; font-family: Montserrat; font-size: 14px;
                                font-weight: 600; line-height: 1;">
                        </div>

            </form>


        </div>

    </div>
    <div class="col-12 col-md-5 user-item">
        <div class="users-info">
            <ul class="data-list ">
                @foreach($filters as $filter)
                <li class="list-item col-md-12" >
                    <a href="{{route('delete-filter', ['filter' => $filter])}}"><i class="fas fa-window-close" style="color: #e21e1e; margin-right: 20px"></i></a><span>{{$filter->title}}</span>
                </li>
{{--                <li class="list-item">--}}
{{--                    <i class="fas fa-envelope"></i><span>sample_mail@gmail.com</span>--}}
{{--                </li>--}}
{{--                <li class="list-item">--}}
{{--                    <i class="fas fa-envelope"></i><span>password</span>--}}
{{--                </li>--}}
                @endforeach
            </ul>
        </div>

    </div>
</div>


{{--@foreach($filters as $filter)--}}
{{--    {{$filter->title}} <a href="{{route('delete-filter', ['filter' => $filter])}}">Delete</a>--}}
{{--@endforeach--}}

@endsection