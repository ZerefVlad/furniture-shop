@extends('admin.dashboard')

@section('content')
    <a href="{{route('attribute_action_create')}}">create attribute</a>
    @if (Session::has('attribute_delete_success'))
        <div class="alert-success">{{Session::get('attribute_delete_success')}}</div>
    @endif
    <ul>
        @foreach($attributes as $attribute)
            <li>
                {{$attribute->title}}

                <a href="{{route('attribute_action_edit', ['id' => $attribute->id, 'title' => $attribute->title])}}">edit</a>
                <a href="{{route('attribute_action_delete', ['id' => $attribute->id])}}">delete</a>

            </li>
        @endforeach
    </ul>
@endsection