(function($) {
	$(document).ready( function(){
	
		topPadding = 50;
	
		$('.floatingBar').each(
			function() {  
				  $(this).css({ position: 'relative' }); // Set to relative positioning
				  var _top = $(this).offset().top;		// Get top value
				  var _height = $(this).height();		// Get widget height
				  $(this).attr('_top', _top);		// Save top value
            }
		);
	
		$(window).scroll(
			function(){ 
				winHeight = $(window).height();
				wscrollTop = $(window).scrollTop();	
				
				$('.floatingBar').each(
					function() {  
						barTop = $(this).attr('_top');
					
						if( wscrollTop + topPadding > barTop ){
							$(this).css({
								position: 'fixed',
								top: topPadding
							});
						} else {
							$(this).css({
								position: 'relative',
								top: 0
							});
						} 
					}
				);				
			}
		);
	
	});
})(jQuery);
