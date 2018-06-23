(function($) {
	"use strict";
    $(window).on('load', function() {
		$("#loader").fadeOut("slow");
	});

    $(window).on('load', function(){
		$(window).scroll(function() {
			var wintop = $(window).scrollTop(), docheight = $('article').height(), winheight = $(window).height();
			console.log(wintop);
			var totalScroll = (wintop/(docheight-winheight))*100;
			console.log("total scroll" + totalScroll);
			$(".KW_progressBar").css("width",totalScroll+"%");
		});

	});

	$(document).ready(function() {

		var pocketMap = $('.office-map');
		if( pocketMap.length > 0 ){
			var latlng = {
				lat: pocketMap.data('lat'),
				lng: pocketMap.data('lng')
			};
			var map = new google.maps.Map(pocketMap.get(0), {
				zoom: 15,
				center: latlng
			});
			var address = pocketMap.data('address');
			var info = '';
			if( address != '' ){
				info = 'https://www.google.com/maps/dir/?api=1&origin='+encodeURIComponent(address);
			}
			var infoWin = new google.maps.InfoWindow({
				content: address+'<br/><a href="'+info+'" target="_blank" title="Get Directions">Get Directions</a>'
			});
			var marker = new google.maps.Marker({
				position: latlng,
				map: map
			});
			marker.addListener('click', function( e ){
				infoWin.open(map, marker);
			});
			infoWin.open(map, marker);
		}

		// ====================================================================

		// Header scroll function

        $(window).on('load', function() {
			var scroll = $(window).scrollTop();
			if (scroll > 20) {
				$("header").addClass("hide-header");
			} else {
				$("header").removeClass("hide-header");
			}
		});

		// Superslides

		$('#slider').superslides({
			play: 6000,
			animation: 'fade',
			animation_speed: 2000
		});

		//=====================================================================

		// Carousels

		$("#specials .owl-carousel").owlCarousel({
			items: 4,
			margin: 30,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-chevron-left fa-2x"></i>','<i class="fa fa-chevron-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				767:{
					items:2
				},
				992:{
					items:4
				}
			}
		});


		$("#home-reviews2 .owl-carousel").owlCarousel({
			items: 1,
			margin: 50,
			loop: false,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-chevron-left fa-2x"></i>','<i class="fa fa-chevron-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				767:{
					items:1
				},
				992:{
					items:1
				}
			}
		});

		$("#blog .owl-carousel").owlCarousel({
			items: 3,
			loop:true,
			responsiveClass:true,
			margin: 60,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-chevron-left fa-2x"></i>','<i class="fa fa-chevron-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				767:{
					items:2
				}
			}
		});

		/*$("#reviews .owl-carousel").owlCarousel({
			items: 1,
			margin: 0,
			loop: false,
			dots: false,
			nav: false,
			autoPlay: 4000
		});*/

		//=====================================================================

		// Home page reviews quote

		$("#home-reviews2 .owl-carousel blockquote").prepend("<i class='fa fa-quote-right fa-2x'></i>");



	})

})(jQuery);