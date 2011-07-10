(function($){
    $.fn.extend({ 
        floatingBar: function(options) {
 
            var defaults = {
                top: 60,
				space: 50
            };
             
            var options = $.extend(defaults, options);
			
            return this.each(function() { // Return 4 Chain
                  var o =options;
                  var obj = $(this);                
				  
				  $(this).addClass('floatingBar');
				  $(this).css({ position: 'relative' }); // Set to relative positioning
				  var _top = obj.offset().top;		// Get top value
				  var _height = obj.height();		// Get widget height
				  $(this).attr('_top', _top);		// Save top value
                               
            });
        }
    });
})(jQuery);