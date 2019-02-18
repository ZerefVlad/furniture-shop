$('.update-img').click(function (e) {
    e.preventDefault();
    let formId = e.target.getAttribute('form');
    let form = $('#' + formId);
    $.post({
        url: '/api/update-product-picture',
        data: form.serialize(),
        success: function (data) {
            window.location.reload();
        }
    })
});

$('.delete-img').click(function (e) {
    e.preventDefault();
    let formId = e.target.getAttribute('form');
    let form = $('#' + formId);
    $.post({
        url: '/api/delete-product-picture',
        data: form.serialize(),
        success: function (data) {
            window.location.reload();
        }
    })
});

$('.update-attribute').click(function (e) {
    e.preventDefault();
    let formId = e.target.getAttribute('form');
    let form = $('#' + formId);
    $.post({
        url: '/api/update-product-attribute',
        data: form.serialize(),
        success: function (data) {
            window.location.reload();
        }
    })
});

$('.delete-attribute').click(function (e) {
    e.preventDefault();
    let formId = e.target.getAttribute('form');
    let form = $('#' + formId);
    $.post({
        url: '/api/delete-product-attribute',
        data: form.serialize(),
        success: function (data) {
            window.location.reload();
        }
    })
});

$('.update-product-related').click(function (e) {
    e.preventDefault();
    let formId = e.target.getAttribute('form');
    let form = $('#' + formId);
    $.post({
        url: '/api/update-product-related',
        data: form.serialize(),
        success: function (data) {
            window.location.reload();
        }
    })
});

$('.delete-product-related').click(function (e) {
    e.preventDefault();
    let formId = e.target.getAttribute('form');
    let form = $('#' + formId);
    $.post({
        url: '/api/delete-product-related',
        data: form.serialize(),
        success: function (data) {
            window.location.reload();
        }
    })
});