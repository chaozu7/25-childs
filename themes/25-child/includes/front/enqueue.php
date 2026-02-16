<?php

function fz_enqueue(){
//register
   wp_register_style('fz_styles', get_theme_file_uri('assets/css/style.css'), [], null); 
   wp_register_script( 'fz_script', get_theme_file_uri('assets/js/scripts.js'), [], null, ['strategy' => 'defer', 'in_footer' => true]);
//enqueue
   wp_enqueue_style('fz_styles');
   wp_enqueue_script('fz_script');
}