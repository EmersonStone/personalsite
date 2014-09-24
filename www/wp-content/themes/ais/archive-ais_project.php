<?php
get_header(); ?>

		<div class="container">
			<div class="introduction">
				<h3 class="subtitle">The Work</h3>
					<div class="svgcontainer">
						<svg preserveAspectRatio="xMidYMin" width="300px" height="300px" viewBox="0 0 300 300" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"><g id="2.-portfolio" sketch:type="MSArtboardGroup" transform="translate(-362.000000, -160.000000)" stroke="#306273" opacity="0.15"><rect id="Rectangle-27" sketch:type="MSShapeGroup" transform="translate(511.000000, 308.901587) rotate(-315.000000) translate(-511.000000, -308.901587) " x="405.994643" y="203.89623" width="210.010714" height="210.010714"></rect></g></g></svg>
					</div>
				<h2 class="callout">A showcase of successful projects done for previous clients. Learn more about each process in the case studies.</h2>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>
			<div class="recentwork">
				<h3 class="subtitle">Case Studies</h3>
				<p>Read about the full process of working on a design project from initial proposals and sketches to the final deliverables.</p>
			</div>

		<?php if ( have_posts() ) : ?>

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
							<div class="getmore">
								<a href="'.get_permalink($project->ID).'">'.get_the_title($project->ID).'</a>
							</div>
						</div>
						
					';
				}
				?>
			</div>


			<?php ais_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


			<div class="clearfix"></div>
			<div class="divider"></div>


			<div class="previousclients">
				<h3 class="subtitle">Previous Clients</h3>
				<p>I’ve been lucky enough to work with some great clients over the years. Here are a few of the companies that have entrusted me with their brand and design.</p>
				<div class="clientlist">
					<ul>
						<li>Adobe</li>
						<li>Vail Resorts</li>
						<li>Horizon Organic</li>
						<li>AARP</li>
						<li>Crockpot</li>
						<li>Mr. Coffee</li>
						<li>Polaroid</li>
						<li>Bravo</li>
						<li>Re/Max</li>
						<li>Werther's Original</li>
					</ul>
					<ul>
						<li>Jack Johnson</li>
						<li>G. Love</li>
						<li>Matt Costa</li>
						<li>Brushfire Records</li>
						<li>Silverback Music</li>
						<li>The Wailers</li>
						<li>Pearl Izumi</li>
						<li>American Family Insurance</li>
						<li>Travel Channel</li>
						<li>Johnson & Wales University</li>
					</ul>
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="standardservices">
				<h3 class="subtitle">Standard Services</h3>
				<div class="services">
					<h4>Brand & Identity</h4>
					<p>Helping a company find their voice with a brand and pairing that with a successful identity package to be used across all representations of the company.</p>
					<h4>Style Guides & Art Direction</h4>
					<p>A medium-agnostic approach to the colors, typography, style and visual personality of a brand. The guides and direction are for any type of design project as the company grows.</p>
					<h4>Information Architecture</h4>
					<p>Designing the user flows for a website or application with a focus on usability and overall site structure.</p>
				</div>
				<div class="services">
					<h4>Digital Product Design</h4>
					<p>Working with the development and executive teams to plan and create digital products that meets business goals and delights users.</p>
					<h4>User-Interface Design</h4>
					<p>Creating all of the interaction design that goes in to marketing sites or digital applications on the web or mobile phone. Focus on usability, accessibility, and beautiful visual design.</p>
					<h4>User-Experience Design</h4>
					<p>A wider look into the design of a digital product by focusing on user personas, success metrics, user-testing workshops, and product structure.</p>
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="history">
				<h3 class="subtitle">A Bit of History</h3>
				<p>I feel that my background in design is very similar to many people in the industry—I started with a love for art from a young age; I can remember my mother coming home with our first Apple Computer; I spent as much time learning on the computer as I did playing video games; and eventually created logos and t-shirts for my friends’ bands and side projects.</p>
				<p>At UC Santa Barbara, I studied Art and Economics but most of my education came from work projects. In the summer after freshman year, I was introduced to the team at Oniracom and worked with them as the designer on projects for Jack Johnson, G Love, Matt Costa and a few others from Brushfire Records. It was absolutely incredible to be around such a talented group of individuals who all loved what they were working on and it was at this job where I learned where I wanted to direct my design career.</p>
				<p>Towards the end of college, I started an organic-clothing company in Santa Barbara and I was working for a couple of companies around Los Angeles and San Francisco. For a couple of years, I enjoyed working with larger companies like Adobe and AARP, but I always felt like such a small piece in the overall project that I was left wanting more.</p>
				<p>It was during a vacation to Colorado where I met with Room 214 and decided to move to Boulder, CO to join up as their design director. It was a fantastic opportunity where I was working with great clients like Travel Channel and Horizon Organic, and I was actually leading design efforts. The time spent with the agency was also important in learning more about client services, business opportunities and running a shop.</p>
				<p>After a few years with Room 214, I left to join the Mocavo team and go through Techstars in Boulder. As one of the 3 founding members, I was again in charge of the company’s design, but I was also able to learn quite a bit about growing a business and focusing on a single product for a few years. It was an invaluable experience to watch as the team grew from just a few people to a large team spread across three states with a product used by millions of people around the world.</p>
				<p>My most recent change occured in August 2013 when I left Mocavo to start my own design studio. I missed working on new design projects and also missed seeing a variety of clients after looking at a single digital product for a few years. Since then, I’ve taken my previous experiences of working with companies large and small to build out a company that can grow with me. The focus for The Studio of Andy Stone right now is to build lasting digital products that are as beautiful as they are useful.</p>
				<p>In my free time, I’m building an app for restaurant owners called Bistro with two of my closest friends and exploring the beautiful Colorado outdoors with my wife.</p>
				<div class="historyphoto">
					<img src="<?php echo get_template_directory_uri();?>/img/andy-and-emilie.png" alt="Andy Stone and Emilie Stone">
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<p class="callout">If you have enjoyed the projects you’ve seen and would like to work together, please <a href="/keeping-in-touch">get in touch</a>.</p>

			<div class="clearfix"></div>
			<div class="divider"></div>


		</div>


<?php include 'inc/ais-footer.php'; ?>

<?php get_footer(); ?>
