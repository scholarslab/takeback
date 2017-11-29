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
