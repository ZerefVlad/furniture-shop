$('#attribute-add').click(function (event) {
    event.preventDefault();
    $.get({
        url: '/api/attributes',
        data: {},
        success: function (data) {
            let options = '';
            for (let i=0; i < data.length; i++) {
                if (data[i].id != 1) {
                    options += '<option value="'+data[i].id+'">'+data[i].title+'</option>';
                }
            }
            $('.attributes').append('<select form="product-update-form"  name="attrs[]">'+options+'</select>' +
                '<input form="product-update-form"  type="text" name="attrs_values[]">')
        }
    });
});