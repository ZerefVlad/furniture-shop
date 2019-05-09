@extends('admin.admin-page')

@section('content')


    <a href="{{route('attribute_action_create')}}"><h1 style="
    font-family: Montserrat;
    font-size: 22px;
    font-weight: 700;
    margin: 30px;
    text-align: center;">Создать аттрибут</h1></a>
    @if (Session::has('attribute_delete_success'))
        <div class="alert-success">{{Session::get('attribute_delete_success')}}</div>
    @endif
    <div class="tab-content" id="tab-content">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <table class="rate-table">
                    <thead>
                    <tr>
                        <th scope="col">Название аттрибута</th>

                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($attributes as $attribute)
                        <tr>
                            <td> {{$attribute->title}} </td>

                            <td><a href="{{route('attribute_action_edit', ['id' => $attribute->id, 'title' => $attribute->title])}}">Изменить</a></td>
                            <td> <a style="    color: #eb1717;" href="{{route('attribute_action_delete', ['id' => $attribute->id])}}">Удалить</a></td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

{{--    <a href="{{route('attribute_action_create')}}">create attribute</a>--}}
{{--    @if (Session::has('attribute_delete_success'))--}}
{{--        <div class="alert-success">{{Session::get('attribute_delete_success')}}</div>--}}
{{--    @endif--}}
{{--    <ul>--}}
{{--        @foreach($attributes as $attribute)--}}
{{--            <li>--}}
{{--                {{$attribute->title}}--}}

{{--                <a href="{{route('attribute_action_edit', ['id' => $attribute->id, 'title' => $attribute->title])}}">edit</a>--}}
{{--                <a href="{{route('attribute_action_delete', ['id' => $attribute->id])}}">delete</a>--}}

{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection