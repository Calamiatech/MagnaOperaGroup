;


$(document).ready(function(){

	/*
	Making swipes work on, well, pretty much everything.
	*/
	var swipe_obj = { 
		swipeLeft: function(event, direction, distance, duration, fingerCount) { api.nextSlide(); }, 
		swipeRight: function(event, direction, distance, duration, fingerCount) { api.prevSlide(); }
	};
	$.fn.swipe.defaults.excludedElements = "button, input, select, textarea, .noSwipe";

	$("*").swipe(swipe_obj);
	//$("#supersized a img").swipe(swipe_obj);
	//$("#slidecaption").swipe(swipe_obj);


	/*
	Make the MobiMenu fly in / close
	*/
	var _showMenu = function(){
		/* Pause the slideshow when the menu is open, and start it back up when you close it. */
		api.playToggle();
		$(".about-contact-page").removeClass("hidden").addClass("show");
	},
	_closeMenu = function(){
		$(".about-contact-page").removeClass("show").addClass("hidden");
		api.playToggle();
	};
	var _openMenu = _showMenu; // Alias function name

	$(".mobile-logo").click(function(){ _showMenu(); });
	$(".mobile.close").add(".mobilenav .closebuttonhitarea")
		.click(_closeMenu)
		.swipe({ tap: _closeMenu })
		;

	/*
	Make the logo into a button for "Easy Access" to the Work Menu on the single-portfolio pages
	We're unbinding the existing click action and then grabbing the anchor tag and giving it a new href attribute.
	*/
	$(".single-portfolio .mobile-logo.logo").unbind("click").find("a").attr("href","#work");


	/*
	Makes the main link in the mobile nav change names and href on click.
	
	$("#MobiMenuLink").attr("href","#work");
	$("#MobiMenuLink").click(function(e){
		e.preventDefault();		
		var href = $(this).attr("href"),
			work = "#work",
			about= "#about";
		var	$work = $(work),
			$about = $(about);

		console.log(href)
		$(this).attr("href","");

		switch (href) {
			case work:
					window.location.hash = work;
					$(this).attr("href",about).children("h2").html("About Us");
				break;
			case about:
					window.location.hash = about;
					$(this).attr("href",work).children("h2").html("See Our Work");
				break;
		}
		return true;
	});*/

	/*
	Change the link in the mobile menu so that it sends an email rather than shows a contact page.
	*/
	$("#AboutOurWork a[href='/contact']").attr("href","mailto:info@magnaoperagroup.com")

	/*
	Reset the transition speed of the supersized gallery, per request
	*/
	api.options.transition_speed = 500;

});

