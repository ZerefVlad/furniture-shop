@extends('admin.admin-page')
@section ('content')
{{--    @foreach($callbacks as $callback)--}}
{{--        {{$callback->type}}--}}
{{--        {{$callback->callback}}--}}
{{--        @if($callback->type === 'product')--}}
{{--        {{(\App\Models\Product::find(json_decode($callback->callback)->product))['title']}}--}}
{{--        @endif--}}
{{--    @endforeach--}}


    <div class="tab-content" id="tab-content">
        <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
            <div class="table-responsive">
                <table class="rate-table">
                    <thead>
                    <tr>
                        <th scope="col">Тип обратной связи</th>
                        <th scope="col">Название товара</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Номер телефона</th>
                        <th scope="col">Email</th>
                        <th scope="col">Сообщение</th>
                        {{--                        <th scope="col">Удалить</th>--}}

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($callbacks as $callback)
                        <tr>
                            <td style="vertical-align: middle;font-size: 15px;">
                                {{$callback->type}}
                            </td>
                            <td style="vertical-align: middle;font-size: 15px;">
                                @if($callback->type === 'product')
                                    {{(\App\Models\Product::find(json_decode($callback->callback)->product))['title']}}
                                @endif
                            </td>
                            <td style="vertical-align: middle;font-size: 15px;">
                                {{(Json_decode($callback->callback))->name}}
                            </td>
                            <td style="vertical-align: middle;font-size: 15px;">
                                {{(Json_decode($callback->callback))->phone}}
                            </td>
                            <td style="vertical-align: middle;font-size: 15px;">
                                @if($callback->type === 'contact')

                                {{(Json_decode($callback->callback))->email}}
                                @endif
                            </td>
                            <td style="vertical-align: middle; word-break: break-all;font-size: 15px;">
                                @if($callback->type === 'contact')
                                {{(Json_decode($callback->callback))->message}}
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>



@endsection
