@extends('admin.dashboard')

@section('content')
    <a href="{{route('category_action_create')}}">create category</a>
    @if (Session::has('category_delete_success'))
        <div class="alert-success">{{Session::get('category_delete_success')}}</div>
    @endif
    <ul>
        @foreach($categories as $category)
            <li>
                {{$category->title}}

                <a href="{{route('category_action_edit', ['id' => $category->id, 'title' => $category->title])}}">edit</a>
                <a href="{{route('category_action_delete', ['id' => $category->id])}}">delete</a>

            </li>
        @endforeach
    </ul>
@endsection