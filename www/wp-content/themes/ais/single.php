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

			<p class="callout">If you liked this article, please let me know. You can find me on <a href="http://twitter.com/andystone" target="_blank">twitter.</p>

			<div class="clearfix"></div>
			<div class="divider"></div>

<?php /* 
			<div class="simplenavigation">
				<div class="previous"><a href="#">Previous Article</a></div>
				<div class="next">Next Article</div>
			</div>
*/ ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'ais' ),
					'after'	 => '</div>',
				) );
			?>

		</div>
<?php endwhile; // end of the loop. ?>

		<footer>
			<div class="bottomborder"></div>
			<div class="container">
				<div class="footerlogo">
					<a href="#"><span class="rabbit">"</span></a>
				</div>
				<div class="footercontent">
					<div class="footernavigation">
						<ul>
							<li>Menu</li>
							<li><a href="index.html">Introduction</a></li>
							<li><a href="working.html">Work</a></li>
							<li><a href="writing.html">Journal</a></li>
							<li><a href="keeping-in-touch.html">Contact</a></li>
						</ul>
					</div>
					<div class="footernavigation">
						<ul>
							<li>Social</li>
							<li><a href="http://twitter.com/andystone" target="_blank">Twitter</a></li>
							<li><a href="http://dribbble.com/andystone" target="_blank">Dribbble</a></li>
							<li><a href="http://rdio.com/people/andystone" target="_blank">Rdio</a></li>
							<li><a href="http://medium.com/@andystone" target="_blank">Medium</a></li>
							<li><a href="http://andystone.vsco.co/" target="_blank">Vsco</a></li>
						</ul>
					</div>
					<div class="footerinformation">
						<p>The Studio of Andy Stone is proud to be a Colorado-based company.</p>
						<p>When not designing, you can find Andy Stone biking or skiing—depending on the season. </p>
						<p>1910 Pearl St. Boulder, CO 80302</p>
					</div>
				</div>

			</div>

		</footer>
<?php get_footer(); ?>
