@extends('admin.dashboard')

@section('content')

    @if (Session::has('comment_delete_success'))
        <div class="alert-success">{{Session::get('comment_delete_success')}}</div>
    @endif
    <ul>
        @foreach($comments as $comment)
            <li>
                <div id="comment-{{$comment->id}}">
                    {{$comment->user ? $comment->user->name : "Guest"}}
                    <div id="rating-{{$comment->id}}">{{$comment->product->title}}</div>
                    <div id="rating-{{$comment->id}}">{{$comment->rating}}</div>
                    <div id="text-{{$comment->id}}">{{$comment->text}}</div>
                    <div id="text-{{$comment->id}}">{{$comment->created_at}}</div>
                    <div id="text-{{$comment->id}}">{{$comment->parent_id}}</div>
                    <div id="text-{{$comment->id}}">{{$comment->id}}</div>
                    <button data-id="{{$comment->id}}"

                            form="delete-comment-to-form"
                            class="comment-delete btn btn-dark">
                        Удалить коммент
                    </button>

                    <form id="reply-comment-to-form-{{$comment->id}}" action="{{route('comment_reply')}}"
                          method="get"></form>
                    <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="parent_id" value="{{$comment->id}}">
                    <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="product_id" value="{{$comment->product->id}}">

                    <textarea form="reply-comment-to-form-{{$comment->id}}" name="text">Введите коммент</textarea>
                    <input form="reply-comment-to-form-{{$comment->id}}"  name="rating" min="0" max="5" value="5" type="hidden">
                    <button form="reply-comment-to-form-{{$comment->id}}" class="comment-reply btn btn-green">Отправить ответ</button>


                    <button data-id="{{$comment->id}}"
                            data-category-name="{{$comment->product->categories[0]->title}}"
                            data-product-name="{{$comment->product->title}}"
                            form="update-comment-to-form"
                            class="comment-update btn btn-success">
                        Редактировать коммент
                    </button>
            </li>
        @endforeach
    </ul>
@endsection