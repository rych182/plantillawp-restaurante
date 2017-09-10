<?php

	function lapizzeria_ajustes(){
		
		//1-titulo de la página,2- nombre del menu, 3-capability(lo que el usuario puede hacer), 4-slug en el menú, 5-lo que se va a mandar llamar,6-icono, 7-la posicion
		add_menu_page('Gisea', 'Gisea Ajustes', 'administrator','lapizzeria_ajustes', 'lapizzeria_opciones','',20);
		//1-Parent slug, 2-Nombre de la página, 3-titulo del menu, 4-Capability, 5-Slug, 6-Callback
		//El slug es lo que se ve en la parte de arriba, en la URL
		add_submenu_page('lapizzeria_ajustes','Reservaciones', 'Reservaciones', 'administrator', 'lapizzeria_reservaciones', 'lapizzeria_reservaciones');
	
		//llamar al registro de las opciones de nuestro theme
		//Esta madre hace hook con la funcion lapizzeria_registrar_opciones
		add_action('admin_init', 'lapizzeria_registrar_opciones');
	}

add_action('admin_menu', 'lapizzeria_ajustes');

function lapizzeria_registrar_opciones(){
	//registrar opciones, una por campo
	//1-grupo, 2-opcion(lo normal es el name de cada campo que tengas)
	register_setting('lapizzeria_opciones_grupo', 'lapizzeria_direccion');
	register_setting('lapizzeria_opciones_grupo', 'lapizzeria_telefono');
}

function lapizzeria_opciones(){
	?>

	<div class="wrap">
		<h1>Ajustes Gisea</h1>
		<!--Cuando creas páginas de opciones siempre tiene que ser options.php , este archivo tiene todas las clases
	 , todos los metodos, todas las opciones para leer estos archivos y guardar los datos que insertes en el formulario-->
		<form action="options.php" method="post">
			<!--Las funciones que yo registre, son estas que van a pasar a continuación-->
			<?php settings_fields('lapizzeria_opciones_grupo');?>
			<!--Utiliza los campos lapizzeria_opciones_grupo-->
			<?php do_settings_sections('lapizzeria_opciones_grupo'); ?>
			<table class="form-table">
				<tr valign="top">
					<th scrope="row">Dirección</th>
					<td><input type="text" name="lapizzeria_direccion" value=""></td>
				</tr>

				<tr valign="top">
					<th scrope="row">Teléfono</th>
					<td><input type="text" name="lapizzeria_telefono" value=""></td>
				</tr>
			</table>
			<!--Esto lo va a insertar en una base de datos-->
			<?php submit_button();?>
		</form>
	</div>
	
<?php
}

function lapizzeria_reservaciones (){
	?>
	<div class="wrap">
		<h1>Informacion de clientes</h1>

		<table class="wp-list-table widefat striped">
			<thead>
				<tr>
					<th class="manage-column">ID</th>
					<th class="manage-column">Nombre</th>
					<th class="manage-column">Fecha</th>
					<th class="manage-column">Correo</th>
					<th class="manage-column">Teléfono</th>
					<th class="manage-column">Mensaje</th>
				</tr>
			</thead>
			<tbody>
				<!--Así es como vamos a imprimir esos registros de nuestra tabla-->
				<?php global $wpdb; 

				$reservaciones = $wpdb->prefix . 'reservaciones';
				//Imprime todos los registros de la tabla a la que quiero hacer el query(consulta)
				//Gracias al $wpdb->prefix podemos acceder a la tabla sin importar si el usuario cambio el prefijo de la tabla o no
				$registros = $wpdb->get_results(" SELECT * FROM $reservaciones ", ARRAY_A);
				foreach ($registros as $registro) {?>

				<tr>
					<td><?php echo $registro['id']; ?></td>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['fecha']; ?></td>
					<td><?php echo $registro['correo']; ?></td>
					<td><?php echo $registro['telefono']; ?></td>
					<td><?php echo $registro['mensaje']; ?></td>
				</tr>
			
			<?php }?>
			</tbody>
		</table>
	</div>
	<?php 
}
?>