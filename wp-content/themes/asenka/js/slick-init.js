jQuery(document).ready(function($){

$('.one-time').slick({
                slidesToShow: 1,
                adaptiveHeight: false,
                draggable: true,
                fade: true,
                focusOnSelect: true,
                easing: true,
                zIndex: -1,
                autoplay:true,
	            arrows: true,
                lazyLoad: 'progressive'
            });
		
});