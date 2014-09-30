(function($) {
	window.ais = {};
	
	$(document).on('ready', function() {
		$('.rabbit').hover(
			function() { $(this).text('!'); }, 
			function() { $(this).text('"'); }
		);
		$('#menu-toggle, #nav-close').click(function() {
			$('#container').toggleClass('pushed');
		});
		$('.container').click(function(){
			$('#container').removeClass('pushed');
		});
		

		$('.getmore.current-interests').on('click', function(event) {
			event.preventDefault();
			console.log(($('.currentinterests ul').children().length));
			$.get('/', { 'ais-get-current-interests': {
					offset: ($('.currentinterests ul').children().length),
					limit: 3
				} }, function(data, status) {
					if (data.success) {
						if (data.interests.length) {
							for (var i = 0; i < data.interests.length; i++) {
								var $newInterest = $($('.currentinterests ul').children().get(0)).clone();
								$newInterest.find('h5').html(data.interests[i].title);
								$newInterest.find('p').html(data.interests[i].content);
								$newInterest.find('.metadata').html(data.interests[i].source);
								
								// currently the ul's children are the anchors, which is wonky.
								// handle both that case and the correction hopefully forthcoming.
								if ($newInterest.get(0).tagName.toLowerCase() == 'a') {
									$newInterest.attr('href', data.interests[i].link);
								}
								else {
									$newInterest.find('a').attr('href', data.interests[i].link);
								}
								
								
								$('.currentinterests ul').append($newInterest);
							}
						}
						if (data.interests.length < 3) {
							$('.getmore.current-interests').fadeOut();
						}
					}
				},
				'json'
			);
		});
		
	});
})(jQuery)
