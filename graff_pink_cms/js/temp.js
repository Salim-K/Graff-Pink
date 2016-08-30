/*global $, var, alert , console , document, window*/


$(document).ready(function () {
	
	"use strict"
	
	
	/*************** full width slider ************/
	var fullWidthBackground = $('.Parallax');
	
	fullWidthBackground.height($(window).height());
	
	$(window).resize(function () {
		fullWidthBackground.height($(window).height());

    });
	
	/*************** Change scroll header ******************/ 
	
	$(window).scroll(function () {
		   
		   var scroll = $(window).scrollTop();
		   
		   if(scroll >= 100){
			   
			   $(".navbar-default").addClass('scroll-header');
		   
		   } else {
			   $(".navbar-default").removeClass('scroll-header');
		   
		   }
	   });
	
	/******** Chang Slider **********/
    
	
});