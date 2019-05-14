<form action="{{route('show_product', ['category' => $category])}}">
    <div class="">
        <input style="    width: 150px;
    -webkit-border-radius: 21px;
    border-radius: 21px;
    background-color: #09b81b;
    color: #ffffff;
    padding: 10px;
    font-family: Montserrat;
    font-size: 14px;
    font-weight: 600;
    line-height: 1;" type="submit" value="Фильтровать">
        <a  style="color: #b91d19" href="{{route('show_product', ['category' => $category])}}">Сбросить фильтр</a>
    </div>

    <ul class="col-md-4" style="    text-align: left; margin-top: 20px;">
        @foreach($filters as $filter)


            @if ($filter->type != 'equal')
<div style="    width: 100%;margin: 20px;    float: inherit;">
                <li style="color: #686868;    font-family: Roboto;    font-size: 16px;    font-weight: 500;">
                    <div style="float: left">{{$filter->title}}</div>
                    <div style="float: right">
                    от: <input style="width: 50px" type="number" name="filter[{{$filter->id}}][min]"
                               @if (isset($filterRequest[$filter->id])&&$filterRequest[$filter->id]['min']) value="{{$filterRequest[$filter->id]['min']}}"
                               @else value="0" @endif>
                    до: <input style="width: 50px" type="number" name="filter[{{$filter->id}}][max]"
                               @if (isset($filterRequest[$filter->id])&&$filterRequest[$filter->id]['max']) value="{{$filterRequest[$filter->id]['max']}}"
                               @else value="99000" @endif>
                    </div>
                </li>
</div>
            @endif

        @endforeach
    </ul>

    <ul class="col-md-8" style="margin-top: 20px">
        @foreach($filters as $filter)

            <li>

                @if ($filter->type === 'equal')
                    <ul class="col-md-3" style="word-wrap:  break-word">
                        <li style="color: #686868;    font-family: Roboto;    font-size: 16px;    font-weight: 500;"> {{$filter->title}}</li>
                        @foreach($filtersData[$filter->id] as $filterData)
                            <li style="text-align: left;float: left;margin: 10px;max-width: 100%;">

                                <input type="checkbox" name="filter[{{$filter->id}}][{{$filterData}}]"
                                       value="{{$filterData}}"
                                       @if (isset($filterRequest[$filter->id]) && isset($filterRequest[$filter->id][$filterData]) && $filterRequest[$filter->id][$filterData] == $filterData) checked @endif> {{$filterData}}
                            </li>
                        @endforeach
                    </ul>
                    {{--        @else--}}
                    {{--            <li style="float: left; width: 50%">--}}
                    {{--                {{$filter->title}}--}}
                    {{--            от: <input style="width: 50px" type="number" name="filter[{{$filter->id}}][min]"--}}
                    {{--                        @if (isset($filterRequest[$filter->id])&&$filterRequest[$filter->id]['min']) value="{{$filterRequest[$filter->id]['min']}}"--}}
                    {{--                        @else value="0" @endif>--}}
                    {{--            до: <input style="width: 50px" type="number" name="filter[{{$filter->id}}][max]"--}}
                    {{--                        @if (isset($filterRequest[$filter->id])&&$filterRequest[$filter->id]['max']) value="{{$filterRequest[$filter->id]['max']}}"--}}
                    {{--                        @else value="99000" @endif>--}}
                    {{--            </li>--}}
                @endif

                @endforeach
            </li>


    </ul>


</form>

