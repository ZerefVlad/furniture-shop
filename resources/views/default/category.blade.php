<ul>
    @foreach($products as $product)
        <li>
            <a href="{{route('show_single_product',
            [
            'product' => $product,
            'category' => $product->categories->first()
            ])}}">{{$product->title}}</a>
        </li>
    @endforeach
</ul>