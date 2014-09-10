<?php
function ais_initProjects() {

	register_taxonomy('project-type', 'ais_project', array(
		'labels' => array(
			'name' => 'Project Types',
			'singular_name' => 'Project Type',
			'all_items' => 'All Project Types',
			'edit_item' => 'Edit Project Type',
			'view_item' => 'View Project Type',
			'update_item' => 'Update Project Type',
			'add_new_item' => 'Add New Project Type',
			'new_item_name' => 'New Project Type',
			'parent_item' => 'Parent Project Type',
			'parent_item_colon' => 'Parent Project Type:',
			'search_items' => 'Search Project Types',
			'populate_items' => 'Popular Project Types',
			'separate_items_with_commas' => 'Separate Project Types with Commas',
			'add_or_remove_items' => 'Add or Remove Project Types',
			'choose_from_most_used' => 'Choose From Most Used Project Types',
			'not_found' => 'No Project Types Found'
		),
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'project-types',
			'hierarchical' => true
		),
		'show_admin_column' => true
	));

	register_post_type('ais_project', array(
		'labels' => array(
			'name' => 'Project',
			'singular_name' => 'Project',
			'add_new_item' => 'Add New Project',
			'edit_item' => 'Edit Project',
			'new_item' => 'New Project',
			'view_item' => 'View Project',
			'search_items' => 'Search Projects',
			'not_found' => 'No Projects Found',
			'not_found_in_trash' => 'No Projects found in trash.',
			'parent_item_colon' => 'Parent Project'
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-location-alt',
		'supports' => array(
			'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes'
		),
		'taxonomies' => array('project-type'),
		'rewrite' => array('slug' => 'showing-off')
	));

	register_taxonomy_for_object_type('project-type', 'ais_project');
}
add_action('init', 'ais_initProjects');


function ais_addProjectMetaBox() {
	add_meta_box('ais-project-meta', 'Project Details', 'ais_renderProjectMetForm', 'ais_project', 'normal', 'high');
}
add_action('add_meta_boxes', 'ais_addProjectMetaBox');


function ais_getProjectMeta($postID) {
	$meta = get_post_meta($postID, 'ais_project_meta', true);
	if (!is_array($meta)) {
		$meta = array(
			'client' => '',
			'location' => '',
			'location_link' => '',
			'overview' => '',
			'tagline' => ''
		);
	}
	return $meta;
}

function ais_renderProjectMetForm($post) {
	$meta = ais_getProjectMeta($post->ID);
	
	echo '
		<style>
			.project-meta-form label span {
				width: 110px;
				display:block;
				float:left;
			}
			.project-meta-form textarea {
				width:100%;
			}
		</style>
		<div class="project-meta-form">
	'; 	
	echo '
			<label class="project-client"><span>Client</span>
				<input type="text" name="ais_project_client" value="'.esc_attr($meta['client']).'"><br>
			</label>
			<label class="project-budget"><span>Location</span>
				<input type="text" name="ais_project_location" value="'.esc_attr($meta['location']).'"><br>
			</label>
			<label class="project-budget"><span>Location URL</span>
				<input type="text" name="ais_project_location_link" value="'.esc_attr($meta['location_link']).'"><br>
			</label>
			<label class="project-architect"><span>Overview</span>
				<textarea name="ais_project_overview">'.$meta['overview'].'</textarea><br>
			</label>
			<label class="project-contractor"><span>Tag Line</span>
				<textarea name="ais_project_tagline">'.$meta['tagline'].'</textarea>
			</label>
		</div>
	'; ?>
	<?php
}

function ais_save_project_meta($postID) {
	global $post;
	if($post && $post->post_type == 'ais_project') {
		if (isset($_POST)) {
			$meta = array(
				'client' => isset($_POST['ais_project_client']) ? strip_tags($_POST['ais_project_client']) : '',
				'location' => isset($_POST['ais_project_location']) ? strip_tags($_POST['ais_project_location']) : '',
				'location_link' => isset($_POST['ais_project_location_link']) ? strip_tags($_POST['ais_project_location_link']) : '',
				'overview' => isset($_POST['ais_project_overview']) ? $_POST['ais_project_overview'] : '',
				'tagline' => isset($_POST['ais_project_tagline']) ? strip_tags($_POST['ais_project_tagline']) : ''
			);
			update_post_meta($postID, 'ais_project_meta', $meta);
		}
	}
}
add_action( 'save_post', 'ais_save_project_meta' );

