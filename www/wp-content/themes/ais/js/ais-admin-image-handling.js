(function($) {
	
	var ais_mediaFrameImage;
	
	$(document).on('ready', function() {

		var ais_editImage = function() {
			var $input = $('.project-header-bg-image input');
			var $img = $('.project-header-bg-image img');
			
			if (!ais_mediaFrameImage) {
				ais_mediaFrameImage = wp.media.frames.ais_mediaFrameImage = wp.media({
					title: 'Select an Image',
					button: { text:  'Select' },
					library: { type: 'image' }
				});
			}
			
			ais_mediaFrameImage.on('close', function() {
				var selection = ais_mediaFrameImage.state().get('selection');
				if (selection.length) {
					var attachment = selection.first().toJSON();
					$img.attr('src', attachment.url);
					$input.val(attachment.url);
				}
				else {
					if ($item.find('img').attr('src').length == 0) {
						$item.remove();
					}
				}

				ais_mediaFrameImage.off('close');
			});
			
			ais_mediaFrameImage.open();

		};
	
		window.ais_editImage = ais_editImage;
	
		$('#ais-set-header-bg-image').on('click', function() {
			ais_editImage();
		});
		
	});

})(jQuery);
