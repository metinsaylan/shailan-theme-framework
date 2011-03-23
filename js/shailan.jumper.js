// Animated Scrolling
jQuery(document).ready(function() {
	jQuery(".jumper").anchorAnimate();
});

/* Animated scrolling */
jQuery.fn.anchorAnimate = function(settings) {
    settings = jQuery.extend({
        speed : 400
    }, settings);   
    
    return this.each(function(){
        var caller = this;
        jQuery(caller).click(function (event) { 
            event.preventDefault();
            var locationHref = window.location.href;
            var elementClick = jQuery(caller).attr("href");
            
            var destination = jQuery(elementClick).offset().top;
            jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination }, settings.speed, function() {
                window.location.hash = elementClick;
            });
            return false;
        })
    })
}

