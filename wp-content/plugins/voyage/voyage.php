<?php
/**
 * Package Cours
 * Version 1.0.0
 */
/*
Plugin name: Voyage
Plugin uri: https://github.com/eddytuto
Version: 1.0.0
Description: Permet d'afficher les destinations qui répondent à certains critères
*/
function em_voyage_enqueue()
{
// filemtime // retourne en milliseconde le temps de la dernière modification
// plugin_dir_path // retourne le chemin du répertoire du plugin
// __FILE__ // le fichier en train de s'exécuter
// wp_enqueue_style() // Intègre le link:css dans la page
// wp_enqueue_script() // intègre le script dans la page
// wp_enqueue_scripts // le hook

$version_css = filemtime(plugin_dir_path( __FILE__ ) . "style.css");
$version_js = filemtime(plugin_dir_path(__FILE__) . "js/voyage.js");
wp_enqueue_style(   'em_plugin_voyage_css',
                     plugin_dir_url(__FILE__) . "style.css",
                     array(),
                     $version_css);

wp_enqueue_script(  'em_plugin_voyage_js',
                    plugin_dir_url(__FILE__) ."js/voyage.js",
                    array(),
                    $version_js,
                    true);
}
add_action('wp_enqueue_scripts', 'em_voyage_enqueue');
/* Création de la liste des destinations en HTML */
function creation_destinations(){
    $contenu = '<button id="cat_2" class="bouton__categorie">Aventure</button>
    <button id="cat_3" class="bouton__categorie">Culturel</button>
    <button id="cat_4" class="bouton__categorie">Repos</button>
    <button id="cat_5" class="bouton__categorie">Zen</button>
    <button id="cat_6" class="bouton__categorie">Sport</button>
    <button id="cat_7" class="bouton__categorie">Economique</button>
    <button id="cat_8" class="bouton__categorie">Croisière</button>
    <button id="cat_16" class="bouton__categorie">Populaire</button>
    <div class="contenu__restapi"></div>';
    return $contenu;
}

add_shortcode('em_destination', 'creation_destinations');