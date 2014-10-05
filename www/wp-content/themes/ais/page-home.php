<?php get_header('home'); ?>

	    <div class="container">
			<div class="introduction">
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 1 </span>An Introduction</h3>
				<h2 class="callout">Hello from Boulder, Colorado. My name is Andy Stone and I run a small design studio that focuses on branding and digital projects.</h2>
				<div class="aboutme">
					<div class="profilepic"><img src="<?php echo get_template_directory_uri();?>/img/andy-stone.jpg" alt="Andy Stone graphic design"></div>
					<p>Over the last nine years, I've worked in print and digital design for startups and national brands. After five years of working in the agency world, the last few years has revolved around more digital-product design and development. In my free time, I’m building an app for restaurant owners called <a href="http://bistro.is/" target="_blank">Bistro</a> and a reading app for the iPhone that is still in the works. If you’d like to chat about your next design project, please <a href="/keeping-in-touch">get in touch</a>.</p>
				</div>
			</div>

			<div class="divider"></div>

			<div class="recentwork">
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 2 </span>Featured Work</h3>
				<p>My favorite work work over the last couple of years has focused on branding and digital design for consumer-facing products. Click on any project to read about the process or see more in <a href="/showing-off">the portfolio</a>.</p>
			</div>

			<div class="recentworksamples">
			<?php
			$projects = get_posts(array(
				'post_type' => 'ais_project',
				'posts_per_page' => 3
			));

			foreach ($projects as $project) {
				$thumbURL = wp_get_attachment_url(get_post_thumbnail_id($project->ID));
				echo '
					<div class="recentworksample">
						<a href="'.get_permalink($project->ID).'">
							<img src="'.$thumbURL.'" alt="Recent work from Andy Stone in Boulder, CO">
						</a>
					</div>

				';
			}
			?>
			</div>

			<?php
			$posts = get_posts(array(
				'posts_per_page' => 1
			));

			if (count($posts)) {
				$post = $posts[0];
				setup_postdata($post);
			?>

			<div class="divider"></div>

			<div class="writing">
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 3 </span>Most Recent Article</h3>

				<div class="articlesamplephoto">
					<?php
					if (has_post_thumbnail($post->ID)) {
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
					?>
						<a href="<?php echo get_permalink();?>"><img src="<?php echo $image[0]; ?>"></a>
					<?php
					}
					?>
				</div>
				<div class="articlecontent">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<span class="metadata">
						<?php ais_posted_on(); ?>
						<?php
						$tagList = ais_getTagList();
						if (strlen($tagList)) {
							echo '<span> | </span>';
							echo $tagList;
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
						echo '<p>'.substr(strip_tags($content), 0, 300).'&hellip;</p>';
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
				<?php /*
				<div class="articlesamplephoto">

					<a href="singlearticle.html"><img src="<?php echo get_template_directory_uri();?>/img/designreading.png" alt="Recommended reading for designers"></a>
				</div>
				<div class="articlecontent">
					<h2><a href="singlearticle.html">Starting an Education in Design: Essential Reading</a></h2>
					<span class="metadata">Published: <strong class="date">Aug 12, 2013</strong><span>|</span>Branding, Design, Education</span>
					<p>My father has run the same antique book shop for nearly twenty years and has dedicated much of his life to his love for books. From a very young age, I learned to love books by seeing the care and affinity that my father had for them. While the design community has amazing resources and websites for learning how to start out on your own, I still believe in the need for great books in a design education. I’ve been practicing and learning design, in one form or another, for nearly eleven years now. It is shocking just…</p>
				</div>

				<div class="getmore"><a href="singlearticle.html">Continue Reading</a></div>
				*/?>
			</div>

			<?php
			}	// if (count($posts))
			?>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<?php
			$interests = ais_getCurrentInterests(0, 3);
			if (count($interests)) {
				echo '
					<div class="currentinterests">
						<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 4 </span>Current Interests</h3>
						<p>
							I love collecting interesting stories, works of art, and photographs from around the web and want to share my favorites on this site.
						</p>
						<ul>
				';
				foreach ($interests as $interest) {
					$post = $interest;
					setup_postdata($post);
					$meta = ais_getCurrentInterestMeta($interest->ID);
					// NOTE: semantically the li element be a direct descendant of the ul element.
					// TODO.
					echo '
						<a href="'.$meta['link'].'" target="_blank">
							<li>
								<h5>'.get_the_title().'</h5>
								<span class="metadata">'.$meta['source'].'</span>
								<p>'.get_the_content().'</p>
							</li>
						</a>
					';
				}
				echo '
						</ul>
						<div class="clearfix"></div>
						<div class="getmore current-interests"><a href="#">Load More</a></div>

					</div> <!-- /currentinterests -->
				';
			}
			?>
			<?php /*
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 4 </span>Current Interests</h3>
				<p>I love collecting interesting stories, works of art, and photographs from around the web and want to share my favorites on this site.</p>
				<ul>
					<a href="#">
						<li>
							<h5>Patrick Radden Keefe: Catching the World’s Most Notorious Drug Lord</h5>
							<span class="metadata">The New Yorker</span>
							<p>El Chapo escaped from a maximum-security prison and evaded many attempts at capture, often hiding out in the Sierra Madre.</p>
						</li>
					</a>
					<a href="#">
						<li>
							<h5>Vincent Mahé’s Neighbours</h5>
							<span class="metadata">The New Yorker</span>
							<p>French illustrator Vincent Mahé’s work is wonderful. You can see lots of it at his blog. I first discovered him through his project “Neighbours,” and he captures glimpses.</p>
						</li>
					</a>
					<a href="#">
						<li>
							<h5>SketchCasts - #5 - What's new in Sketch 3</h5>
							<span class="metadata">The New Yorker</span>
							<p>Learn about the latest and greatest pieces of hardware being featured in Sketch.</p>
						</li>
					</a>
				</ul>
				<div class="clearfix"></div>
				<div class="getmore"><a href="#">Load More</a></div>
			</div>
			*/ ?>
		</div>


		<?php include 'inc/ais-footer.php'; ?>

<?php get_footer('home'); ?>