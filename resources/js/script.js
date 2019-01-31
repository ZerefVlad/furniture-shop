$(window).on('load', function () {
    $('select[name="role_id"]').on('change', function () {
        let parentFormId = $(this).attr('form');
        $('#'+parentFormId).submit();
    });
});