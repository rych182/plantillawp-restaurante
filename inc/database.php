<?php

function lapizzeria_database(){
	global $wpdb;
	global $lapizzeria_dbversion;
	$lapizzeria_dbversion = '0.1';

	$tabla = $wpdb->prefix . 'reservaciones';

	$charset_collate = $wpdb->get_charset_collate();	

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

	add_option('lapizzeria_version', $lapizzeria_dbversion);

// ACTUALIZAR EN CASO DE SER NECESARIO

$version_actual = get_option('lapizzeria_version');
//Checa si es diferente, por si se hace cambios y así se crea la versión 0.2
if ($lapizzeria_dbversion != $version_actual) {
		$tabla = $wpdb->prefix . 'reservaciones';

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

		update_option('lapizzeria_dbversion', $lapizzeria_dbversion);
	}

}


?>