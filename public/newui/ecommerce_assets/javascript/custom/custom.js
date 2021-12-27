
$ (function() {
	owlcarousel();
	initBackgroundImage();
	waypoint();
	addclassfootermenu();
	menupush();
	scrolling();
	parallax();
	liactive();
	equalHeight();
	tab();
	searchform();

});

/////////////////////////////////////////////////////
// Script for owlcrousel
////////////////////////////////////////////////////
function owlcarousel () {
	$('.owl-carousel').owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		autoPlay: 3000,
		autoplayHoverPause: true,
		nav: true
	});

	$(".owl-demo2").owlCarousel({
		items : 1,
		loop: true,
		autoplay: true,
		autoPlay: 3000,
		autoplayHoverPause: true,
		nav: true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				loop:true,
			},
			601:{
				items:2,
				nav:true,
				margin:15,
				loop:true,
			},
			768:{
				items:1,
				nav:true,
				loop:true,
			},

			1200:{
				items:1,
				nav:true,
				loop:true,
			}
		},
	});

	$(".hotdeal-carousel").owlCarousel({
		items : 1,
		loop: true,
		autoplay: true,
		autoPlay: 3000,
		autoplayHoverPause: true,
		nav: true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false,
				loop:true,
			},
			425:{
				items:2,
				nav:false,
				loop:true,
				margin:30,
			},
			993:{
				items:3,
				nav:false,
				margin:30,
				loop:true,
			},

			1024:{
				items:3,
				margin:30,
				nav:false,
				loop:true,
			}
		},
		
	});

	$(".owl-slider-v3").owlCarousel({
		items : 1,
		loop: true,
		autoplay: true,
		autoPlay: 3000,
		autoplayHoverPause: true,
		nav: true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false,
				loop:true,
			},
			425:{
				items:2,
				nav:false,
				loop:true,
			},
			768:{
				items:3,
				nav:false,
				margin:30,
				loop:true,
			}
		},
		
	});



	
}



/////////////////////////////////////////////////////
// Script for owlcrousel
////////////////////////////////////////////////////
	function initBackgroundImage() {
		window.onload = function() {

			//function add class
			function addClass(elem, cname) {
				var cArr = elem.className.split(" ");
				cArr.push(cname);
				elem.className = cArr.join(" ");
			}

			//function that add background image on parent block
			function setBgImage(pBlockClass) {
				var elem = pBlockClass.getElementsByTagName('img')[0]
				var imgloc = elem.getAttribute('src')
				pBlockClass.setAttribute('style', 'background-image: url(' + imgloc.toString() + ')');
			}

			//main program that call function
			var setImg = document.getElementsByClassName('bg-img');
			for (var i = 0; i < setImg.length; i++) {
				setBgImage(setImg[i]);
			}
		}
	}


/////////////////////////////////////////////////////
// Script for WayPoint
////////////////////////////////////////////////////
function waypoint() {
	var $dipper = $('.banner, .innerpage-banner, .map');
	var $dipper2 = $('.nobanner-breadcumb')

	$dipper.waypoint(function(direction){
		if(direction=='down') {
			$('.header').addClass('reducesize');
		} else {
			$('.header').removeClass('reducesize');
		}
		
	},{offset:'-100px'});

	$dipper2.waypoint(function(direction){
		if(direction=='down') {
			$('.header').addClass('reducesize');
		} else {
			$('.header').removeClass('reducesize');
		}
		
	},{offset:'80px'});

	/////////////////////////////////////////////////////
	// WayPoint for skill width animation
	////////////////////////////////////////////////////
}


/////////////////////////////////////////////////////
// Scroll On Focus
////////////////////////////////////////////////////
	function scrolling() {
		$(function() {
			$('a.go-scroll[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
					if (target.length) {
						$('html,body').animate({
							scrollTop: target.offset().top + (-65)
						}, 1000);
					}
					return false;
				}
			});
		});
	}

	function addclassfootermenu() {
		$('.footer-menu a').prepend("<span class=\"btl bt-angle-right bt-sm\"> </span>");
		$('.product-link a').prepend("<span class=\"btl bt-angle-right bt-sm\"></span>");
		$('#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item > a.mega-menu-link').prepend("<span class=\"btl bt-angle-right bt-sm\"></span>");
		$('#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-flyout ul.mega-sub-menu a').prepend("<span class=\"btl bt-angle-right bt-sm\"></span>");
		
		$('.name .ginput_container').prepend("<i class=\"icon-append fa fa-user\"></i>");
		$('.email .ginput_container').prepend("<i class=\"icon-append fa fa-envelope\"></i>");
		$('.subject .ginput_container').prepend("<i class=\"icon-append fa fa-tag\"></i>");
		$('.message .ginput_container').prepend("<i class=\"icon-append fa fa-comment\"></i>");
		$('.dropdown .ginput_container').prepend("<i class=\"icon-append fa fa-sort-desc\"></i>");
		$('.ship .ginput_container').prepend("<i class=\"icon-append fa fa-ship\"></i>");
		$('.tour .ginput_container').prepend("<i class=\"icon-append fa fa-tripadvisor\"></i>");

	}

/////////////////////////////////////////////////////
// Script for Burger Menu
////////////////////////////////////////////////////
	function menupush(){
		$(".menuTrigger").click(function(){
			$('body').toggleClass('cbp-spmenu-push-toleft');
		});

		$(".ms-slide").mousedown(function(){
			$(this).addClass('ms-grab');
		});

		$(".ms-slide").mouseup(function(){
			$(this).removeClass('ms-grab');
		});
	}


/////////////////////////////////////////////////////
// Script for Parallax and Opacity Effect On Scroll
////////////////////////////////////////////////////
function parallax() {
	$(window).scroll(function() {
		// $('.parallax-information').css('transform', 'translateY(' + 0.4 * $(window).scrollTop() + 'px)');
		var wScroll = $(this).scrollTop();
		var parallaxinformation = $('.parallax-information');
		var newsletterinformation = $('.newsletter-information');
		var aboutnewsletterinformation = $('.aboutnewsletterinformation');

		//peroscope scroll
		if (wScroll > parallaxinformation.offset().top -$(window).height()){
			parallaxinformation.css({'background-position':'center '+ (- /*change(+/-)*/(wScroll -parallaxinformation.offset().top)/3) +'px'});
		}

		if (wScroll > newsletterinformation.offset().top -$(window).height()){
			newsletterinformation.css({'background-position':'center '+ (- /*change(+/-)*/(wScroll -newsletterinformation.offset().top)/3) +'px'});
		}

	});
}



/////////////////////////////////////////////////////
// Simple Pop Up Function
////////////////////////////////////////////////////
	function preview(id) {
		jQuery("li.gf_readonly input").attr("readonly","readonly");

		$(function() {
			title = $("input#title" + id).val();
			category = $("input#category" + id).val();
			$("li#field_1_5 input").attr('value',category);
			$("li#field_1_6 input").attr('value',title);

		});
	}





/////////////////////////////////////////////////////
// Onclick Active class Function
////////////////////////////////////////////////////
	function liactive() {
		var clas;
		var tigger;
		var text;
		var select;
		jQuery('#filters-container .cbp-filter-item').on('click', function (e) {
			clas = $(this).attr("data-filter");
			e.preventDefault();
			if(tigger != clas){
				$('.continent-description .continent').hide(300);
				if(clas != '*') {
					$('.continent-description '+clas).show(300);
				}
				tigger = clas;
			}
		});

		jQuery('.description-more').on('click', function (e) {
			e.preventDefault();
			text = $(this).text();
			if (text == 'View More') {
				$(this).text('Show Less');
			} else if(text == 'Show Less') {
				$(this).text('View More');
			}
			$(this).parent().find('.whole-content').toggle(300);
		});

		var allIcons=$(".singlePackage .panel-heading i.fa");
			$('.singlePackage .panel-heading').click(function(){allIcons.removeClass('fa-minus').addClass('fa-plus');
			$(this).find('i.fa').removeClass('fa-plus').addClass('fa-minus');});
		var allIconsOne=$(".accordionWrappar .panel-heading i.fa");
			$('.accordionWrappar .panel-heading').click(function(){allIconsOne.removeClass('fa-minus').addClass('fa-plus');
			$(this).find('i.fa').removeClass('fa-plus').addClass('fa-minus');});
	}

	

/////////////////////////////////////////////////////
// Ajax For filtering Category
////////////////////////////////////////////////////

	function filtering(catslug){
		$('#groupservice').html('');
		$('#loading-animation').show();

		jQuery.ajax({
			url: my_ajax_object.ajax_url,
			type: 'POST',
			data:{
				action: 'my_test_action',
				catslug: catslug
			},
			success: function(response){
				$('#loading-animation').hide();
				$("#groupservice").hide();
				$("#groupservice").html(response).fadeIn('slow');
			},
			error: function(error){
				console.log('error');
			}
		});
	}



/////////////////////////////////////////////////////
// Equal Height
////////////////////////////////////////////////////
	function equalHeight(){
		$('#cruise-line .row').each(function() {
			$(this).children('.item').matchHeight();
		});
		$('.services-icon .row').each(function() {
			$(this).children('.item').matchHeight();
		});
		$('.tourpage .cbp-wrapper').each(function() {
			$(this).children('.cbp-item').matchHeight();
		});


		
	}





/////////////////////////////////////////////////////
// JQuery Tab Class
////////////////////////////////////////////////////
	function tab(){
		$( function() {
			$( "#tabs" ).tabs();
		} );
	}


/////////////////////////////////////////////////////
// Searchform JQuery
////////////////////////////////////////////////////
	function searchform(){
		var inputvalue;
		jQuery('.searchhh').on("click", function () {
			if(jQuery('.search-btn').hasClass('fa-search')){
				jQuery('.search-open').fadeIn(500);
				jQuery('.search-btn').removeClass('fa-search');
				jQuery('.search-btn').addClass('fa-times');
			} else {
				jQuery('.search-open').fadeOut(500);
				jQuery('.search-btn').addClass('fa-search');
				jQuery('.search-btn').removeClass('fa-times');
			}
		});

		jQuery('.btn-u').on('click',function (e){
			inputvalue = document.getElementById('getsearchdata').value;
			if(inputvalue == '') {
				e.preventDefault();
			}
		});
	}


/////////////////////////////////////////////////////
// Pagination
////////////////////////////////////////////////////
	// function pagination() {

	// 	jQuery('.tab-v1 .nav-tabs a').on('click', function (e) {
	// 		clas = $(this).attr("href");
	// 		console.log(clas);
	// 		e.preventDefault();
	// 		jQuery('.tab-pane').removeClass('pagination__wrap easyPaginateList');
	// 		jQuery('.sidebarPage').removeClass('pagination__item');
	// 		$(clas).addClass('pagination__wrap');
	// 		$(clas).find('.sidebarPage').addClass('pagination__item');


	// 		$('.pagination__wrap').easyPaginate({
	// 			paginateElement: '.pagination__item',
	// 			elementsPerPage: 3,
	// 			effect: 'climb'
	//     	});


	// 	});
