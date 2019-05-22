@php
    /**
    @var string $action
    @var App\Models\Attribute $attribute
    **/

@endphp
@extends('admin.admin-page')

@section('content')

    <div class="row users-data">
        <div class="col-12 col-md-12 user-item">
            <h1 style="    font-family: Montserrat;    font-size: 22px;    font-weight: 700;    margin: 30px;    text-align: center;">
                ВВедите аттрибут
            </h1>
            <div class="users-info">


                @if (Session::has('attribute_edit_success'))
                    <div class="alert-success">{{Session::get('attribute_edit_success')}}</div>
                @endif
                @if (Session::has('attribute_create_success'))
                    <div class="alert-success">{{Session::get('attribute_create_success')}}</div>
                @endif
                <form class="change-form " enctype="multipart/form-data" method="post" action="@if ($action === 'edit') {{route('attribute_edit', ['id' => $id])}} @else {{route('attribute_create')}}
                @endif">



                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <ul class="data-list">

                        <li class="list-item col-md-6">
                            <label for="title_attribute">Введите название</label>
                            <input name="title" id="title_attribute" type="text" @if ($attribute) value="{{$attribute->title}}" @endif required>
                        </li>

                    </ul>
                    <div class="button-group">

                        <input type="submit" class="btn save" style="width: 150px;    -webkit-border-radius: 21px;    border-radius: 21px;
                                background-color: #09b81b; color: #ffffff; padding: 10px; font-family: Montserrat; font-size: 14px;
                                font-weight: 600; line-height: 1;"/>

                        <a href="{{route('attribute_list')}}" class="btn cancel">Отмена</a>
                    </div>
                </form>
            </div>

        </div>

    </div>

{{--    <h1>Введите атрибут</h1>--}}
{{--    @if (Session::has('attribute_edit_success'))--}}
{{--        <div class="alert-success">{{Session::get('attribute_edit_success')}}</div>--}}
{{--    @endif--}}
{{--    @if (Session::has('attribute_create_success'))--}}
{{--        <div class="alert-success">{{Session::get('attribute_create_success')}}</div>--}}
{{--    @endif--}}
{{--    <form enctype="multipart/form-data" method="post" action="@if ($action === 'edit') {{route('attribute_edit', ['id' => $id])}} @else {{route('attribute_create')}}--}}
{{--    @endif">--}}
{{--        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}

{{--        <label for="title_attribute">Введите название</label>--}}
{{--        <input name="title" id="title_attribute" type="text" @if ($attribute) value="{{$attribute->title}}" @endif >--}}


{{--        <input type="submit" value="Отправить">--}}

{{--    </form>--}}

@endsection
