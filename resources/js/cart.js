$(document).ready(function () {
    if (sessionStorage.getItem('counter') !== null
        && sessionStorage.getItem('counter') !== undefined) {
        let badge = $('#cart-product-count');
        badge.attr('data-count', parseInt(sessionStorage.getItem('counter')));
        badge.html(parseInt(sessionStorage.getItem('counter')));
    }


    $('#add_to_cart').click(function (e) {
        let badge = $('#cart-product-count');
        let counter = badge.attr('data-count');
        let quantity = $('#kolvo').val();
        let product_id = $('input[name="product_id"]').val();
        let color = $('input[name="color"]').val();
        let check = true;


        counter = parseInt(counter) + parseInt(quantity);
        badge.attr('data-count', parseInt(counter));
        badge.html(parseInt(counter));

        $.get({
            url: '/api/cart/add',
            data: {
                id: product_id,
                quantity: quantity,
                color: color,
            },
            success: function () {
                window.location.replace('/cart')
            }
        });
    });

    $('#delete-product-cart').click(function (event) {
        event.preventDefault();
        let id = event.target.getAttribute('data-id');
        console.log(event.target);
        $.get({
            url: '/api/cart/delete',
            data: {
                id: id
            },
            success: (data) => {
                $('#cart-item-' + id).remove();
            }
        });
        updateTotal();
    });

    $('.quantity-cart').change(function (event) {
        let id = event.target.getAttribute('data-id');
        let quantity = event.target.value;
        if (parseInt(quantity) > 0) {
            $.get({
                url: '/api/cart/update-quantity',
                data: {
                    id: id,
                    quantity: quantity
                },
                success: (data) => {
                    let cartItem = $('#cart-item-' + id);
                    let price = cartItem.children('.price');
                    price.html('Price: ' + data);
                }
            });
            updateTotal();
        }
    });

    $('.quantity-complex-cart').change(function (event) {
        let id = event.target.getAttribute('data-id');
        let quantity = event.target.value;
        if (parseInt(quantity) > 0) {
            $.get({
                url: '/api/cart/update-complex-quantity',
                data: {
                    id: id,
                    total_quantity: quantity
                },
                success: (data) => {
                    let cartItem = $('.complex-item-' + id);
                    let complex_price = cartItem.children('.complex_price');
                    complex_price.html('Complex Price: ' + data);
                }
            });
            updateTotal();
        }
    });

    $('.related-product-add').click((e) => {
        e.preventDefault();
        let id = e.target.getAttribute('data-id');
        let form = $('#related-product-cart-' + id);
        console.log(form);
        $.get({
            url: '/api/cart/add-complex',
            data: form.serialize(),

            success: function () {
                window.location.replace('/cart')
            }
        })


    });

    $('#delete-complex-cart').click(function (event) {
        event.preventDefault();
        let id = event.target.getAttribute('data-id');
        $.get({
            url: '/api/cart/delete-complex',
            data: {
                id: id
            },
            success: (data) => {
                $('.complex-item-' + id).remove();
            }
        });
        updateTotal();

    });

    function updateTotal() {
        $.get({
            url: '/api/cart/total',
            success: (data) => {
                $('#total-price').html(data);
                $('#total-price-input').val(data);
            }
        })
    }

    $.get({
        url: '/api/cart/get-cart',
        success: function (data) {
            $('.wrapper').append(data)
        }
    });

    $.get({
        url: '/api/cart/get-items-count',
        success: function (data) {
            $('#cart-product-count').html(data);
        }
    });

    // $('#callme').click(function (e) {
    //     e.preventDefault();
    //
    //
    //     let product_id = $('input[name="product_id"]').val();
    //
    //     $.get({
    //         url: '/api/cart/add',
    //         data: {
    //             id: product_id,
    //
    //         },
    //     });
    //
    //
    // });



    $('.colors').click(function (e) {
        let colorId = e.target.getAttribute('data-color');
        $('input[name="color"]').val(colorId);



    });

    $('.select_colors').click(function (e) {
         e.target.classList.remove('select_color');
        e.target.classList.add('select_color');
    });


});

