<?php get_header(); ?>

		<div class="container">
			<div class="introduction">
				<h3 class="subtitle">Contact</h3>
					<div class="svgcontainer">
						<svg preserveAspectRatio="xMidYMin" width="300px" height="300px" viewBox="0 0 300 300" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"><g id="2.-portfolio" sketch:type="MSArtboardGroup" transform="translate(-362.000000, -160.000000)" stroke="#306273" opacity="0.15"><rect id="Rectangle-27" sketch:type="MSShapeGroup" transform="translate(511.000000, 308.901587) rotate(-315.000000) translate(-511.000000, -308.901587) " x="405.994643" y="203.89623" width="210.010714" height="210.010714"></rect></g></g></svg>
					</div>
				<h2 class="callout">Whether you’d like to work together on a project or just get together to have a coffee, feel free to drop me a line.</h2>
			</div>

			<div class="clearfix"></div>
			<div class="divider"></div>

			<div class="contact">
				<div class="contactinformation">
					<h3>Get in Touch</h3>
					<ul>
						<li><a href="mailto:hi@andy.is?Subject=Hi%20Andy" target="_top">hi@andy.is</a></li>
						<li>303.720.6809</li>
						<li>1910 Pearl St.<br />Boulder, CO 80302</li>
					</ul>
				</div>
				<div class="contactinformation">
					<h3>Around the Web</h3>
					<ul>
						<li><a href="http://twitter.com/andystone" target="_blank">Twitter</a></li>
						<li><a href="http://dribbble.com/andystone" target="_blank">Dribbble</a></li>
						<li><a href="http://rdio.com/people/andystone" target="_blank">Rdio</a></li>
						<li><a href="http://medium.com/@andystone" target="_blank">Medium</a></li>
						<li><a href="http://andystone.vsco.co/" target="_blank">Vsco</a></li>
					</ul>
				</div>
			</div>

			<div class="clearfix"></div>

		</div>

		 <div id="map_canvas"></div>

		<?php include 'inc/ais-footer.php'; ?>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
	<script type="text/javascript">
		google.maps.event.addDomListener(window, 'load', init);
		function init() {
			var myLatlng = new google.maps.LatLng(40.019827, -105.270573);
			var mapOptions = {
				zoom: 14,
				scrollwheel: false,
				navigationControl: false,
				mapTypeControl: false,
				scaleControl: false,
				draggable: false,
				center: myLatlng,
				styles: [	{		featureType:'water',		stylers:[{color:'#00B5FB'},{visibility:'on'}]	},{		featureType:'landscape',		stylers:[{color:'#f2f2f2'}] },{		featureType:'road',		stylers:[{saturation:-100},{lightness:45}]	},{		featureType:'road.highway',		stylers:[{visibility:'simplified'}] },{		featureType:'road.arterial',		elementType:'labels.icon',		stylers:[{visibility:'off'}]	},{		featureType:'administrative',		elementType:'labels.text.fill',		stylers:[{color:'#444444'}] },{		featureType:'transit',		stylers:[{visibility:'off'}]	},{		featureType:'poi',		stylers:[{visibility:'off'}]	}]
			};
			var mapElement = document.getElementById('map_canvas');
			var map = new google.maps.Map(mapElement, mapOptions);
			var marker = new google.maps.Marker({ position: myLatlng, map: map, title: 'Hello World!'});
			var infowindow = new google.maps.InfoWindow({
			  content: '<h3><a href="https://www.google.com/maps/place/1910+Pearl+St,+Boulder,+CO+80302/@40.0198274,-105.270573,17z/data=!3m1!4b1!4m2!3m1!1s0x876bec2a4a863931:0x13292dcc4848351f" target="_blank">The Studio of Andy Stone</a><br />1910 Pearl St.<br />Boulder, CO 80302',
			  maxWidth: 200
			});
			google.maps.event.addListener(marker, 'click', function() {infowindow.open(map,marker);});
		}
	</script>
<?php get_footer(); ?>