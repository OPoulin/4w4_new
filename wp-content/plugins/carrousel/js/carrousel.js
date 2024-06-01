jQuery(document).ready(function($) {
    var images = [];
    var currentIndex = 0;

    function fetchGalleryImages(postId) {
        $.ajax({
            url: RestApiSlideshow.rest_url + '/media?parent=' + postId,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', RestApiSlideshow.nonce);
            },
            success: function(data) {
                images = data.map(function(item) {
                    return item.source_url;
                });
                openSlideshow(images[0]);
            }
        });
    }

    $(document).on('click', '.gallery a', function(e) {
        e.preventDefault();
        var postId = $(this).closest('.galerie').data('post-id');
        fetchGalleryImages(postId);
    });

    function openSlideshow(imageUrl) {
        $('#slideshow-image').attr('src', imageUrl);
        $('#slideshow-overlay').fadeIn();
    }

    function closeSlideshow() {
        $('#slideshow-overlay').fadeOut();
    }

    function showImage(index) {
        if (index >= 0 && index < images.length) {
            currentIndex = index;
            $('#slideshow-image').attr('src', images[currentIndex]);
        }
    }

    $('#close-btn').click(function() {
        closeSlideshow();
    });

    $('#prev-btn').click(function() {
        showImage(currentIndex - 1);
    });

    $('#next-btn').click(function() {
        showImage(currentIndex + 1);
    });

    $(document).keydown(function(e) {
        if ($('#slideshow-overlay').is(':visible')) {
            if (e.keyCode === 27) { // ESC key
                closeSlideshow();
            } else if (e.keyCode === 37) { // Left arrow key
                showImage(currentIndex - 1);
            } else if (e.keyCode === 39) { // Right arrow key
                showImage(currentIndex + 1);
            }
        }
    });
});