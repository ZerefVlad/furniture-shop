@php
    $likes =  \App\Models\Likes::where('user_track', \Session::get('hash'))->get();

@endphp

@extends('layouts.app')

@section('content')
    @foreach($likes as $likeProduct)
    {{$likeProduct->product->getMainProductUrl()}}
    {{$likeProduct->product->title}}
    @endforeach
@endsection