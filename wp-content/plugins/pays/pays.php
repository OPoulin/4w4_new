<?php
/*
Plugin Name: Pays
Description: Affiche les destinations de différents pays
Version: 1.0
Author: Olivier Poulin
*/

// Enqueue the CSS and JavaScript for styling and functionality
function dbp_enqueue_assets() {
    wp_enqueue_style('dbp-styles', plugin_dir_url(__FILE__) . 'styles.css');
    wp_enqueue_script('dbp-scripts', plugin_dir_url(__FILE__) . 'scripts.js', array('jquery'), null, true);
    wp_localize_script('dbp-scripts', 'dbp_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'dbp_enqueue_assets');

// Function to generate buttons linking to posts within specific categories
function dbp_generate_buttons() {
    $categories = array(
        "France", "États-Unis", "Canada", "Argentine", "Chili",
        "Belgique", "Maroc", "Mexique", "Japon", "Italie",
        "Islande", "Chine", "Grèce", "Suisse"
    );

    $output = '<div class="dbp-buttons">';
    foreach ($categories as $index => $category) {
        $category_obj = get_category_by_slug(sanitize_title($category));
        
        if ($category_obj) {
            $output .= '<button class="dbp-button" id="button-' . $index . '" data-category="' . $category_obj->slug . '">' . $category . '</button>';
            $output .= '<div id="posts-' . $index . '" class="dbp-posts-list" style="display: none;"></div>';
        } else {
            $output .= '<button class="dbp-button" id="button-' . $index . '" disabled>' . $category . ' (Category Not Found)</button>';
        }
    }
    $output .= '</div>';

    return $output;
}

// Shortcode to display the buttons
function dbp_display_buttons() {
    return dbp_generate_buttons();
}
add_shortcode('dbp_buttons', 'dbp_display_buttons');

// AJAX handler to fetch posts in the specified category
function dbp_fetch_posts() {
    $category_slug = sanitize_text_field($_POST['category']);

    $category = get_category_by_slug($category_slug);
    if ($category) {
        $args = array(
            'category' => $category->term_id,
            'posts_per_page' => 5
        );
        $posts = get_posts($args);
        $response = array();

        foreach ($posts as $post) {
            $response[] = array(
                'title' => $post->post_title,
                'link' => get_permalink($post->ID)
            );
        }

        wp_send_json_success($response);
    } else {
        wp_send_json_error('Category not found');
    }
}
add_action('wp_ajax_dbp_fetch_posts', 'dbp_fetch_posts');
add_action('wp_ajax_nopriv_dbp_fetch_posts', 'dbp_fetch_posts');
?>