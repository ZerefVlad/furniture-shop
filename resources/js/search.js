$(document).ready(function () {
    $('#search-product').keyup(function (e) {
        let search = e.target.value;
        let searchDiv = $('.search-result');

        $.get({
            url: '/api/products/search/'+search,
            success: function (data) {
                console.log(data);
                searchDiv.html('');
                searchDiv.html(data);
            },
        }).
            fail(function () {
            searchDiv.html('');
        })
    })
});