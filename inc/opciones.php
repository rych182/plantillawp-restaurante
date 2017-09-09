<?php

	function lapizzeria_ajustes(){
		
		//1-titulo de la página,2- nombre del menu, 3-capability(lo que el usuario puede hacer), 4-slug en el menú, 5-lo que se va a mandar llamar
		add_menu_page('Gisea', 'Gisea Ajustes', 'administrator','lapizzeria_ajustes', 'lapizzeria_opciones','',20);
		//1-Parent slug, 2-Nombre de la página, 3-titulo del menu, 4-Capability, 5-Slug, 6-Callback
		//El slug es lo que se ve en la parte de arriba, en la URL
		add_submenu_page('lapizzeria_ajustes','Reservaciones', 'Reservaciones', 'administrator', 'lapizzeria_reservaciones', 'lapizzeria_reservaciones');
	}

add_action('admin_menu', 'lapizzeria_ajustes');

function lapizzeria_opciones(){
	
}

function lapizzeria_reservaciones (){
	?>

	<?php
}
