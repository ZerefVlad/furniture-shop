<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{route('show_product', ['category' => $category])}}">
            {{$category->title}}
            <img src="{{$category->getImage() ? $category->getImage()->url : '#'}}" alt="">
            </a>

        </li>
    @endforeach
</ul>