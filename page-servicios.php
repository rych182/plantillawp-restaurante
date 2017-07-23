<!--Es importante ponerle el "Template Name" por que así te aparece en wordpress la opción en la pestaña de plantilla paginas>toda las paginas -->
<?php
/*
* Template Name: Especialidades
**/
get_header(); ?>
	
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
<?php endwhile; ?>

<div class="nuestras-especialidades contenedor">
	<h3 class="">Servicios</h3>
	<?php 
		$args = array(
			'post_type' => 'especialidades',
			'posts_per_page' => -1, //para que se muestren el numero de servicios que sean 
			'orderby' => 'title',
			'order' => 'ASC',
			'category_name' => 'finanzas'
			);
			$pizzas = new WP_Query($args);
			while ($pizzas ->have_posts()): $pizzas->the_post();		
	
	?>

	<ul>
		<li><?php the_title(); ?></li>
	</ul>

	<?php endwhile; wp_reset_postdata();
	//Siempre que utilice WP_Query, debes terminar con wp_reset_postdata();?>		
</div>
<?php get_footer(); ?>