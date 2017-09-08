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


	<div class="principal contenedor contacto">
		<main class="texto-centrado contenido-paginas">
		<!--the_content(); imprime el contenido-->	
			<h2>Realiza una reservación</h2>

			<form class="reserva-contacto" method="post">
				<div class="campo">
					<input type="text" name="nombre" placeholder="Nombre" required>
				</div>

				<div class="campo">
					<input type="datetime-local" name="fecha" placeholder="Fecha" required>
				</div>

				<div class="campo">
					<input type="email" name="correo" placeholder="Correo" required>
				</div>

				<div class="campo">
					<input type="tel" name="telefono" placeholder="Teléfono" required>
				</div>

				<div class="campo">
					<textarea name="mensaje" placeholder="Mensaje" required></textarea>
				</div>

				<input type="submit" name="enviar" class="button">
			</form>
		</main>
	</div>
<?php endwhile; ?>
<?php get_footer(); ?>