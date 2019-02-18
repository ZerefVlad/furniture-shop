@php
    /***
    @var string $action*
    @var App\Models\Category $category
    **/
$title = $category ? $category->title : '';
$code = $category ? $category->code : '';
$active = $category ? $category->active : 1;
$type = $category ? $category->type : 'default';
$parent_id = $category ? $category->parent_id : 0;
$image_title = $image ? $image->title : '';
$image_alt = $image ? $image->alt : '';
$image_url = $image ? $image->url : '#';
@endphp
@extends('admin.dashboard')

@section('content')
    <h1>Введите категорию</h1>
    @if (Session::has('category_edit_success'))
        <div class="alert-success">{{Session::get('category_edit_success')}}</div>
    @endif
    @if (Session::has('category_create_success'))
        <div class="alert-success">{{Session::get('category_create_success')}}</div>
    @endif
    <form enctype="multipart/form-data" method="post"
          action="@if ($action === 'edit') {{route('category_edit', ['id' => $id])}} @else {{route('category_create')}} @endif">
        <div class="row">
            <div class="col-md-3">
                <label for="title_category">Введите название</label>
                <input class="form-control" name="title" id="title_category" type="text"
                      value="{{$title}}">

                <label for="code_category">Введите код</label>
                <input class="form-control" name="code" id="code_category" type="text"
                      value="{{$code}}" >

                <label for="active_category">Активная категория</label>
                <input name="active" id="active_category" type="checkbox"value="{{$active}}"
                       @if ($active == 1) checked  @else checked @endif>
                <label for="type_category">Тип категории</label>
                <select class="form-control" name="type">
                    <option value="default"@if($type == 'default') selected @endif>
                        Стандартный товар
                    </option>
                    <option value="custom"@if($type == 'custom') selected @endif>На
                        заказ
                    </option>
                </select>


            </div>

            <div class="col-md-3">
                <input placeholder="title" value="{{$image_title}}" type="text" name="image_title" class="form-control">
                <input type="text" placeholder="alt" value="{{$image_alt}}" name="image_alt" class="form-control">
                <input class="form-control-file" type="file" name="image" id="img-input">
                <img src="{{$image_url}}" width="300" height="300" id="load-image">
                @if ($image)
                    <button data-id="{{$id}}" id="delete-picture">Delete picture</button>
                @endif
            </div>
        </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}">


        <label for="parent_category">Родительская категория</label>
        <select name="parent_id">
            <option value="0">Без родителя</option>
            @foreach($categories as $item)
                <option value="{{$item->id}}"
                       @if($parent_id == $item->id) selected @endif>{{$item->title}}</option>
            @endforeach
        </select>


        <input type="submit" value="Отправить">

    </form>
    <script src="{{asset('js/imageloader.js')}}"></script>
@endsection
