<?php
    /**
     * Plugin Name: Carrousel
     * Description: Carrousel d'images personnalisées contrôlé par boutons
     * Author: Olivier Poulin
     */
    
    
    function carrousel_enqueue_scripts(){
        $version_css = filemtime(plugin_dir_path( __FILE__ ) . "style.css");
        $version_js = filemtime(plugin_dir_path(__FILE__) . "js/carrousel.js");
        
        wp_enqueue_style(   'em_plugin_carrousel_css',
        plugin_dir_url(__FILE__) . "style.css",
        array(),
        $version_css);
    
        wp_enqueue_script(  'em_plugin_carrousel_js',
        plugin_dir_url(__FILE__) ."js/carrousel.js",
        array(),
        $version_js,
        true); //true permet d'ajouter le script <a la fin d'un document
    }

    add_action('wp_enqueue_scripts', 'carrousel_enqueue_scripts');
    
    function genere_html(){
        /////////////////////////////////////// HTML
        // Le conteneur d'une boîte
        // <button class="bouton__ouvrir">Ouvrir</button>
        
           $contenu = '<div class="carrousel">
           <button class="carrousel__x">X</button>
            <button class="carrousel__precedent">&lt;</button>
            <figure class="carrousel__figure"></figure>
            <button class="carrousel__suivant">&gt;</button>
            <form class="carrousel__form"></form>
           </div>';
           return $contenu;
       }

       add_shortcode('carrousel', 'genere_html');


// wp_header() juste avant la balise fermeture