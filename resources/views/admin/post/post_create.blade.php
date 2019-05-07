@php
    /**
    @var string $action
    @var App\Models\Post $post
    **/
$image_title = $image ? $image->title : '';
$image_alt = $image ? $image->alt : '';
$image_url = $image ? $image->url : '#';
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




        <div class="col-md-3">
            <input placeholder="title" value="{{$image_title}}" type="text" name="image_title" class="form-control">
            <input type="text" placeholder="alt" value="{{$image_alt}}" name="image_alt" class="form-control">
            <input class="form-control-file" type="file" name="image" id="img-input">
            <img src="{{$image_url}}" width="300" height="300" id="load-image">
            @if ($image)
                <button data-id="{{$id}}" id="delete-picture-post">Delete picture</button>
            @endif
        </div>

        <label for="text_post">Введите text</label>
        <input name="text" id="text_post" type="text" @if ($post) value="{{$post->text}}" @endif >

        <input type="submit" value="Отправить">

    </form>
    <script src="{{asset('js/imageloader.js')}}"></script>
@endsection
