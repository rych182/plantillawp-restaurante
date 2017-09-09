<?php

function lapizzeria_guardar(){
	//Global sirve para tener todas las opciones del framework
	global $wpdb;
	$tabla = $wpdb->prefix . "reservaciones";

	if (isset($_POST['enviar']) && $_POST['oculto'] == "1" ):

	$nombre = sanitize_text_field( $_POST['nombre'] );
	$fecha = sanitize_text_field( $_POST['fecha'] );
	$correo = sanitize_text_field( $_POST['correo'] );
	$telefono = sanitize_text_field( $_POST['telefono'] );
	$mensaje = sanitize_text_field( $_POST['mensaje'] );

	endif;

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
}

add_action('init', 'lapizzeria_guardar');

?>