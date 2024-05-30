<?php 
/**
 *  Plugin Name: Carroussel
 *  Description: Affiche un Carroussel contrôlé par des boutons
 *  Author: Olivier Poulin
 *  version: 1.0.0
 */

 function olivierp_enqueue(){

    $version_css = filemtime(plugin_dir_path(__FILE__) . "style.css");
    $version_js = filemtime(plugin_dir_path(__FILE__) . "js/carroussel.js");
 
    wp_enqueue_style(
        'em_plugin_carroussel_css',
        plugin_dir_url(__FILE__) . "style.css",
        array(),
        $version_css
    );
 
    wp_enqueue_script(
        'em_plugin_carroussel_js',
        plugin_dir_url(__FILE__) . "js/carroussel.js",
        array(),
        $version_js,
        true
    ); // true permet d'ajouter le script à la fin du document    
}
 
add_action('wp_enqueue_scripts', 'olivierp_enqueue');
// IMPORTANT!!!
/*
Dans Header.php
wp_header() juste avant la balise fermeture de </head>
 
Dans Footer.php
wp_footer() juste avant la balise fermeture </body>
sont des fonctions qui permettent d'ajouter des scripts et des styles dans le header et le footer de la page
*/
 
 
function genere_html()
{
    /////////////////////////////////////// HTML
    // Le conteneur d'une boîte
 
    $contenu = '<button class="bouton__ouvrir">Ouvrir</button>
       <div class="carroussel">
       <button class="carroussel__x">X</button>
       <figure class="carroussel__figure"></figure>
       <form class="carroussel__form"></form>
       </div>';
    return $contenu;
}
add_shortcode('carroussel', 'genere_html');