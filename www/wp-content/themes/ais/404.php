<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ais
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found container">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'You definitely found the wrong page', 'ais' ); ?></h1>
					<div class="writing">
						<p>Sorry, you seem to have stumbled upon the 404 page. If you clicked on a link that brought you here, please <a href="/keeping-in-touch">contact me</a> and I'll look in to it right away. Thanks and enjoy the rest of your day.</p>
					</div>


				</header><!-- .page-header -->

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php include 'inc/ais-footer.php'; ?>
