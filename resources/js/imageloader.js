$('#img-input').change(function (e) {
    if (e.target.files && e.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $('#load-image')
                .attr('src', e.target.result)
                .width(300)
                .height(300);
        };

        reader.readAsDataURL(e.target.files[0]);
    }
});

$('#delete-picture').click(function (e) {
    e.preventDefault();
    let id = e.target.getAttribute('data-id');

    $.get({
        url: '/picture-delete',
        data: {
            category_id: id,
        },
        success: function (data) {
            window.location.reload();
        }
    })
});

$('#delete-picture-post').click(function (e) {
    e.preventDefault();
    let id = e.target.getAttribute('data-id');

    $.get({
        url: '/picture-delete-post',
        data: {
            post_id: id,
        },
        success: function (data) {
            window.location.reload();
        }
    })
});
