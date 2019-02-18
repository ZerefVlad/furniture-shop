@php
    /**
    @var string $action
    @var App\Models\Attribute $attribute
    **/

@endphp
@extends('admin.dashboard')

@section('content')
    <h1>Введите атрибут</h1>
    @if (Session::has('attribute_edit_success'))
        <div class="alert-success">{{Session::get('attribute_edit_success')}}</div>
    @endif
    @if (Session::has('attribute_create_success'))
        <div class="alert-success">{{Session::get('attribute_create_success')}}</div>
    @endif
    <form enctype="multipart/form-data" method="post" action="@if ($action === 'edit') {{route('attribute_edit', ['id' => $id])}} @else {{route('attribute_create')}}
    @endif">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <label for="title_attribute">Введите название</label>
        <input name="title" id="title_attribute" type="text" @if ($attribute) value="{{$attribute->title}}" @endif >


        <input type="submit" value="Отправить">

    </form>

@endsection
