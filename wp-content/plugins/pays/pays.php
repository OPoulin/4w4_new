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
/* Création de la liste des pays en HTML */
function creation_pays(){
    $contenu = '
    <button id="btn_1" class="bouton__pays">France</button>
    <button id="btn_2" class="bouton__pays">États-Unis</button>
    <button id="btn_3" class="bouton__pays">Canada</button>
    <button id="btn_4" class="bouton__pays">Argentine</button>
    <button id="btn_5" class="bouton__pays">Chili</button>
    <button id="btn_6" class="bouton__pays">Belgique</button>
    <button id="btn_7" class="bouton__pays">Maroc</button>
    <button id="btn_8" class="bouton__pays">Mexique</button>
    <button id="btn_9" class="bouton__pays">Japon</button>
    <button id="btn_10" class="bouton__pays">Italie</button>
    <button id="btn_11" class="bouton__pays">Islande</button>
    <button id="btn_12" class="bouton__pays">Chine</button>
    <button id="btn_13" class="bouton__pays">Grèce</button>
    <button id="btn_14" class="bouton__pays">Suisse</button>
    <div class="contenu__restapi"></div>';
    return $contenu;
}

add_shortcode('op_pays', 'creation_pays');