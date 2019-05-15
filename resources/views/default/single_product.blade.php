@if($category->type === 'default')
    @include('default.default_single_product')
@else @include('default.custom_single_product')
@endif