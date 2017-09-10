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
