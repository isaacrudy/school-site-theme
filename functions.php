<?php

wp_register_style('animate-on-scroll-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

wp_enqueue_style('animate-on-scroll-style');

wp_register_script('animate-on-scroll-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', null, null, true);

wp_enqueue_script('animate-on-scroll-script');

wp_enqueue_script('animate-on-scroll-init', 
                get_theme_file_uri( '/assets/scripts/animate-on-scroll-init.js' ), 
                array(),
                wp_get_theme()->get( 'Version' ), 
                array( 'strategy' => 'defer' ) 
);

require get_theme_file_path() . '/custom-blocks/custom-blocks.php';