$(function () {

	// Scroll do menu
	$('.menu_a').click(function() {
		var goto = $('.'+$(this).attr('href').replace('#', '')).position().top;
		$('html, body').animate({scrollTop: goto - $('.cabecalho').outerHeight()}, 800);
		return false;
	});
	// Scroll do menu

	// Controles do menu responsivo
	$('.btn_menu_mobile').click(function(event) {
	    event.stopPropagation();
	    if(!$(this).hasClass('active')) {
	        $(this).addClass('active');
	        $('.menu_ul').animate({'left': '0px'}, 500);
	    } else {
	        $(this).removeClass('active');
	        $('.menu_ul').animate({'left': '-100%'}, 500);
	    }
	});
	// Controles do menu responsivo

	// Controles do banner
	$('.lista_banner_ul').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		speed: 500,
		arrows: true,
		prevArrow: '<i class="fas fa-angle-left slick-prev-i" title="Ver o Anterior"></i>',
		nextArrow: '<i class="fas fa-angle-right slick-next-i" title="Ver o Próximo"></i>',
		dots: true,
		responsive: [
		{
			breakpoint: 1199.98,
			settings: {
				arrows: false
			}
		}
		]
	});
	// Controles do banner


});