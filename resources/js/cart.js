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
        let quantity = $('input[name="quantity"]').val();
        let product_id = $('input[name="product_id"]').val();
        let check = true;
        for(let i = 0; i < sessionStorage.getItem('product_id').length; i++) {
            console.log(sessionStorage.getItem('product_id')[i]);
        }

        counter = parseInt(counter) + parseInt(quantity);
        badge.attr('data-count', parseInt(counter));
        badge.html(parseInt(counter));
        sessionStorage.setItem('product_id', parseJSON([product_id]));
        sessionStorage.setItem('product_quantity', quantity);
        sessionStorage.setItem('counter', counter);
    });
});

