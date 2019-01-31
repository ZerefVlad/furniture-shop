<ul>
    @foreach($categories as $category)
        <li>
            {{$category->title}}
            <img src="{{$category->getImage() ? $category->getImage()->url : '#'}}" alt="">



        </li>
    @endforeach
</ul>