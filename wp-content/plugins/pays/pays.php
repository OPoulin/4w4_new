<?php
/*
Plugin Name: Pays
Description: Affiche les destinations de différents pays
Version: 1.0
Author: Olivier Poulin
*/



wp_enqueue_script(  'em_plugin_voyage_js',
                    plugin_dir_url(__FILE__) ."js/voyage.js",
                    array(),
                    $version_js,
                    true);
?>