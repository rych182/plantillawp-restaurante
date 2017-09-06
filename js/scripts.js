$ = jQuery.noConflict();

$(document).ready(function() {
	//Ocultar y mostrar menu
	$('.mobile-menu a').on('click', function(){
		$('nav.menu-sitio').toggle('slow');
	});

//El menú aparece o desaparece según el tamaño de la pantala
	var breakpoint = 768;

	$(window).resize(function() {
		ajustarCajas();//para que la funcion se ejecute aquí
		
		if ($(document).width() >= breakpoint) {
			$('nav.menu-sitio').show();
		}else {
			$('nav.menu-sitio').hide();
		}
	});

	//Ajustar cajas según tamaño de imagen
	ajustarCajas();
		
});

function ajustarCajas() {
		var imagenes = $('.imagen-caja');

		if(imagenes.length > 0 ) {
			var altura = imagenes[0].height;//con height podemos tomar la altura de las imagenes
			var cajas = $('div.contenido-caja');
			$(cajas).each(function(i, elemento){//i es el indice
				$(elemento).css({'height' : altura + 'px'});
			});
		}
	}