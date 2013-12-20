


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
	Pause the slideshow when the menu is open, and start it back up when you close it.
	*/
	$(".mobile-logo.logo").click(function(){ api.playToggle(); });
	$(".mobile.close").click(function(){ api.playToggle(); })

	/*
	Make the logo into a Quick Work Page button on the single-portfolio pages
	*/
	$(".single-portfolio .mobile-logo.logo").unbind("click").find("a").attr("href","#work");


	/*
	Make the MobiMenu fly in / close
	*/
	var toggleMobileMenu = function() { $(".about-contact-page").toggleClass("hidden").toggleClass("show"); };
	$(".mobile-logo").click(toggleMobileMenu);
	$(".mobilenav .closebuttonhitarea").click(toggleMobileMenu);


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

