@php
    /***    * @var string $action*    * @var App\Models\Galery $galery    **/
$title = $galery ? $galery->title : '';
$parent_id = $galery ? $galery->parent_id : 0;
$image_title = $image ? $image->title : '';
$image_alt = $image ? $image->alt : '';
$image_url = $image ? $image->url : '#';

@endphp
@extends('admin.admin-page')

@section('content')


    <div class="row users-data">
        <div class="container">
            <h1 style="    font-family: Montserrat;    font-size: 22px;    font-weight: 700;    margin: 30px;    text-align: center;">
                Создайте элемент фотогалереи
            </h1>
            <div class="users-info">


                @if (Session::has('galery_edit_success'))
                    <div class="alert-success">{{Session::get('galery_edit_success')}}</div>
                @endif
                @if (Session::has('galery_create_success'))
                    <div class="alert-success">{{Session::get('galery_create_success')}}</div>
                @endif

                <form enctype="multipart/form-data" method="post"
                      action="@if ($action === 'edit') {{route('galery_edit', ['galery' => $galery])}} @else {{route('galery_create')}} @endif"
                      class="change-form ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <ul class="data-list">

                        <li class="list-item col-md-6">
                            <label for="title_galery">Введите название</label>
                            <input class="form-control change-input" name="title" id="title_galery" type="text"
                                   value="{{$title}}" required>
                        </li>
                        <li class="list-item col-md-6">
                            <label for="parent_galery">Родительский элемент галереи</label>
                            {{--                            <select multiple id="parentss" name="parent_id">--}}
                            {{--                                @foreach($galeries as $g)--}}
                            {{--                                    <option value="{{$g->id}}">{{$g->title}}</option>--}}
                            {{--                                @endforeach--}}
                            {{--                            </select>--}}

                            <input list="galeries" name="parent_id">
                            <datalist id="galeries">
                                @foreach($galeries as $g)

                                    @if(!$galery||$g->id!=$galery->id)
                                <option value="{{$g->id}}">{{$g->title}}</option>
                                    @endif
                                @endforeach
                            </datalist>
                        </li>


                        <li class="list-item col-md-12">

                            <input placeholder="title" value="{{$image_title}}" type="text" name="image_title"
                                   class="form-control">
                            <input type="text" placeholder="alt" value="{{$image_alt}}" name="image_alt"
                                   class="form-control">
                            <input class="form-control-file" type="file" name="image" id="img-input">
                            <img src="{{$image_url}}" width="300" height="300" id="load-image">
                            @if ($image)
                                <a href="{{route('galery_delete_picture', ['galery' => $galery])}}">Удалить
                                    картинку</a>
                            @endif

                        </li>

                    </ul>

                    <div class="button-group">

                        <input type="submit" class="btn save" style="width: 150px;    -webkit-border-radius: 21px;    border-radius: 21px;
                                background-color: #09b81b; color: #ffffff; padding: 10px; font-family: Montserrat; font-size: 14px;
                                font-weight: 600; line-height: 1;"/>

                        <a href="{{route('galery_list')}}" class="btn cancel">Отмена</a>
                    </div>
                </form>
            </div>

        </div>

    </div>


    <script src="{{asset('js/imageloader.js')}}"></script>
@endsection
