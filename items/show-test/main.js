/*
 * Gallery for Item Show Page
 *
 * Javascript to allow carousel movement of content
 *
 * Author: Katherine Donnally
 *
 */

 /*(function() {
 	var carouselContainer 	= document.querySelector(".carousel-wrapper--visible"),
 		carouselWidth		= parseInt(carouselContainer.offsetWidth),
 		itemContainer 		= document.querySelector(".carousel-item-container"),
 		items   			= document.getElementsByClassName('carousel-item'),
 		itemWidth 			= items[0].offsetWidth + 
 							  (2 * parseInt(window.getComputedStyle(items[0], null).marginLeft)),
 		contentWidth		= itemWidth * items.length,
 		//itemContainerWidth  = itemContainer.offsetWidth;
		btnLeft 			= document.querySelector(".left"),
		btnRight			= document.querySelector(".right");
 	console.log(itemWidth);
 	console.log(carouselWidth);

 	// button fxnality:
 	itemContainer.style.marginLeft = 0;
 	itemContainer.setAttribute('data-start-margin', parseInt(this.style.marginLeft));
 	// ^ need this to keep track of number or won't be able to recursively add/subtract
 	btnRight.addEventListener('click', function() {
 		itemContainer.style.marginLeft = (-1 * carouselWidth) + 'px';
 		console.log(itemContainer.style.marginLeft);
 	});

 	btnLeft.addEventListener('click', function() {
 		itemContainer.style.marginLeft = carouselWidth + 'px';
 		console.log(itemContainer.style.marginLeft);
 	});
 })();*/

 /*
  * Using Hammer.js
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
