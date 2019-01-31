@php
/**
@var string $action
@var App\Models\Category $category
**/

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
    <form enctype="multipart/form-data" method="post" action="@if ($action === 'edit') {{route('category_edit', ['id' => $id])}} @else {{route('category_create')}}
    @endif">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <label for="title_category">Введите название</label>
        <input name="title" id="title_category" type="text" @if ($category) value="{{$category->title}}" @endif >

        <label for="code_category">Введите код</label>
        <input name="code" id="code_category" type="text" @if ($category) value="{{$category->code}}" @endif>

        <label for="active_category">Активная категория</label>
        <input name="active" id="active_category" type="checkbox"  @if ($category) value="{{$category->active}}"
               @if ($category->active == 1) checked @endif @else checked @endif >

        <label for="type_category">Тип категории</label>
        <select name="type">
            <option value="default" @if ($category) @if($category->type == 'default') selected @endif @endif>Стандартный товар</option>
            <option value="custom" @if ($category) @if($category->type == 'custom') selected @endif @endif>На заказ</option>
        </select>


        <input type="file" name="image" id="img-input">
        <img @if ($image) src="{{$image->url}}" width="300" height="300" @else src="#" @endif alt="" id="load-image">
        @if ($image)
            <button data-id="{{$image->id}}" id="delete-picture">Delete picture</button>
        @endif
        <label for="parent_category">Родительская категория</label>
        <select name="parent_id">
            <option value="0">Без родителя</option>
            @foreach($categories as $item)
            <option value="{{$item->id}}" @if ($category) @if($category->parent_id == $item->id) selected @endif @endif>{{$item->title}}</option>
           @endforeach
        </select>


        <input type="submit" value="Отправить">

    </form>
    <script src="{{asset('js/imageloader.js')}}"></script>
@endsection
