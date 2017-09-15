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
				
				<h1><?php echo esc_html( get_option('blogdescription')); ?></h1>	
				<?php the_content();?>

				<?php $url = get_page_by_title('Sobre nosotros'); ?>
				<a class="button naranja" href="<?php echo get_permalink($url->ID); ?>">Leer más</a>			
			</div>
		</div>
	</div>
<?php endwhile; ?>

	<div class="principal contenedor">
		<main class=" contenedor-grid ">
		<!--the_content(); imprime el contenido-->	
			<h2 class="rojo texto-centrado">Nuestros servicios</h2>
			<!--Cuando quiero imprimir algo de otras secciones donde no estoy-->
			<?php $args = array(
				'posts_per_page' => 3,//si pones -1 te imprimira todas las especialidades
				'orderby' => 'rand',//rand es para forma random, si lo quitas te imprimira el mismo orden siempre
				'post_type' => 'especialidades'
				//Si solo quisieramos que apareciera una categoria ponemos 
				//'category_name' => 'finanzas'
			);
			$especialidades = new WP_Query($args);
			while ($especialidades->have_posts()): $especialidades->the_post();
			 ?>

			<div class="especilidad columnas1-3">
				<div class="contenido-especialidad">
					<?php the_post_thumbnail('especialidades_portrait'); //Para imprimir la imagen destacada?>
					<div class="informacion-platillo">
					<h3>	<?php the_title(); ?> </h3>
					<?php the_content(); ?>
					<p class="precio"> <?php the_field('precio'); ?> </p>
					<a href="<?php the_permalink(); ?>" class="button">Leer más</a>
					</div>
				</div>
			</div>

			 <?php endwhile; wp_reset_postdata(); ?>
		</main>
	</div>

<?php get_footer(); ?>