(function() {
	var nav = document.querySelector("#primary-nav");
	var icon = document.querySelector(".home-icon");
	var titleOverlay = document.querySelector(".title__fade-to-black");
	var about = document.querySelector(".home-about-site");

	window.addEventListener('scroll', function() {
		if (window.scrollY > window.innerHeight) {
			nav.classList.add("show-nav");
		//	icon.classList.add("z-one");
		}
		if (window.scrollY < window.innerHeight) {	
			nav.classList.remove("show-nav");
		//	icon.classList.remove("z-one");
		}
	});

	/* set attribute for title + arrow color, turn to black as scroll up.
	 * May need to layer the white arrow over a black one, then make that
	 * one fade in opacity to reveal black under layer. (Can't directly
	 * edit svg color attribute w/o getting more complicated.)
	 */

	/* NB: event listener at closure scope b/c otherwise wouldn't
	 *	   'unfade' if user scrolls back up, since reads code once.
	 */

	titleOverlay.style.opacity = 0;

/*	 window.addEventListener('scroll', function() {
	 	var aboutScroll = about.getBoundingClientRect().top;
	 	var opacity = 1 - (aboutScroll - window.scrollY) / aboutScroll;
	 	if ((aboutScroll >= 0) && (aboutScroll <= window.innerHeight)) {
	 		console.log(aboutScroll);
	 		titleOverlay.style.opacity = ((opacity + .05) / 2).toFixed(1);
	 	}
	 	else if ((titleOverlay.style.opacity > 0) && (aboutScroll >= window.innerHeight)) {
	 		console.log(innerHeight);
	 		titleOverlay.style.opacity = 0;
	 	}
	 }); /*

})();