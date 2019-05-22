


<div class="tab-content" id="tab-content">
    <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">
        <div class="table-responsive">
            <table class="rate-table" style="    table-layout: fixed; width: 100%; border-collapse: collapse; margin-bottom: 0;text-align: center;">
                <thead>
                <tr>
                    <th scope="col">Тип обратной связи</th>
                    <th scope="col">Название товара</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Email</th>
                    <th scope="col">Сообщение</th>


                </tr>

                </thead>
                <tbody>

                    <tr>
                        <td style="vertical-align: middle;font-size: 15px;">
                            {{$type}}
                        </td>
                        <td style="vertical-align: middle;font-size: 15px;">
                            @if($type === 'product')
                                {{(\App\Models\Product::find($data->product))['title']}}
                            @endif
                        </td>
                        <td style="vertical-align: middle;font-size: 15px;">
                            {{$data->name}}
                        </td>
                        <td style="vertical-align: middle;font-size: 15px;">
                            {{$data->phone}}
                        </td>
                        <td style="vertical-align: middle;font-size: 15px;">
                            @if($type === 'contact')

                                {{$data->email}}
                            @endif
                        </td>
                        <td style="vertical-align: middle; word-break: break-all;font-size: 15px;">
                            @if($type === 'contact')
                                {{$data->message}}
                            @endif
                        </td>

                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</div>