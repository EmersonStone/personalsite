<?php
/**
 * The template for displaying all single posts.
 *
 * @package ais
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="container">

		<div class="leadin">
			<div class="leadphoto">
				<?php 
				if (has_post_thumbnail($post->ID)) {
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
				?>
					<a href="<?php echo get_permalink();?>"><img src="<?php echo $image[0]; ?>"></a>
				<?php 
				} 
				?>
			</div>
			<div class="clearfix"></div>
			<?php the_title( '<h2 class="callout big">', '</h2>' ); ?>
		</div>
		
		<div class="writing">
			<div class="articlecontent">
				<span class="metadata">
					<?php ais_posted_on(); ?>
					<?php
					$tags_list = get_the_tag_list('', __(', ', 'ais'));
					if ($tags_list) {
						echo '<span>|</span>';
						printf(__('%1$s', 'ais'), $tags_list);
					}
					?>
				</span>
<?php
				the_content(sprintf(
					__('Continue reading %s <span class="meta-nav getmore">&rarr;</span>', 'ais'),
					the_title('<span class="screen-reader-text">"', '"</span>', false)
				));
?>
			</div>
		</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'ais' ),
					'after'	 => '</div>',
				) );
			?>

			<p class="callout">If you liked this article, please let me know. You can find me on <a href="http://twitter.com/andystone" target="_blank">twitter.</p>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="simplenavigation">
				<?php
				$projects = $projects = get_posts(array(
					'posts_per_page' => -1
				));
				
				$prevProject = null;
				$nextProject = null;
				for ($i = 0; $i < count($projects); $i++) {
					if ($projects[$i]->ID == $post->ID) {
						if ($i > 0) {
							$prevProject = $projects[$i - 1];
						}
						if ($i < count($projects) - 1) {
							$nextProject = $projects[$i + 1];
						}
					}
				}
					
				?>
				<?php if ($prevProject) : ?>
				<div class="previous"><a href="<?php echo get_permalink($prevProject); ?>">Previous Project</a></div>
				<?php endif; ?>
				<?php if ($prevProject) : ?>
				<div class="next"><a href="<?php echo get_permalink($nextProject); ?>">Next Project</a></div>
				<?php endif; ?>
			</div>
<?php /* 
			<div class="simplenavigation">
				<div class="previous"><a href="#">Previous Article</a></div>
				<div class="next">Next Article</div>
			</div>
*/ ?>

		</div>
<?php endwhile; // end of the loop. ?>

<?php include 'inc/ais-footer.php'; ?>

<?php get_footer(); ?>
