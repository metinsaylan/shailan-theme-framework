// Dom Ready
jQuery(document).ready(function($) {
    // Dropdown menu support for IE
    $('.dropdown li, .menu li').hover( function(){ $(this).addClass('hover'); }, function(){ $(this).removeClass('hover'); });
	$(".dropdown li:has(ul), .menu li:has(ul)").addClass("parent");
	// Add child classes to lists
	$('ul li:first-child').addClass('first-child');	$('ul li:last-child').addClass('last-child');
	$('ul.menu li').find('ul:first').hide();
	
	var config = {
		over : function(){ $(this).find("ul:first").slideDown(200); },  
		out : function(){ $(this).find("ul:first").slideUp(200); },
		timeout : 100
	}
 
  $(".dropdown li, ul.menu li").hoverIntent( config );
	
});