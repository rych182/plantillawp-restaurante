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
	<div class="contenedo">
		<div class="logo">
			<a href="<?php echo esc_url(home_url('/') );?>">
				<img src="<?php echo get_template_directory_uri();?>/img/logo.svg " alt="">
			</a>
		</div> <!--Este es el cierre del logo-->
	</div> <!--Este es el cierre del contenedor-->
</header>