(function($) {
	$(document).ready( function(){

		// Open external links in a new window
		$(function() { $('a[rel~=external]').attr('target', '_blank'); });
	
		fbar = $('#floatingbar');	
		fbar2 = $('#floatingbar2');	
		barTop = fbar.offset().top;
		barTop2 = fbar2.offset().top;
	
		$(window).scroll(
			function(){ 
				winHeight = $(window).height();
				wscrollTop = $(window).scrollTop();	
				
				if( wscrollTop + 50 > barTop ){
					fbar.css({
						position: 'fixed',
						top: 50
					});
				} else {
					fbar.css({
						position: 'relative',
						top: 0
					});
				}
				
				if( wscrollTop + 50 > barTop2 ){
					fbar2.css({
						position: 'fixed',
						top: 50
					});
				} else {
					fbar2.css({
						position: 'relative',
						top: 0
					});
				}
				
			}
		);
	
	});
})(jQuery);
