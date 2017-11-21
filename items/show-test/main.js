/*
 * Take Back the Archive - Item Show Page
 *
 * Author: Katherine Donnally
 *
 * External Libraries: Hammer.js
 *
 */

 (function() {
 	var picWrapper = document.querySelector(".files__pic"),
 		clickNote = document.querySelector(".pic__click-note");
 		img = picWrapper.querySelector("img"),
 		a = picWrapper.querySelector("a");

 	picWrapper.style.height = (a.getBoundingClientRect().height + clickNote.getBoundingClientRect().height) + 'px';
 	//picWrapper.style.height = window.getComputedStyle(img, null).height;
 	console.log(window.getComputedStyle(img, null).height);
 	console.log(a.style.height);

 	window.addEventListener("resize", function() {
 		
 		picWrapper.style.height = (a.getBoundingClientRect().height + clickNote.getBoundingClientRect().height) + 'px';
 	});
 })();


(function() {
	var sliderEl = document.querySelector('.carousel-item-container');
	var slideCount = document.getElementsByClassName('carousel-item').length;
	var sliderManager = new Hammer.Manager(sliderEl);
	var sliderWrapper 	= document.querySelector(".carousel-wrapper--visible");

	sliderManager.add(new Hammer.Pan({threshold:0, pointers:0}));
	sliderManager.on('pan', function(e) {
		var percent = (100 / slideCount) * e.deltaX / sliderWrapper.offsetWidth;
		sliderEl.style.transform = 'translateX(' + percent + '%)';
	});
})();
