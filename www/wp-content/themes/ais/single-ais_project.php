<?php get_header(); ?>

<?php if (have_posts()) : the_post(); $meta = ais_getProjectMeta($post->ID); ?>
	
			<div class="leadin leadin-casestudy">
				<div class="container">
					<h3 class="subtitle"><?php the_title(); ?></h3>
					<div class="clearfix"></div>
					<div class="divider"></div>
					<h2 class="callout"><?php echo $meta['tagline']; ?></h2>
				</div>
			</div>
					<div class="container">


			<div class="casestudyoverview">
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 1 </span>Overview</h3>
					<div class="svgcontainer">
						<svg preserveAspectRatio="xMidYMin" width="300px" height="300px" viewBox="0 0 300 300" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"><g id="2.-portfolio" sketch:type="MSArtboardGroup" transform="translate(-362.000000, -160.000000)" stroke="#306273" opacity="0.15"><rect id="Rectangle-27" sketch:type="MSShapeGroup" transform="translate(511.000000, 308.901587) rotate(-315.000000) translate(-511.000000, -308.901587) " x="405.994643" y="203.89623" width="210.010714" height="210.010714"></rect></g></g></svg>
					</div>
					<p><?php echo $meta['overview']; ?></p>
					<p class="metadata">
						Client: <strong><?php echo $meta['client']; ?></strong><br />
						Project: <strong><?php 
							$terms = get_the_terms($post->ID, 'project-type');
							if (is_array($terms) && count($terms)) {
								echo implode(', ', array_map(create_function('$t', 'return $t->name;'), $terms));
							}
						?></strong><br />
						Location: <strong>
							<a href="<?php echo $meta['location_link']; ?>" target="_blank"><?php echo $meta['location']; ?></a>
						</strong>
					</p>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<?php the_content(); ?>
			
<?php /* 
			<div class="casestudyprocess">
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 2 </span>The Process</h3>

				<div class="block">
					<div class="processdetail"><img src="img/fgpress.jpg"></div>
					<div class="processdetail"><h3>Identity Development</h3><p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p></div>
				</div>

				<div class="block">
					<div class="processfeatured"><img src="img/fgpress.jpg"></div>
					<div class="processfeatureddescription"><p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis. Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p><p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis. Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p></div>
				</div>

				<div class="block">
					<div class="processdetail"><h3>Identity Development</h3><p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p><p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis. Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p></div>
					<div class="processdetail"><img src="img/fgpress.jpg"></div>
				</div>

				<div class="block">
					<div class="processdetail"><img src="img/fgpress.jpg"></div>
					<div class="processdetail"><h3>Identity Development</h3><p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p></div>
				</div>

			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="casestudydeliverables">
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 3 </span>The Deliverables</h3>
				<div class="fullimage"><img src="img/fgpress.jpg"></div>
				<p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis. Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis. Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="casestudyimpact">
				<h3 class="subtitle"><span class="number">N<span class="raise">O</span> 4 </span>The Impact</h3>
				<p>Lorem ipsum dolor sit amet, vel aliquip splendide ex, in nibh persius eam. Usu at laoreet fuisset, te phaedrum inimicus per. Regione sententiae incorrupte mel ex. Mei te stet euripidis, eu vis feugiat deleniti delicatissimi, ut sonet graecis vis.</p>
			</div>
*/ ?>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<p class="callout">If you enjoyed this project and would like to work together, <a href="keeping-in-touch.html">get in touch</a>.</p>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="simplenavigation">
				<div class="previous"><a href="#">Previous Project</a></div>
				<div class="next"><a href="#">Next Project</a></div>
			</div>

		</div>

		<?php include 'inc/ais-footer.php'; ?>

<?php endif; ?>

<?php get_footer(); ?>