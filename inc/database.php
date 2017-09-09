<?php
// Inicializa la creación de las tablas nuevas
function lapizzeria_database(){
	//wpdb nos da los metodos para trabajar con tablas
	global $wpdb;
	//Agregamos una versión
	global $lapizzeria_dbversion;
	$lapizzeria_dbversion = '1.0';

	//Obetenemos el prefijo
	$tabla = $wpdb->prefix . 'reservaciones';

	//Obtenemos el collation de la instalación
	$charset_collate = $wpdb->get_charset_collate();	

	//Agregamos la estructura de la base de datos
	$sql = "CREATE TABLE $tabla (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			nombre varchar(50) NOT NULL,
			fecha datetime NOT NULL,
			correo varchar(50) DEFAULT '' NOT NULL,
			telefono varchar(10) NOT NULL,
			mensaje longtext NOT NULL,
			PRIMARY KEY (id)
		) $charset_collate; ";
	
	//Se necesita dbDelta para ejecutar el SQL y está en la siguiente dirección:
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);

	// Agregamos la versión de la BD para compararla con futuras actualizaciones
	add_option('lapizzeria_dbversion', $lapizzeria_dbversion);

// ACTUALIZAR EN CASO DE SER NECESARIO

$version_actual = get_option('lapizzeria_dbversion');

//Comparamos las 2 versiones
if ($lapizzeria_dbversion != $version_actual) {
		$tabla = $wpdb->prefix . 'reservaciones';

			//Aquí realizarías las actualizaciones
			$sql = "CREATE TABLE $tabla (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			nombre varchar(50) NOT NULL,
			fecha datetime NOT NULL,
			correo varchar(50) DEFAULT '' NOT NULL,
			telefono varchar(10) NOT NULL,
			mensaje longtext NOT NULL,
			PRIMARY KEY (id)
		) $charset_collate; ";
		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		dbDelta($sql);
//Actualizamos a la versión actual en caso de que así sea
		update_option('lapizzeria_dbversion', $lapizzeria_dbversion);
	}

}


add_action('after_setup_theme','lapizzeria_database');

//Función para comprobar que la versión instalada es igual a la base de datos nueva
function lapizzeria_revisar(){
	global $lapizzeria_dbversion;
	if (get_site_option('lapizzeria_dbversion') != $lapizzeria_dbversion){
		lapizzeria_database();
	}
}

add_action('pluggins_loaded', 'lapizzeriadb_revisar');
?>