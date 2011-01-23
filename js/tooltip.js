jQuery(document).ready(function() {

	//Tooltips
	var tip;

	jQuery(".wp-post-image").hover(function(){

		//Caching the tooltip and removing it from container; then appending it to the body
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "" + this.t : "";
			
		jQuery("body").append("<p id='gametitle'>"+ c +"</p>");								 
		tip = jQuery("#gametitle");
		
		tip.fadeIn("fast");	

	}, function() {

		this.title = this.t;	
		jQuery("#gametitle").hide().remove();

	}).mousemove(function(e) {
		  tip = jQuery("#gametitle");
			
		  var mousex = e.pageX + 20; //Get X coodrinates
		  var mousey = e.pageY + 20; //Get Y coordinates
		  var tipWidth = tip.width(); //Find width of tooltip
		  var tipHeight = tip.height(); //Find height of tooltip

		 //Distance of element from the right edge of viewport
		  var tipVisX = jQuery(window).width() - (mousex + tipWidth);
		  var tipVisY = jQuery(window).height() - (mousey + tipHeight);

		if ( tipVisX < 20 ) { //If tooltip exceeds the X coordinate of viewport
			mousex = e.pageX - tipWidth - 20;
			tip.css({  top: mousey, left: mousex });
		} if ( tipVisY < 20 ) { //If tooltip exceeds the Y coordinate of viewport
			mousey = e.pageY - tipHeight - 20;
			tip.css({  top: mousey, left: mousex });
		} else {
			tip.css({  top: mousey, left: mousex });
		}
	});

});