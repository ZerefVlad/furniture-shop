@php
$products = \App\Models\Product::all();
@endphp

@extends('layouts.app')

@section('content')
    <section class="container">
@foreach($products as $product)
@foreach($product->comments as $comment)
    @if($comment->isParent())

        <div class="media comment" id="comment-{{$comment->id}}">

            <div class="media-body">
                @if ($comment->user && auth()->user() && ($comment->user->id === auth()->user()->id || auth()->user()->id === 1))
                    <button data-id="{{$comment->id}}"
                            data-category-name="{{$category->title}}"
                            data-product-name="{{$product->title}}"
                            form="update-comment-to-form"
                            class="comment-update btn btn-success"
                    >
                        Редактировать коммент
                    </button>

                    <button data-id="{{$comment->id}}"

                            form="delete-comment-to-form"
                            class="comment-delete btn btn-success"
                    >
                        Удалить коммент
                    </button>
                @endif
                <p class="comment-meta">
                                                            <span class="comment-author">
                                                                <a href="#">{{$comment->user ? $comment->user->name : "Guest"}}</a></span>
                <p>{{$comment->rating}}</p>
                </p>

                <p id="text-{{$comment->id}}"
                   class="comment-text"
                   style="word-wrap: break-word;">{{$comment->text}}</p>
                {{--                                                            @foreach($comment->picture as $pict)--}}
                {{--                                                                <img src="{{$pict->picture->url}}" alt="" >--}}
                {{--                                                                @endforeach--}}

                {{--@php(dd($comment))--}}
                <img alt="" src="{{asset('storage/static_img/blog1.jpg')}}">
                <img alt="" src="{{asset('storage/static_img/blog3.jpg')}}">
            </div>
        </div>
        @foreach($comment->children as $children)
            <div class="media comment" id="comment-{{$comment->id}}"
                 style="width: 80%">

                <div class="media-body">
                    <h4>Вiдповiдь Адмiнiстратора</h4>

                    @if ($children->user && auth()->user() && ($children->user->id === auth()->user()->id || auth()->user()->id === 1))
                        <button data-id="{{$children->id}}"
                                data-category-name="{{$children->title}}"
                                data-product-name="{{$children->title}}"
                                form="update-comment-to-form"
                                class="comment-update btn btn-success"
                        >
                            Редактировать коммент
                        </button>

                        <button data-id="{{$children->id}}"

                                form="delete-comment-to-form"
                                class="comment-delete btn btn-success"
                        >
                            Удалить коммент
                        </button>
                    @endif
                    <p class="comment-meta">
                                                            <span class="comment-author">
                                                                <a href="#">{{$children->user ? $children->user->name : "Guest"}}</a>   </span>
                    <p>{{$children->rating}}</p>
                    </p>

                    <p id="text-{{$children->id}}"
                       class="comment-text"
                       style="word-wrap: break-word;">{{$children->text}}</p>


                </div>
            </div>
        @endforeach
    @endif
@endforeach
@endforeach
    </section>
    @endsection