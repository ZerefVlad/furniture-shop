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
            $('.related-products').append('<p><input list="rel-prod" form="product-update-form"  name="relatedProd[]"><datalist id="rel-prod" >'+options+'</datalist></p>' +
                '                                        <label class="form-check-label" for="" style="margin-right: 30px">Скидка на дополнительный товар</label>' +
                '<input form="product-update-form"  type="number" name="relatedProdDiscount[]">' +
                '                                        <label class="form-check-label" for="" style="margin-right: 30px">Количество дополнительного товарa</label>' +
                '<input form="product-update-form" type="number" name="relatedProdQuantity[]">')
        }
    });
});