<?php get_header(); ?>
	
	<!--Este es el loop de Wordprees-->
	<!--Esta es una iteración que este revisando en la base de datos y mientras
haya contenido o haya un post estará trayendo el contenido
la funcion 'hace_posts():' hace eso. se encarga de revisar cuando el loop a finalizado
, cuando ya no hay mas resultados que mostrar y terminará de ejecutar el while-->
<!--the_post(): es lo que contiene la información-->
	<?php while (have_posts()): the_post(); ?>


	<div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="contenido-hero">
			<div class="texto-hero">
				<!--the_title() se encarga de imprimir el titulo de la página-->
				
				<h1><?php the_title() ?>	</h1>				
			</div>
		</div>
	</div>


	<div class="principal contenedor">
		<main class="texto-centrado contenido-paginas">
		<!--the_content(); imprime el contenido-->	
			<?php the_content();?>

		</main>
	</div>
	
	<div class="informacion-cajas contenedor">
		<div class="caja"> <!--Caja 1-->
			<?php
				$id_imagen = get_field('imagen_1');
				$imagen = wp_get_attachment_image_src($id_imagen,'nosotros');
			?>
			<img src="<?php echo $imagen[0] ?>" class="imagen-caja">
		

			<div class="contenido-caja">
				<?php the_field('descripcion_1'); ?>
			</div>
		</div>

		<div class="caja"> <!--Caja 2-->
			<div class="contenido-caja">
				<?php the_field('descripcion_2'); ?>
			</div>

			<?php
				$id_imagen = get_field('imagen_2');
				$imagen = wp_get_attachment_image_src($id_imagen,'nosotros');
			?>
			<img src="<?php echo $imagen[0] ?>" class="imagen-caja">
		</div>

		<div class="caja"><!--Caja 3-->
			<?php
				$id_imagen = get_field('imagen_3');
				$imagen = wp_get_attachment_image_src($id_imagen,'nosotros');
			?>
			<img src="<?php echo $imagen[0] ?>" class="imagen-caja">
		

			<div class="contenido-caja">
				<?php the_field('descripcion_3'); ?>
			</div>
		</div>
	</div>


<?php endwhile; ?>
<?php get_footer(); ?>