$('#delete-product-cart').click(function (event) {
    event.preventDefault();
    let id = event.target.getAttribute('data-id');
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