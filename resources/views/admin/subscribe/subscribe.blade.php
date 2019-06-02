@extends('admin.admin-page')

@section('content')

    
    
{{--    <a href="{{route('attribute_action_create')}}">create attribute</a>--}}
{{--    @if (Session::has('attribute_delete_success'))--}}
{{--        <div class="alert-success">{{Session::get('attribute_delete_success')}}</div>--}}
{{--    @endif--}}

<div class="row users-data">
    <div class="col-12 col-md-7 user-item">
        <div class="users-info" style="padding-top: 0px;">
            <h1 style="    font-family: Montserrat;    font-size: 22px;    font-weight: 700;    margin: 30px;    text-align: center; ">
                Cписок подписчиков
            </h1>
            <ul class="data-list static-list">
                @foreach($subscribers as $subscribe)
                <li class="list-item col-md-12">
                    <div class="col-md-6">
                        <i class="fas fa-envelope"></i><span> {{$subscribe->email}}</span>
                    </div>
                    <div class="col-md-6">
                    <a class="col-md-6" href="{{route('subscriber_delete', ['subscribe' => $subscribe])}}"><span>Удалить подписчика</span></a>
                    </div>
                </li>

                    @endforeach
            </ul>



        </div>

    </div>
    <div class="col-12 col-md-5 user-item">

        <form  method="post" enctype="multipart/form-data" action="{{route('email_sender')}}">
            {{csrf_field()}}
        <div class="users-balance">
            <div class="balance-title">Титулка письма: </div> <input style="width: 80%" type="text" name="title" value="{{old('title')}}" required>
            <div class="balance-title">Текст письма: </div>
            <textarea type="text" rows="20" cols="40" style="max-width: 80%" name="text" value="{{old('text')}}" required></textarea>

            <input name="attachment" type="file">
            <input type="submit" class="get-cash" value="Разослать письмо">
        </div>
        </form>
    </div>
</div>





{{--    <ul class="col-md-6">--}}
{{--        @foreach($subscribers as $subscribe)--}}
{{--            <li>--}}
{{--                {{$subscribe->email}}--}}

{{--                <a href="{{route('attribute_action_edit', ['id' => $attribute->id, 'title' => $attribute->title])}}">edit</a>--}}
{{--               <a href="{{route('subscriber_delete', ['subscribe' => $subscribe])}}">delete</a>--}}

{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}


{{--<form class="col-md-6" method="post" enctype="multipart/form-data" action="{{route('email_sender')}}">--}}
{{--    {{csrf_field()}}--}}
{{--    <input type="text" name="title" value="{{old('title')}}">--}}
{{--    <textarea type="text" name="text" value="{{old('text')}}"></textarea>--}}
{{--    <input name="attachment" type="file">--}}
{{--    <input type="submit" value="Send Huy">--}}
{{--</form>--}}
@endsection
