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
		</footer>

		<?php wp_footer(); ?>

</body>
</html>