jQuery(document).ready(function() {

	jQuery(".dropdown li").hover(function(){
	
		this.addClass('hover');
		//this.find('ul:first').fadeIn();

	}, function() {

		this.removeClass('hover');

	});

});