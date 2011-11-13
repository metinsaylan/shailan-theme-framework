jQuery(document).ready(function() {

	//Tooltips
	var tip;

	jQuery(".tooltip").hover(function(){

		//Caching the tooltip and removing it from container; then appending it to the body
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "" + this.t : "";
			
		jQuery("body").append("<div id='tooltip'>"+ c +"<span class='tooltip-arrow'></span></div>");								 
		tip = jQuery("#tooltip");
		
		tip.fadeTo("fast", "0.9");	

	}, function() {

		this.title = this.t;	
		jQuery("#tooltip").hide().remove();

	}).mousemove(function(e) {
		  tip = jQuery("#tooltip");
			
		  var tipWidth = tip.width(); //Find width of tooltip
		  var tipHeight = tip.height(); //Find height of tooltip
		  
		  var mousex = e.pageX - tipWidth/2 - 8; // + 20; //Get X coodrinates
		  var mousey = e.pageY - tipHeight - 20; // + 20; //Get Y coordinates

		 // Distance of element from the right edge of viewport
		  var tipVisX = jQuery(window).width() - ( mousex + tipWidth );
		  var tipVisY = 100; //jQuery(window).height() - (mousey + tipHeight);

		if ( tipVisX < 20 ) { //If tooltip exceeds the X coordinate of viewport
			mousex = jQuery(window).width() - tipWidth - 20; // - 20;
			tip.css({  top: mousey, left: mousex });
		} if ( tipVisY < 10 ) { //If tooltip exceeds the Y coordinate of viewport
			mousey = e.pageY - tipHeight - 10;
			tip.css({  top: mousey, left: mousex });
		} else {
			tip.css({  top: mousey, left: mousex });
		}
	});

});