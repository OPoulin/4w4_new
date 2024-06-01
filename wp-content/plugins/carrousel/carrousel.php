<?php
    /**
     * Plugin Name: Carrousel
     * Description: Carrousel d'images personnalisées contrôlé par boutons
     * Author: Olivier Poulin
     */
    
    
     function rest_api_slideshow_enqueue_scripts() {
        wp_enqueue_style('rest-api-slideshow-style', plugin_dir_url(__FILE__) . 'css/style.css');
        wp_enqueue_script('rest-api-slideshow-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
        wp_localize_script('rest-api-slideshow-script', 'RestApiSlideshow', array(
            'rest_url' => rest_url('wp/v2'),
            'nonce' => wp_create_nonce('wp_rest')
        ));
    }
    add_action('wp_enqueue_scripts', 'rest_api_slideshow_enqueue_scripts');
    
    function rest_api_slideshow_overlay() {
        echo '<div id="slideshow-overlay" style="display:none;">
                <div id="slideshow-container">
                    <span id="close-btn">&times;</span>
                    <img id="slideshow-image" src="" alt="slideshow image">
                    <a id="prev-btn">&#10094;</a>
                    <a id="next-btn">&#10095;</a>
                </div>
              </div>';
    }
    add_action('wp_footer', 'rest_api_slideshow_overlay');
    ?>