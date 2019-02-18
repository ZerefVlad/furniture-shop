$('#picture-add').click(function (e) {
    e.preventDefault();
    let counter = $('.img-input').length;
    console.log(counter);
    let div = $('.images').first();
    div.append(
        '<div class="col-md-12">' +
        '<input form="product-update-form"  type="text" name="img_alt['+counter+']">' +
        '<input form="product-update-form"  type="text" name="img_title['+counter+']">' +
        '<input form="product-update-form"  type="file" name="pictures['+counter+']" id="img-'+counter+'" class="img-input">' +
        '<img src="#" id="loader-'+counter+'" class="load-image" alt="">' +
        '</div>'
    );
});

$(document).on('change', '.img-input', function (e) {
    let id = $(e.target).attr('id').split('-')[1];
    if (e.target.files && e.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $('#loader-'+id)
                .attr('src', e.target.result)
                .width(300)
                .height(300);
        };

        reader.readAsDataURL(e.target.files[0]);
    }
});