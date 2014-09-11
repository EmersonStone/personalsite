<?php
/**
 * @package ais
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="articlesamplephoto">
		<?php 
		if (has_post_thumbnail($post->ID)) {
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
		?>
			<a href="<?php echo get_permalink();?>"><img src="<?php echo $image[0]; ?>"></a>
		<?php 
		}
		else {
			$media = get_attached_media('image', $post->ID);
			if (count($media)) {
				$image = $media[array_keys($media)[0]];
				$image = wp_get_attachment_image_src($image->ID, 'single-post-thumbnail');
				echo '<a href="'.get_permalink().'"><img src="'.$image[0].'"></a>';
			}
		}
		?>
	</div>
	<div class="articlecontent">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
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
			ob_start();
			the_content(sprintf(
				__('Continue reading %s <span class="meta-nav getmore">&rarr;</span>', 'ais'),
				the_title('<span class="screen-reader-text">"', '"</span>', false)
			));
			$content = ob_get_clean();
			echo substr(strip_tags($content), 0, 300).' &hellip;';
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ais' ),
				'after'	 => '</div>',
			) );
		?>
		<?php edit_post_link( __( 'Edit', 'ais' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<div class="getmore"><a href="<?php echo get_permalink(); ?>">Continue Reading</a></div>
</div>

<?php /* 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ais_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ais' ), 
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ais' ),
				'after'	 => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				$categories_list = get_the_category_list( __( ', ', 'ais' ) );
				if ( $categories_list && ais_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'ais' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				$tags_list = get_the_tag_list( '', __( ', ', 'ais' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'ais' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'ais' ), __( '1 Comment', 'ais' ), __( '% Comments', 'ais' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'ais' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
*/?>