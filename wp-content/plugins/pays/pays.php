<?php
/*
Plugin Name: Pays
Description: Affiche les destinations de différents pays
Version: 1.0
Author: Olivier Poulin
*/

// Enqueue the CSS for styling buttons
function dbp_enqueue_styles() {
    wp_enqueue_style('dbp-styles', plugin_dir_url(__FILE__) . 'styles.css');
}
add_action('wp_enqueue_scripts', 'dbp_enqueue_styles');

// Function to generate buttons with unique IDs
function dbp_generate_buttons() {
    $countries = array(
        "France", "États-Unis", "Canada", "Argentine", "Chili",
        "Belgique", "Maroc", "Mexique", "Japon", "Italie",
        "Islande", "Chine", "Grèce", "Suisse"
    );

    $output = '<div class="dbp-buttons">';
    foreach ($countries as $index => $country) {
        $output .= '<button class="dbp-button" id="button-' . $index . '">' . $country . '</button>';
    }
    $output .= '</div>';

    return $output;
}

// Shortcode to display the buttons
function dbp_display_buttons() {
    return dbp_generate_buttons();
}
add_shortcode('dbp_buttons', 'dbp_display_buttons');
?>