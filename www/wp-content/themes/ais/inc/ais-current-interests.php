<?php
function ais_initCurrentInterests() {
	register_post_type('ais_current_interest', array(
		'labels' => array(
			'name' => 'Current Interests',
			'singular_name' => 'Current Interest',
			'add_new_item' => 'Add New Current Interest',
			'edit_item' => 'Edit Current Interest',
			'new_item' => 'New Current Interest',
			'view_item' => 'View Current Interest',
			'search_items' => 'Search Current Interests',
			'not_found' => 'No Current Interests Found',
			'not_found_in_trash' => 'No Current Interests found in trash.'
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-awards',
		'supports' => array(
			'title', 'revisions', 'editor'
		),
		'rewrite' => array(
			'slug' => 'current-interests',
			'hierarchical' => false
		)
	));
}
add_action('init', 'ais_initCurrentInterests');


function ais_addCurrentInterestsMetaBox() {
	add_meta_box(
		'ais-curent-interest-meta', 
		'Current Interest Details', 
		'ais_renderCurrentInterestsMetaForm', 
		'ais_current_interest', 
		'normal', 
		'high'
	);
}
add_action('add_meta_boxes', 'ais_addCurrentInterestsMetaBox');


function ais_getCurrentInterestMeta($postID) {
	$meta = get_post_meta($postID, 'ais_current_interest_meta', true);
	if (!is_array($meta)) {
		$meta = array(
			'link' => '',
			'source' => ''
		);
	}
	return $meta;
}

function ais_renderCurrentInterestsMetaForm($post) {
	$meta = ais_getCurrentInterestMeta($post->ID);
	ob_start(); print_r($meta); error_log(ob_get_clean());
	echo '
		<style>
			.current-interests-meta-form label span {
				width: 110px;
				display:block;
				float:left;
			}
			.current-interests-meta-form textarea {
				width:100%;
			}
			.current-interests-meta-form input {
				width: 50%;
			}
		</style>
		<div class="current-interests-meta-form">
			<label class="current-interests-link"><span>Link</span>
				<input type="text" name="ais_current_interest_link" value="'.esc_attr($meta['link']).'"><br>
			</label>
			<label class="current-interests-budget"><span>Source</span>
				<input type="text" name="ais_current_interest_source" value="'.esc_attr($meta['source']).'"><br>
			</label>
		</div>
	';
}

function ais_saveCurrentInterestsMeta($postID) {
	global $post;
	if($post && $post->post_type == 'ais_current_interest') {
		if (isset($_POST)) {
			$meta = array(
				'link' => isset($_POST['ais_current_interest_link']) ? strip_tags($_POST['ais_current_interest_link']) : '',
				'source' => isset($_POST['ais_current_interest_source']) ? strip_tags($_POST['ais_current_interest_source']) : ''
			);
			update_post_meta($postID, 'ais_current_interest_meta', $meta);
		}
	}
}
add_action( 'save_post', 'ais_saveCurrentInterestsMeta' );

function ais_getCurrentInterests($offset = 0, $limit = -1) {
	$posts = get_posts(array(
		'post_type' => 'ais_current_interest',
		'offset' => $offset,
		'posts_per_page' => $limit,
		'order_by' => 'post_date',
		'order' => 'DESC'
	));
	return $posts;
}