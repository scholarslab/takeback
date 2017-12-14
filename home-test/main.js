(function() {
	var nav = document.querySelector("#primary-nav");
	var icon = document.querySelector(".home-icon");

	window.addEventListener('scroll', function() {
		if (window.scrollY > window.innerHeight) {
			nav.classList.add("show-nav");
		//	icon.classList.add("z-one");
		}
		if (window.scrollY < window.innerHeight) {	
			nav.classList.remove("show-nav");
		//	icon.classList.remove("z-one");
		}

		/* set attribute for title + arrow color, turn to black as scroll up.
		 * May need to layer the white arrow over a black one, then make that
		 * one fade in opacity to reveal black under layer. (Can't directly
		 * edit svg color attribute w/o getting more complicated.)
		 */
	});
})();