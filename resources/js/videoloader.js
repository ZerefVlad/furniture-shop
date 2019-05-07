$('#video-add').click(function (e) {
    e.preventDefault();
    let counter = $('.video-input').length;
    console.log(counter);
    let div = $('.videos').first();
    div.append(
        '<div class="col-md-12">' +
        '<input data-id="'+counter+'" form="product-update-form"  type="text" name="videos[]" id="video-' + counter + '" class="video-input">' +
        '<div id="video-clear-' + counter + '"></div>>'+
        '</div>'
    );

    $('.video-input').change(function (c) {
        let clr = c.target.getAttribute('data-id');
        $('#video-clear-'+clr).html();
        $('#video-clear-'+clr).html(
            '<div class="col-md-12">' +
            '<iframe type = "text/html" width = "640" height = "385" src = "http://www.youtube.com/embed/'+c.target.value+'" frameborder = "0" >' + '< /iframe>'
            +'</div>'
        );
    });
});

$('.delete-video').click(function (e) {
    e.preventDefault();
    let id = e.target.getAttribute('data-id');
    $('#select-video-'+id).remove();
});