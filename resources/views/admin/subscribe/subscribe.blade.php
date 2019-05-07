@extends('admin.dashboard')

@section('content')

    
    
{{--    <a href="{{route('attribute_action_create')}}">create attribute</a>--}}
{{--    @if (Session::has('attribute_delete_success'))--}}
{{--        <div class="alert-success">{{Session::get('attribute_delete_success')}}</div>--}}
{{--    @endif--}}
    <ul>
        @foreach($subscribers as $subscribe)
            <li>
                {{$subscribe->email}}

{{--                <a href="{{route('attribute_action_edit', ['id' => $attribute->id, 'title' => $attribute->title])}}">edit</a>--}}
               <a href="{{route('subscriber_delete', ['subscribe' => $subscribe])}}">delete</a>

            </li>
        @endforeach
    </ul>


<form method="post" enctype="multipart/form-data" action="{{route('email_sender')}}">
    {{csrf_field()}}
    <input type="text" name="title" value="{{old('title')}}">
    <input name="attachment" type="file">
    <input type="submit" value="Send Huy">
</form>
@endsection
