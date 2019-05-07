$(window).on('load', function () {
    $('select[name="role_id"]').on('change', function () {
        let parentFormId = $(this).attr('form');
        $('#'+parentFormId).submit();
    });


    $('#change-status-order').click(function (e) {
        e.preventDefault();
        var value = $("#change-status-order-select option:selected").val();
        let id = e.target.getAttribute('data-id');

        $.get({
            url: '/api/order/change-status/'+id,
            data: {
                status: value,
            },
            success: function (data) {
                window.location.reload();
            }
        })
    });

});

