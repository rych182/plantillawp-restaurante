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

	<div class="contenedor comentarios">
		<?php comment_form(); ?> <!--Función que va a imprimir el formulario de los comentarios-->
	</div>
<?php endwhile; ?>
<?php get_footer(); ?>