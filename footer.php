		<footer>
			<?php //
				$args = array(
					'theme_location' => 'header-menu',
					'container' => 'nav',
					'after' =>'<span class="separador"> | </span>' 
					);
				wp_nav_menu($args);
			?>

			<div class="ubicacion">
				<p>Jiutepec, Morelos</p>
				<p>Tel:55 3647 8905</p>
			</div>
			<!--Al usar "date" en php el año se cambia automaticamente-->
			<p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?></p>
		</footer>

		<?php wp_footer(); ?>

</body>
</html>