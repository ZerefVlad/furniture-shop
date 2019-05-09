@php
    /**
    @var string $action
    @var App\Models\Post $post
    **/


@endphp

@extends('admin.admin-page')

@section('content')

    <a href="{{route('post_action_create')}}">
        <h1 style="    font-family: Montserrat;    font-size: 22px;    font-weight: 700;    margin: 30px;    text-align: center;">
            Создать пост
        </h1>
    </a>

    @if (Session::has('post_delete_success'))
        <div class="alert-success">{{Session::get('post_delete_success')}}</div>
    @endif

    <div class="tab-content" id="tab-content">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <table class="rate-table">
                    <thead>
                    <tr>
                        <th scope="col">Картинка поста</th>
                        <th scope="col">Название поста</th>
                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td> <img width="100px" height="100px" src="{{$post->getImage() ? $post->getImage()->url : '#'}}"> </td>
                            <td> {{$post->title}}</td>
                            <td><a href="{{route('post_action_edit', ['id' => $post->id, 'title' => $post->title])}}">Изменить</a></td>
                            <td> <a style="    color: #eb1717;" href="{{route('post_action_delete', ['id' => $post->id])}}">Удалить</a></td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

{{--    <a href="{{route('post_action_create')}}">create Post</a>--}}
{{--    @if (Session::has('post_delete_success'))--}}
{{--        <div class="alert-success">{{Session::get('post_delete_success')}}</div>--}}
{{--    @endif--}}
{{--    <ul>--}}
{{--        @foreach($posts as $post)--}}
{{--            <li>--}}
{{--                {{$post->title}}--}}

{{--                <a href="{{route('post_action_edit', ['id' => $post->id, 'title' => $post->title])}}">edit</a>--}}
{{--                <a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>--}}

{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection