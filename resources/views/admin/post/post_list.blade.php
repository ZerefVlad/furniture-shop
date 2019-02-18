@extends('admin.dashboard')

@section('content')
    <a href="{{route('post_action_create')}}">create Post</a>
    @if (Session::has('post_delete_success'))
        <div class="alert-success">{{Session::get('post_delete_success')}}</div>
    @endif
    <ul>
        @foreach($posts as $post)
            <li>
                {{$post->title}}

                <a href="{{route('post_action_edit', ['id' => $post->id, 'title' => $post->title])}}">edit</a>
                <a href="{{route('post_action_delete', ['id' => $post->id])}}">delete</a>

            </li>
        @endforeach
    </ul>
@endsection