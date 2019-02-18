@php
    /**
    @var string $action
    @var App\Models\Post $post
    **/

@endphp
@extends('admin.dashboard')

@section('content')
    <h1>Создание поста</h1>
    @if (Session::has('post_edit_success'))
        <div class="alert-success">{{Session::get('post_edit_success')}}</div>
    @endif
    @if (Session::has('post_create_success'))
        <div class="alert-success">{{Session::get('post_create_success')}}</div>
    @endif
    <form enctype="multipart/form-data" method="post" action="@if ($action === 'edit') {{route('post_edit', ['id' => $id])}} @else {{route('post_create')}}
    @endif">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <label for="title_post">Введите название</label>
        <input name="title" id="title_post" type="text" @if ($post) value="{{$post->title}}" @endif >

        <label for="active_category">Активность поста</label>
        <input name="active" id="active_post" type="checkbox"  @if ($post) value="{{$post->active}}"
               @if ($post->active == 1) checked @endif @else checked @endif >





        <input type="file" name="image" id="img-input">
        <img @if ($image) src="{{$image->url}}" width="300" height="300" @else src="#" @endif alt="" id="load-image">
        @if ($image)
            <button data-id="{{$image->id}}" id="delete-picture">Delete picture</button>
        @endif

        <label for="text_post">Введите text</label>
        <input name="text" id="text_post" type="text" @if ($post) value="{{$post->text}}" @endif >

        <input type="submit" value="Отправить">

    </form>
    <script src="{{asset('js/imageloader.js')}}"></script>
@endsection
