<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php wp_head();  ?>
</head>
<body <?php body_class() ?> >

<header class="encabezado-sitio">
	<div class="contenedor">
		<div class="logo">
			<a href="<?php echo esc_url(home_url('/') );?>">
				<img src="<?php echo get_template_directory_uri();?>/img/PortadaGPQ.jpg " class="logotipo"alt="">
			</a>
		</div> <!--Este es el cierre del logo-->
		<div class="informacion-encabezado">
			<div class="redes-sociales">
				<?php $args = array(
					'theme_location' => 'social-menu',
					'container' => 'nav',
					'container_class' => 'sociales',
					'container_id' => 'sociales',
					'link_before' => '<span class="sr-text">',
					'link_after' => '</span>'
				); 
				wp_nav_menu($args);

				?>
			</div><!--Menú de redes sociales-->
			<div class="direccion">
				<p><?php echo esc_html( get_option('lapizzeria_direccion') ); ?></p>
				<p>Teléfono: <?php echo esc_html( get_option('lapizzeria_telefono') ); ?></p>
			</div>
		</div> 


	</div> <!--Este es el cierre del contenedor-->
</header>

<div class="menu-principal">
	<div class="mobile-menu">
		<a href="#" class="mobile"><i class="fa fa-bars" aria-hidden="true"></i>Menu</a>
	</div>


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
</div>

	
