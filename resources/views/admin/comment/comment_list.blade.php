@extends('admin.admin-page')

@section('content')

   <h1 style="
    font-family: Montserrat;
    font-size: 22px;
    font-weight: 700;
    margin: 30px;
    text-align: center;">Cписок комментариев</h1>
    @if (Session::has('comment_delete_success'))
        <div class="alert-success">{{Session::get('comment_delete_success')}}</div>
    @endif
    <div class="tab-content" id="tab-content">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <table class="rate-table">
                    <thead>
                    <tr>
                        <th scope="col">Имя польхователя</th>
                        <th scope="col">Название товара </th>
                        <th scope="col" style="width: 30%;">Текст комментария</th>
                        <th scope="col" style="width: 10%;">оценка</th>
                        <th scope="col">Время создания комментария</th>
                        <th scope="col">Ответить на комментарий</th>
                        <th scope="col"> Действия </th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr id="comment-{{$comment->id}}">
                            <td>{{$comment->user ? $comment->user->name : "Guest"}} </td>
                            <td style="word-wrap: break-word;" id="prodtitle-{{$comment->id}}">{{$comment->product->title}} </td>
                            <td style="word-wrap: break-word;" id="text-{{$comment->id}}">{{$comment->text}} </td>
                            <td id="rating-{{$comment->id}}">{{$comment->rating}} </td>
                            <td id="created-{{$comment->id}}">{{$comment->created_at}} </td>

                            <td id="reply-{{$comment->id}}">
                               <form id="reply-comment-to-form-{{$comment->id}}" action="{{route('comment_reply')}}"
                                      method="get"></form>
                                <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="parent_id" value="{{$comment->id}}">
                                <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="product_id" value="{{$comment->product->id}}"><input form="reply-comment-to-form-{{$comment->id}}"  name="rating" min="0" max="5" value="5" type="hidden">

                                <textarea style=" width: 120px;height: 100px" form="reply-comment-to-form-{{$comment->id}}" name="text">Введите ответ на коммент</textarea>
                                <button style="margin: 10px" form="reply-comment-to-form-{{$comment->id}}" class="comment-reply btn btn-success">Отправить ответ</button>



                            </td>

                            <td id="edit-{{$comment->id}}">

                                        <button data-id="{{$comment->id}}"
                                                data-category-name="{{$comment->product->categories[0]->title}}"
                                                data-product-name="{{$comment->product->title}}"
                                                form="update-comment-to-form"
                                                class="comment-update btn btn-dark"
                                        style="margin: 10px; font-size: 12px">
                                            Редактировать коммент
                                        </button>
                                   <button data-id="{{$comment->id}}"
                                                style="margin: 10px;background-color: #eb1717;"
                                                form="delete-comment-to-form"
                                                class="comment-delete btn " >
                                            Удалить коммент
                                        </button>


                            </td>




{{--                            <td><a href="{{route('category_action_edit', ['id' => $category->id, 'title' => $category->title])}}">edit</a></td>--}}
{{--                            <td> <a style="    color: #eb1717;" href="{{route('category_action_delete', ['id' => $category->id])}}">delete</a></td>--}}

                        </tr>
                    </tbody>

                    @endforeach
                </table>
            </div>
        </div>
    </div>

{{--    @if (Session::has('comment_delete_success'))--}}
{{--        <div class="alert-success">{{Session::get('comment_delete_success')}}</div>--}}
{{--    @endif--}}
{{--    <ul>--}}
{{--        @foreach($comments as $comment)--}}
{{--            <li>--}}
{{--                <div id="comment-{{$comment->id}}">--}}
{{--                    {{$comment->user ? $comment->user->name : "Guest"}}--}}
{{--                    <div id="rating-{{$comment->id}}">{{$comment->product->title}}</div>--}}
{{--                    <div id="rating-{{$comment->id}}">{{$comment->rating}}</div>--}}
{{--                    <div id="text-{{$comment->id}}">{{$comment->text}}</div>--}}
{{--                    <div id="text-{{$comment->id}}">{{$comment->created_at}}</div>--}}
{{--                    <div id="text-{{$comment->id}}">{{$comment->parent_id}}</div>--}}
{{--                    <div id="text-{{$comment->id}}">{{$comment->id}}</div>--}}
{{--                    <button data-id="{{$comment->id}}"--}}

{{--                            form="delete-comment-to-form"--}}
{{--                            class="comment-delete btn btn-dark">--}}
{{--                        Удалить коммент--}}
{{--                    </button>--}}

{{--                    <form id="reply-comment-to-form-{{$comment->id}}" action="{{route('comment_reply')}}"--}}
{{--                          method="get"></form>--}}
{{--                    <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="_token" value="{{csrf_token()}}">--}}
{{--                    <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="parent_id" value="{{$comment->id}}">--}}
{{--                    <input type="hidden" form="reply-comment-to-form-{{$comment->id}}" name="product_id" value="{{$comment->product->id}}">--}}

{{--                    <textarea form="reply-comment-to-form-{{$comment->id}}" name="text">Введите коммент</textarea>--}}
{{--                    <input form="reply-comment-to-form-{{$comment->id}}"  name="rating" min="0" max="5" value="5" type="hidden">--}}
{{--                    <button form="reply-comment-to-form-{{$comment->id}}" class="comment-reply btn btn-green">Отправить ответ</button>--}}


{{--                    <button data-id="{{$comment->id}}"--}}
{{--                            data-category-name="{{$comment->product->categories[0]->title}}"--}}
{{--                            data-product-name="{{$comment->product->title}}"--}}
{{--                            form="update-comment-to-form"--}}
{{--                            class="comment-update btn btn-success">--}}
{{--                        Редактировать коммент--}}
{{--                    </button>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}


    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="{{asset('js/comment.js')}}"></script>
@endsection