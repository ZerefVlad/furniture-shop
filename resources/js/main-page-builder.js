$(document).ready(function () {
    $('#add-text-slide').click(function () {
        $('.text-slides').append('<p>Титулка</p>'+'<input form="block1-form" name="title[]" required type="text">'
            + '<p>Описание</p>'+'<textarea required form="block1-form" name="description[]"></textarea>'
            + '<p>Url</p>'+'<input form="block1-form" name="url[]" type="text">'
            + '<input form="block1-form" name="image[]" type="file" required>');
    });

    $('#add-video-slide').click(function () {
        $('.video-slides').append('<input name="video[]" type="text" form="block1-form">')
    });


});