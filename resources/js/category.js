$(document).ready(function () {
    let type = $('#type-selector').val();
    let id = $('#type-selector').attr('data-id');
    getCats(type, id);

    $('#type-selector').change(function () {
        let type = $('#type-selector').val();
        getCats(type, id)
    });
});

function getCats(type, id) {
    $.get({
        url: '/api/categories/' + type,
        data: {
            categoryId: id,
        },
        success: function (data) {
            $('#parents').html('<option value="0">Без родителя</option>');
            for (let i = 0; i < data.categories.length; i++) {
                if (data.selected && (data.categories[i].id === data.selected.id)) {
                    $('#parents').append(
                        '<option value="' + data.categories[i].id + '" selected >' + data.categories[i].title + '</option>'
                    )
                } else {
                    $('#parents').append(
                        '<option value="' + data.categories[i].id + '">' + data.categories[i].title + '</option>'
                    )
                }
            }

        }
    });
}