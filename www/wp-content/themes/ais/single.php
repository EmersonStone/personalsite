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
					$tagList = ais_getTagList();
					if (strlen($tagList)) {
						echo '<span>|</span>';
						echo $tagList;
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

			<p class="callout">If you liked this article, please let me know. You can find me on <a href="http://twitter.com/andystone" target="_blank">twitter.</a></p>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="simplenavigation">
				<?php
				$articles = get_posts(array(
					'posts_per_page' => -1
				));

				$prevArticle = null;
				$nextArticle = null;
				for ($i = 0; $i < count($articles); $i++) {
					if ($articles[$i]->ID == $post->ID) {
						if ($i > 0) {
							$prevArticle = $articles[$i - 1];
						}
						if ($i < count($articles) - 1) {
							$nextArticle = $articles[$i + 1];
						}
					}
				}

				?>
				<?php if ($prevArticle) : ?>
				<div class="previous"><a href="<?php echo get_permalink($prevArticle->ID); ?>">Newer Article</a></div>
				<?php else : ?>
				<div class="previous">Newer Article</div>
				<?php endif; ?>
				<?php if ($nextArticle) : ?>
				<div class="next"><a href="<?php echo get_permalink($nextArticle->ID); ?>">Older Article</a></div>
				<?php else : ?>
				<div class="next">Older Article</div>
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
