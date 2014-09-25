<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ais
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Sorry. You definitely found the wrong page.', 'ais' ); ?></h1>
				</header><!-- .page-header -->

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php include 'inc/ais-footer.php'; ?>
