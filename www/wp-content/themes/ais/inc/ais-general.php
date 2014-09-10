<?php

add_filter('show_admin_bar', '__return_false');

function ais_enqueueScriptsAndStyles() {
	wp_enqueue_style('typography', '//cloud.typography.com/7014452/749142/css/fonts.css');
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-1.10.2.min.js');
	wp_enqueue_script('ais', get_template_directory_uri().'/js/ais.js', array('jquery'));
	wp_enqueue_style('ais', get_template_directory_uri().'/css/design.css');
}
add_action('wp_enqueue_scripts', 'ais_enqueueScriptsAndStyles');

function ais_addPostClasses($classes) {
	global $post;
	if ($post->post_type == 'post') {
		$classes[] = 'writing';
	}
	return $classes;
}
add_filter('post_class', 'ais_addPostClasses');

require_once(__DIR__.'/ais-projects.php');