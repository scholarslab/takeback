/*
 * Take Back the Archive - Item Show Page
 *
 * Author: Katherine Donnally
 *
 * External Libraries: Hammer.js
 *
 */


(function() {
	var sliderEl = document.querySelector('.carousel-item-container');
	var slideCount = document.getElementsByClassName('carousel-item').length;
	var sliderManager = new Hammer.Manager(sliderEl);
	var sliderWrapper 	= document.querySelector(".carousel-wrapper--visible");
	console.log(sliderWrapper.offsetWidth);
	console.log(slideCount);

	sliderManager.add(new Hammer.Pan({threshold:0, pointers:0}));
	sliderManager.on('pan', function(e) {
		var percent = (100 / slideCount) * e.deltaX / sliderWrapper.offsetWidth;
		console.log(e.deltaX);
		sliderEl.style.transform = 'translateX(' + percent + '%)';
		console.log(sliderEl.style.transform);
	});
})();
