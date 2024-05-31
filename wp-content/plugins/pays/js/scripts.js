jQuery(document).ready(function($) {
    $('.dbp-button').on('click', function() {
        var category = $(this).data('category');
        var index = $(this).attr('id').split('-')[1];
        var postsContainer = $('#posts-' + index);

        if (postsContainer.is(':visible')) {
            postsContainer.slideUp();
            return;
        }

        $.ajax({
            url: dbp_ajax_obj.ajax_url,
            type: 'get',
            data: {
                category_name: category,
                post_type: 'post',
                per_page: 5
            },
            beforeSend: function() {
                postsContainer.html('<p>Loading...</p>').slideDown();
            },
            success: function(response) {
                if (response.length > 0) {
                    var html = '<ul>';
                    $.each(response, function(i, post) {
                        html += '<li><a href="' + post.link + '">' + post.title.rendered + '</a></li>';
                    });
                    html += '</ul>';
                    postsContainer.html(html);
                } else {
                    postsContainer.html('<p>No articles found in this category.</p>');
                }
            },
            error: function() {
                postsContainer.html('<p>An error occurred while fetching articles.</p>');
            }
        });
    });
});