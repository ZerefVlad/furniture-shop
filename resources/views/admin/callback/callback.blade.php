@extends('admin.admin-page')
@section ('content')
    @foreach($callbacks as $callback)
        {{$callback->type}}
        {{$callback->callback}}
        @if($callback->type === 'product')
        {{(\App\Models\Product::find(json_decode($callback->callback)->product))['title']}}
        @endif
    @endforeach


@endsection
