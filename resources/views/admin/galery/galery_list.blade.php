@extends('admin.admin-page')

@section('content')

    <a href="{{route('galery_action_create')}}"><h1 style="
    font-family: Montserrat;
    font-size: 22px;
    font-weight: 700;
    margin: 30px;
    text-align: center;">Создать элемент фотогалереи</h1></a>
    @if (Session::has('galery_delete_success'))
        <div class="alert-success">{{Session::get('galery_delete_success')}}</div>
    @endif
    <div class="tab-content" id="tab-content">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <table class="rate-table">
                    <thead>
                    <tr>
                        <th scope="col">Название элемента фотогалереи</th>
                        <th scope="col">Элемент фотогалереи родитель</th>
                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($galeries as $galery)
                        <tr>
                            <td>{{$galery->title}} </td>
                            <td>{{$galery->parent['title']}} </td>
                            <td><a href="{{route('galery_action_edit', ['galery' => $galery])}}">Изменить</a></td>
                            <td> <a style="    color: #eb1717;" href="{{route('galery_action_delete', ['galery' => $galery])}}">Удалить</a></td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


@endsection
