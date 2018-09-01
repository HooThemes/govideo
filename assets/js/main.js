jQuery(document).ready(function($) {
	
	$('#header-slider').imagesLoaded(function () {
		$("#header-slider").owlCarousel({

			autoplay: govideo_params.sliderOptions.header_slider_autoplay,
			autoplayTimeout: govideo_params.sliderOptions.header_slider_timeout,
			loop: true,
			items : 5,
			lazyLoad:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:false
				},
				600:{
					items:2,
					nav:false
				},
				1000:{
					items:3,
					nav:false,
				},
				1200:{
					items:5,
					nav:false,
				}
			}
		});
	});
	
	$('.featured-main-slider').imagesLoaded(function () {
		$(".featured-main-slider").owlCarousel({
			autoplay: govideo_params.sliderOptions.main_slider_autoplay,
			autoplayTimeout: govideo_params.sliderOptions.main_slider_timeout,
			loop: true,
			items : 1,
			lazyLoad:true,
			responsiveClass:true,
		});
	});
	
	$(".single-page-gallery").owlCarousel({
		autoplay: govideo_params.sliderOptions.post_slider_autoplay,
		autoplayTimeout: govideo_params.sliderOptions.main_slider_timeout,
		loop: true,
		items : 1,
		lazyLoad:true,
		responsiveClass:true,
	});
	
	/*search icon*/
	$(document).on('click', '.govideo-header .govideo-search .govideo-search-label',function(){
		$(this).parent('.govideo-search').find('.govideo-search-wrap').toggle();
	});
	
	/*back to top*/
	function onScroll() {
        
        var headerPosition = $(document).scrollTop();
		
		if( headerPosition > 200 )
			$('.back-to-top').fadeIn();
		else
			$('.back-to-top').fadeOut();
    }
	
	$('#back-to-top, .back-to-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, '800');
        return false;
    });
	
    $(window).scroll(function() {
		onScroll();
    });
	
});