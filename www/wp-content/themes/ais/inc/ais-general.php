<?php

add_filter('show_admin_bar', '__return_false');

function ais_enqueueScriptsAndStyles() {
	wp_enqueue_style('typography', '//cloud.typography.com/7014452/749142/css/fonts.css');
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-1.10.2.min.js');
	wp_enqueue_script('ais', get_template_directory_uri().'/js/ais.js', array('jquery'));
	wp_enqueue_style('ais', get_template_directory_uri().'/css/design.css');
}
add_action('wp_enqueue_scripts', 'ais_enqueueScriptsAndStyles');