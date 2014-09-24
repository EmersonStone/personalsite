(function($) {
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
	});
})(jQuery)
