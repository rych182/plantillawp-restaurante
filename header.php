<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php wp_head();  ?>
</head>
<body>

<header class="encabezado-sitio">
	<div class="contenedor">
		<div class="logo">
			<a href="<?php echo esc_url(home_url('/') );?>">
				<img src="<?php echo get_template_directory_uri();?>/img/logo.svg " alt="">
			</a>
		</div> <!--Este es el cierre del logo-->
		<div class="informacion-encabezado">
			<div class="redes-sociales">
				<?php $args = array(
					'theme_location' => 'social-menu',
					'container' => 'nav',
					'container_class' => 'menu-social',
					'container_id' => 'menu-social',
					'link_before' => '<span class="sr-text">',
					'link_after' => '</span>'
				); 
				wp_nav_menu($args);

				?>
			</div><!--Menú de redes sociales-->
			<div class="direccion">
				<p>Jiutepec, Morelos</p>
				<p>Tel:55 3647 8905</p>
			</div>
		</div> 


	</div> <!--Este es el cierre del contenedor-->
</header>

<navv class="menu-sitio">
	<div class="contenedor navegacion">
		<?php 
			$args = array(
				'theme_location' => 'header-menu', //Theme_location imprime el menu
				'container' => 'nav',//las etiquetas que tenga
				'container_class' => 'menu-sitio'//las clases que tenga
			 );
		
			wp_nav_menu( $args );//funcion que imprime el menu
		?>
	</div>
</navv>