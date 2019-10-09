function scrollMenu() {

	// Equivalente a media queries em javascript
	if (window.innerWidth > 1200) {
		// Quando rolar a tela, some o cabeçalho, quando rola para cima volta a aparecer
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
		var currentScrollPos = window.pageYOffset;
		if (prevScrollpos > currentScrollPos) {
			document.getElementById("navbar").style.top = "0";
		} else {
			document.getElementById("navbar").style.top = "-90px";
		}
		prevScrollpos = currentScrollPos;
		}	 
	}

	if (window.innerWidth < 1200) {
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
		var currentScrollPos = window.pageYOffset;
		if (prevScrollpos > currentScrollPos) {
			document.getElementById("navbar").style.top = "0";
		} else {
			document.getElementById("navbar").style.top = "-70px";
		}
		prevScrollpos = currentScrollPos;
		}	 
	}
}
scrollMenu(); // Chama a função scrollMenu ao carregar o js

// Chama a função scrollMenu no evento resize
window.addEventListener("resize", scrollMenu);



//* JQUERY *//

$(function () {
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

		// fecha o menu ao clicar fora	
		$('body').on('click', function() {
			$('.btn_menu_mobile').removeClass('active');
			$('.menu').animate({'left': '-100%'}, 1000);
			$('.menu_ul').animate({'left': '-100%'}, 1000);
		});

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