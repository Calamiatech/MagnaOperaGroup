
var swipe_obj = { 
		swipeLeft: function(event, direction, distance, duration, fingerCount) { api.nextSlide(); }, 
		swipeRight: function(event, direction, distance, duration, fingerCount) { api.prevSlide(); }
	};

$(document).ready(function(){
	$.fn.swipe.defaults.excludedElements = "button, input, select, textarea, .noSwipe";
	$("*").swipe(swipe_obj);
	//$("#supersized a img").swipe(swipe_obj);
	//$("#slidecaption").swipe(swipe_obj);
	$(".mobile-logo.logo").click(function(){
		api.playToggle();
	});
	$(".mobile.close").click(function(){
		api.playToggle();
	})
	$(".single-portfolio .mobile-logo.logo").unbind("click").first("a").attr("href","/");

	console.log("This is local.");

	/*
	Make the MobiMenu fly in / close
	*/
	var toggleMobileMenu = function() { $(".about-contact-page").toggleClass("hidden").toggleClass("show"); };
	$(".mobile-logo").click(toggleMobileMenu);
	$(".mobile.close").click(toggleMobileMenu);


	/*
	Makes the main link in the mobile nav change names and href on click.
	*/
	$("#MobiMenuLink").mouseup(function(){ 
		switch ($(this).attr("href")) {
			case "#about":
				$(this).attr("href","#work").children("h2").html("View Our Work");
				break;
			case "#work":
				$(this).attr("href","#about").children("h2").html("About Us");
				break;
		}
	});

	/*
	Change the link in the mobile menu so that it sends an email rather than shows a contact page.
	*/
	$("#AboutOurWork a[href='/contact']").attr("href","mailto:info@magnaoperagroup.com")

	/*
	Reset the transition speed of the supersized gallery, per request
	*/
	api.options.transition_speed = 500;

});

