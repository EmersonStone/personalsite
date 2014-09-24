<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ais
 */

get_header(); ?>

		<div class="container">
			<div class="introduction">
				<h3 class="subtitle">The Journal</h3>
					<div class="svgcontainer">
						<svg preserveAspectRatio="xMidYMin" width="300px" height="300px" viewBox="0 0 300 300" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"><g id="2.-portfolio" sketch:type="MSArtboardGroup" transform="translate(-362.000000, -160.000000)" stroke="#306273" opacity="0.15"><rect id="Rectangle-27" sketch:type="MSShapeGroup" transform="translate(511.000000, 308.901587) rotate(-315.000000) translate(-511.000000, -308.901587) " x="405.994643" y="203.89623" width="210.010714" height="210.010714"></rect></g></g></svg>
					</div>
				<h2 class="callout">A collection of articles focused on design. Along with research pieces, I also share personal and client work.</h2>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

				<div class="clearfix"></div>
				<div class="divider"></div>

			<?php endwhile; ?>

			<?php ais_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

			<div class="clearfix"></div>
			<div class="divider"></div>


		<?php endif; ?>

		</div>


<?php include 'inc/ais-footer.php'; ?>

<?php get_footer(); ?>
