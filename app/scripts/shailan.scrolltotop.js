elemID = "scrolltotop";

// Animated Scrolling
jQuery(document).ready(function() {
	jQuery("#" + elemID).anchorAnimate();
});

/* Animated scrolling */
jQuery.fn.anchorAnimate = function(settings) {
    settings = jQuery.extend({
        speed : 400
    }, settings);   
    
    return this.each(function(){
        var caller = this
        jQuery(caller).click(function (event) { 
            event.preventDefault()
            var locationHref = window.location.href
            var elementClick = jQuery(caller).attr("href")
            
            var destination = jQuery(elementClick).offset().top;
            jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, settings.speed, function() {
                window.location.hash = elementClick
            });
            return false;
        })
    })
}

/** Prototype */
document.observe("dom:loaded", function() {
	// Return to Top elevator 
	setInterval(function(){
	if (document.viewport.getScrollOffsets().top >= 600 && $(elemID).getOpacity() == 0 ) {
		new Effect.Opacity(elemID, { to:0.8, duration:0.50 });
	} else if ( document.viewport.getScrollOffsets().top < 600 && $(elemID).getOpacity() >= 0.6 ) {
		new Effect.Opacity(elemID, { to:0, duration:0.50 });
	} }, 200);	
});

