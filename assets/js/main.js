jQuery(document).ready(function(){ 
	
	//sticker.js
	$(document).ready(function(){
		$(".menu-area").sticky({topSpacing:0});
	});

	//Owl Carosel
    $('.homepage-slides').owlCarousel({
		loop:true,
		margin:20,
		nav:false,
		autoplay:true,
		autoplayTimeout:2000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
	
	// Student area slider
	$('.student-slider-area').owlCarousel({
		loop:true,
		margin:20,
		nav:false,
		autoplay:true,
		autoplayTimeout:4000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
	
	
	$('.event-slides').owlCarousel({
		loop:true,
		stagePadding: 50,
		margin:10,
		nav:false,
		autoplay:true,
		autoplayTimeout:3000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:3
			}
		}
	})
	
	// magnific-area 
	$('#youtube-video-one, #student-area-video').magnificPopup({
		type:'iframe',
		iframe: {
			patterns: {
				youtube: {
					index: 'youtube.com/', 
					id: 'v=', 
					src: 'http://www.youtube.com/embed/%id%?autoplay=1' 
				}				
			},
			
			srcAction: 'iframe_src', 
		}
		
		
	});
	
	// magnific-area - 2 Student Area
	// $('#student-area-video').magnificPopup({
	// type:'iframe',
	// iframe: {
	// patterns: {
	// youtube: {
	// index: 'youtube.com/', 
	// id: 'v=', 
	// src: 'http://www.youtube.com/embed/%id%?autoplay=1' 
	// }				
	// },
	// srcAction: 'iframe_src', 
	// }
	// });
	
	
	// magnific-area - 3 History Area
	$('#history-area-video').magnificPopup({
		type:'iframe',
		iframe: {
			patterns: {
				youtube: {
					index: 'youtube.com/', 
					id: 'v=', 
					src: 'http://www.youtube.com/embed/%id%?autoplay=1' 
				}				
			},
			
			srcAction: 'iframe_src', 
		}
		
		
	});
	
	// scroll-area 
	$(window).scroll(function(){
		if ($(this).scrollTop() > 200) {
			$('.scrollup').fadeIn();
			} else {
			$('.scrollup').fadeOut();
		}
	}); 
	
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 2000);
		return false;
	});
	
	// img popup 
	
	$('body').append('<div class="product-image-overlay"><span class="product-image-overlay-close">x</span><img src="" /></div>');
	var productImage = $('img');
	var productOverlay = $('.product-image-overlay');
	var productOverlayImage = $('.product-image-overlay img');
	
	productImage.click(function () {
		var productImageSource = $(this).attr('src');
		
		productOverlayImage.attr('src', productImageSource);
		productOverlay.fadeIn(100);
		$('body').css('overflow', 'hidden');
		
		$('.product-image-overlay-close').click(function () {
			productOverlay.fadeOut(100);
			$('body').css('overflow', 'auto');
		});
	});
});