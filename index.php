<?php get_header(); ?>
	
	<?php
	//Wordpress guarda en la base de datos, guarda todas tus opciones de páginas del escritorio.
		$pagina_blog = get_option('page_for_posts');
		$imagen = get_post_thumbnail_id($pagina_blog);
		$imagen = wp_get_attachment_image_src($imagen, 'full');
		//El wp_get_attachment_image_src sirve para adjuntar el archivo y darle un tamaño
	?>
	<!--
	<pre> El código de php sirve para que te muestra el array de 4 posiciones de la variable imagen, la primera p
		posicion nos muestra la url de donde esta la imagen para que así sepamos donde esta y mandarla llamar dandole una posicion,
		asi : $imagen[0];
		<?php //var_dump($imagen); ?>
	</pre>
	-->
	<div class="hero" style="background-image:url(<?php echo $imagen[0]; ?>);">
		<div class="contenido-hero">
			<div class="texto-hero">
				<!--the_title() se encarga de imprimir el titulo de la página-->
				
				<h1><?php echo get_the_title($pagina_blog); 
				//la funcion get_the_title toma un parametro y lo imprime, así es como se imprime por titulo
				?></h1>

			</div>
		</div>
	</div>


	<div class="principal contenedor">
		<main class="texto-centrado contenido-paginas">
		<!--the_content(); imprime el contenido-->	
			
<!--Este es el loop de Wordprees-->
	<!--Esta es una iteración que este revisando en la base de datos y mientras
	haya contenido o haya un post estará trayendo el contenido
	la funcion 'have_posts():' hace eso. se encarga de revisar cuando el loop a finalizado
	, cuando ya no hay mas resultados que mostrar y terminará de ejecutar el while-->
	<!--the_post(): es lo que contiene la información-->
				<?php while (have_posts()): the_post(); ?>

					<article class="entrada-blog">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('especialidades'); ?>
						</a>
						<header class="informacion-entrada clear">
							<div class="fecha">
								<time>
									<?php echo the_time('d'); ?>
									<span><?php the_time('M');?></span>
									<div class="titulo-entrada">
										<h2> <?php the_title(); ?> </h2>
										<p class="autor">
											<!--fa y fa-user sirven para poner el icono de admin-->
											<i class="fa fa-user" aria-hidden="true"> <?php the_author();?> </i>
										</p>
									</div>
								</time>
							</div>
							<?php //the_tags(); ?>
						</header>
						<div class="contenido-entrada">
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="button rojo">Leer mas</a>

						</div>
					</article>
			<?php endwhile; ?>			
		</main>
	</div>

<?php get_footer(); ?>