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
            type: 'post',
            data: {
                action: 'dbp_fetch_posts',
                category: category
            },
            beforeSend: function() {
                postsContainer.html('<p>Loading...</p>').slideDown();
            },
            success: function(response) {
                if (response.success) {
                    var posts = response.data;
                    var html = '<ul>';
                    $.each(posts, function(i, post) {
                        html += '<li><a href="' + post.link + '">' + post.title + '</a></li>';
                    });
                    html += '</ul>';
                    postsContainer.html(html);
                } else {
                    postsContainer.html('<p>' + response.data + '</p>');
                }
            },
            error: function() {
                postsContainer.html('<p>An error occurred while fetching posts.</p>');
            }
        });
    });
});