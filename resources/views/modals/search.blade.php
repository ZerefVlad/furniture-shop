@foreach($products as $product)
    {{$product->title}}
    <img width="30px" height="30px" src="{{$product->getMainProductUrl()}}" alt="">
@endforeach