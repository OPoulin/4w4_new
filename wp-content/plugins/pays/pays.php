<?php
/*
Plugin Name: Pays
Description: Affiche les destinations de différents pays
Version: 1.0
Author: Olivier Poulin
*/

function op_pays_enqueue()
{
// filemtime // retourne en milliseconde le temps de la dernière modification
// plugin_dir_path // retourne le chemin du répertoire du plugin
// __FILE__ // le fichier en train de s'exécuter
// wp_enqueue_style() // Intègre le link:css dans la page
// wp_enqueue_script() // intègre le script dans la page
// wp_enqueue_scripts // le hook

$version_css = filemtime(plugin_dir_path( __FILE__ ) . "style.css");
$version_js = filemtime(plugin_dir_path(__FILE__) . "js/pays.js");
wp_enqueue_style(   'em_plugin_pays_css',
                     plugin_dir_url(__FILE__) . "style.css",
                     array(),
                     $version_css);

wp_enqueue_script(  'em_plugin_pays_js',
                    plugin_dir_url(__FILE__) ."js/pays.js",
                    array(),
                    $version_js,
                    true);
}
add_action('wp_enqueue_scripts', 'op_pays_enqueue');
/* Création de la liste des destinations en HTML */
function creation_destinations(){
    $contenu = '
    <button id="cat_1" class="bouton__categorie">France</button>
    <button id="cat_2" class="bouton__categorie">États-Unis</button>
    <button id="cat_3" class="bouton__categorie">Canada</button>
    <button id="cat_4" class="bouton__categorie">Argentine</button>
    <button id="cat_5" class="bouton__categorie">Chili</button>
    <button id="cat_6" class="bouton__categorie">Belgique</button>
    <button id="cat_7" class="bouton__categorie">Maroc</button>
    <button id="cat_8" class="bouton__categorie">Mexique</button>
    <button id="cat_9" class="bouton__categorie">Japon</button>
    <button id="cat_10" class="bouton__categorie">Italie</button>
    <button id="cat_11" class="bouton__categorie">Islande</button>
    <button id="cat_12" class="bouton__categorie">Chine</button>
    <button id="cat_13" class="bouton__categorie">Grèce</button>
    <button id="cat_14" class="bouton__categorie">Suisse</button>
    <div class="contenu__restapi"></div>';
    return $contenu;
}

add_shortcode('em_destination', 'creation_destinations');