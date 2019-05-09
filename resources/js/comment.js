$(document).ready(function () {
    $('.comment-update').click(function (e) {
        e.preventDefault();
        let commentId = e.target.getAttribute('data-id');
        let product = e.target.getAttribute('data-product-name');
        let category = e.target.getAttribute('data-category-name');
        let commentDiv = $('#comment-' + commentId);
        let url = '/category/'+category+'/'+product+'/'+commentId+'/update';

        let text = $('#text-'+commentId)[0].innerText;
        let rating = $('#rating-'+commentId)[0].innerText;
        commentDiv.html();
        commentDiv.html('<form id="update-comment-to-form" action="'+url+'" method="get"></form>\n' +
            '    <textarea style="width:500px; height: 200px " form="update-comment-to-form" name="text">'+text+'</textarea>' +
            '    <label for=""  >Рейтинг: </label>' +' ' +
            '   <input form="update-comment-to-form"  type="number" name="rating" min="0" max="5" value="5">' +
            '    <button style="width: 500px;" form="update-comment-to-form" class="comment-update btn btn-success">обновить комментарий</button>');
    });

    $('.comment-delete').click(function (e) {
        e.preventDefault();
        let commentId = e.target.getAttribute('data-id');
        $.post({
            url: '/api/'+commentId+'/delete',
            success: function () {
                window.location.reload();
            }
        })
    });


});
