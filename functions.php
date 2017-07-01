<?php
//Fuentes, tamaño de imagenes, agregar jquery, librerías de css se hace con funtions.php

function lapizzeria_styles()
{ // la funcion get_template_directory_uri() sirve para que se escriba la url
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0'); 
}
//la funcion wp_enqueue_scripts sirve para comunicarse con Wordpress
add_action('wp_enqueue_scripts', 'lapizzeria_styles');
?>