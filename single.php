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
	<div class="contenedor">
		<h3 class="texto-centrado">Comentarios</h3>
		<ul class="lista-comentarios">
			<?php //get_comments nos regresa los comentarios, nos pasa un arreglo con distintos ajustes
			//requiere 2 parametros, post_id y $post->ID
				$comentarios = get_comments(array(
					'post_id' => $post->ID,
					'status' => 'approve'//Para que se vean solo los comentarios aprobados
				));
				wp_list_comments(array(
					'per_page' => 10, //numero de comentarios por páginas
					'reverse_top_level' => false //hace que los ultimos comentarios aparezcan hasta arriba
					), $comentarios);//para que ponga los comentarios que solo estén aprobados
			?>
		</ul>
	</div>
<?php endwhile; ?>
<?php get_footer(); ?>