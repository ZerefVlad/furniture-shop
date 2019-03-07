$('#related-prod-add').click(function (event) {
    event.preventDefault();
    let id = event.target.getAttribute('data-id');
    $.get({
        url: '/api/products',
        data: {
            product_id: id,
        },
        success: function (data) {
            let options = '';
            for (let i=0; i < data.length; i++) {
                options += '<option value="'+data[i].id+'">'+data[i].title+'</option>';
            }
            $('.related-products').append('<select form="product-update-form"  name="relatedProd[]">'+options+'</select>' +
                '<input form="product-update-form"  type="number" name="relatedProdDiscount[]">' +
                '<input form="product-update-form" type="number" name="relatedProdQuantity[]">')
        }
    });
});