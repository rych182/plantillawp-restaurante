<?php
//Fuentes, tamaño de imagenes, agregar jquery, librerías de css se hace con funtions.php

function lapizzeria_styles(){ 	
	//Lo registra en Wordpress para poderlo usar mas adelante
	//En pocas palabras "Registra los estilos"
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '7.0');
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');
	
	// la funcion get_template_directory_uri() sirve para que se escriba la url que va en las etiquetas "link"
	//En pocas palabras "Llama a los estilos"
	wp_enqueue_style('normalize');
	wp_enqueue_style('style'); 
}
//la funcion wp_enqueue_scripts sirve para comunicarse con Wordpress
add_action('wp_enqueue_scripts', 'lapizzeria_styles');

//Creación de menus
function lapizzeria_menus(){
	register_nav_menus(array(
		'header-menu' => __('Header Menu', 'lapizzeria'),
		'header-menu' => __('Social Menu', 'lapizzeria')
	));
}
//init es cuando se inicializa Wordpress
add_action('init','lapizzeria_menus')

?>