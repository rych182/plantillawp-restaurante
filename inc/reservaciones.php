<?php

function lapizzeria_guardar(){
	//Global sirve para tener todas las opciones del framework
	global $wpdb;


	if (isset($_POST['enviar']) && $_POST['oculto'] == "1" ):

	$nombre = sanitize_text_field( $_POST['nombre'] );
	$fecha = sanitize_text_field( $_POST['fecha'] );
	$correo = sanitize_text_field( $_POST['correo'] );
	$telefono = sanitize_text_field( $_POST['telefono'] );
	$mensaje = sanitize_text_field( $_POST['mensaje'] );

	$tabla = $wpdb->prefix . "reservaciones";
	$datos = array(
		'nombre' => $nombre,
		'fecha' => $fecha,
		'correo' => $correo,
		'telefono' => $telefono,
		'mensaje' => $mensaje,
	); 

	$formato = array(
		'%s',
		'%s',
		'%s',
		'%s',
		'%s'
		);

	$wpdb->insert($tabla, $datos, $formato);


//´para que ya no tengamos registros repetidos

$url = get_page_by_title('Gracias por tu reserva');
wp_redirect( get_permalink( $url->ID ) );
exit();

	endif;
	
}

add_action('init', 'lapizzeria_guardar');


?>