@extends('admin.admin-page')

@section('content')




    <form method="post" enctype="multipart/form-data" method="post" action="{{route('color_create')}}"
          id="create-color-form">
        {{csrf_field()}}
    </form>
    <input form="create-color-form" type="file" name="img">
    <input form="create-color-form" type="text" name="title">
    <input form="create-color-form" type="submit" value="Create">

    @foreach($colors as $color)
        <img width="50" height="50" src="{{$color->getImage() ? $color->getImage()->url : '#'}}" alt="">
        {{$color->title}}
        <a href="{{route('color_delete', ['color' => $color])}}">Delete</a>
    @endforeach
@endsection