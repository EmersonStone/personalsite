<?php

add_filter('show_admin_bar', '__return_false');

function ais_enqueueScriptsAndStyles() {
	wp_enqueue_style('typography', '//cloud.typography.com/7014452/749142/css/fonts.css');
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-1.10.2.min.js');
	wp_enqueue_script('ais', get_template_directory_uri().'/js/ais.js', array('jquery'));
	wp_enqueue_style('ais', get_template_directory_uri().'/css/design.css');
	wp_enqueue_style('ais', get_template_directory_uri().'/js/ais-admin-image-handling.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'ais_enqueueScriptsAndStyles');

function ais_enqueueAdminScriptsAndStyles() {
	$adminScreen = get_current_screen();
	if ($adminScreen->post_type == 'ais_project') {
		wp_enqueue_media();
		wp_enqueue_script(
			'ais-admin-image-handling', 
			get_template_directory_uri().'/js/ais-admin-image-handling.js',
			array('jquery')
		);
	}
}
add_action('admin_enqueue_scripts', 'ais_enqueueAdminScriptsAndStyles');

function ais_addPostClasses($classes) {
	global $post;
	if ($post->post_type == 'post') {
		$classes[] = 'writing';
	}
	return $classes;
}
add_filter('post_class', 'ais_addPostClasses');

// Tags are not linked.
function ais_getTagList($forPost = NULL) {
	global $post;
	if (!$forPost) {
		$forPost = $post;
	}
	$result = '';
	$tags = array_values(get_the_tags($forPost->ID));
	if (count($tags)) {
		for ($i = 0, $nTags = count($tags); $i < $nTags; $i++) {
			$result .= $tags[$i]->name.($i < $nTags - 1 ? ', ' : '');
		}
	}
	return $result;
}

require_once(__DIR__.'/ais-projects.php');
require_once(__DIR__.'/ais-current-interests.php');
