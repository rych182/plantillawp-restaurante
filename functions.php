<?php
//Enlazamos el archivo, tablas personalizadas y otras funciones
require get_template_directory() . '/inc/database.php';
//Funciones para las reservaciones
require get_template_directory() . '/inc/reservaciones.php';
// Crear opciones para el template
require get_template_directory() . '/inc/opciones.php';


//funcion para agregar un boton de imagen destacada en la sección de páginas de Wordpress.
//
function lapizzeria_setup(){//Esta funcion tiene que hacer hook
	//add_theme_support('post-thumbnails') así se llama lo que habilita las imagenes destacadas
	add_theme_support('post-thumbnails');
	//Registra un nuevo tamaño de imagen
	//add_image_size('nombre',ancho,alto,true) el true es para redimensionar
	add_image_size('nosotros',437,291,true);

	add_image_size('especialidades',768,515,true);

	add_image_size('especialidades_portrait',435,450,true);

	//update_option sirve para ajustar el tamaño de las imagenes de la galeria por defecto, que ya venga siempre así en el momento de que activen nuestra plantilla
	//Esta medida aparecera en el backoffice 
	update_option('thumbnail_size_w',253);
	update_option('thumbnail_size_h',164);
}
//Aquí esta el hook
//after_setup_theme es una función que correra después que la plantilla ha sido instalada en nuestro Wordpress
add_action('after_setup_theme', 'lapizzeria_setup');

//Fuentes, tamaño de imagenes, agregar jquery, librerías de css se hace con funtions.php

function lapizzeria_styles(){ 	
	//Lo registra en Wordpress para poderlo usar mas adelante
	//En pocas palabras "Registra los estilos"
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '7.0');
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array('normalize'), '4.7.0');
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');
	wp_register_style('google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900',array(),'1,0,0');
	wp_register_style('fluidboxcss', get_template_directory_uri() . '/css/fluidbox.min.css', array('normalize'), '1.0');
	// la funcion get_template_directory_uri() sirve para que se escriba la url que va en las etiquetas "link"
	//En pocas palabras "Llama a los estilos"
	wp_enqueue_style('normalize');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('style');
	wp_enqueue_style('fluidboxcss');

	//Registrar JavaScript
	//wp_enqueue_script(); TOMA 6 PARAMETROS
	//1-parametros, 2-ubicacion, 3- array de dependencias, 4-la version, 5- true es para que cargue los archivos js en el footer
	//Aquí no se pone nada en el array por que de momento es el único script que tenemos
	wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array() , '1.0.0', true); 
	wp_register_script('fluidboxjs', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array() , '1.0.0', true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('scripts');
	wp_enqueue_script('fluidboxjs');
}
//la funcion wp_enqueue_scripts sirve para comunicarse con Wordpress
add_action('wp_enqueue_scripts', 'lapizzeria_styles');

//Creación de menus, aquí podemos crear lo que aparezca en la pestaña de menus

function lapizzeria_menus(){
	register_nav_menus(array(
		'header-menu' => __('Header Menu', 'lapizzeria'),
		'social-menu' => __('Social Menu', 'lapizzeria')
	));
}
//init es cuando se inicializa Wordpress
add_action('init','lapizzeria_menus');



//El custom post field sirve para mantener mas ordenado el proyecto
add_action('init','lapizzeria_especialidades');
function lapizzeria_especialidades(){ 
	$labels = array(//Estas son etiquetas de la interfaz
		'name'			=> _x( 'Servicios', 'lapizzeria'),
		'singular_name' => _x( 'Servicios', 'post type singular name', 'lapizzeria'),
		'menu_name'		=> _x( 'Servicios', 'admin menu', 'lapizzeria'),
		'name_admin_bar'=> _x( 'Servicios', 'add new on admin bar', 'lapizzeria'),
		'add_new'		=> _x( 'Add New', 'book', 'lapizzeria'),
		'add_new_item'	=> __( 'Add New Servicio', 'lapizzeria'),
		'new_item'		=> __( 'New Servicios', 'lapizzeria'),
		'edit_item'		=> __( 'Edit Servicios', 'lapizzeria'),
		'view_item'		=> __( 'View Servicios', 'lapizzeria'),
		'all_items'		=> __( 'All Servicios', 'lapizzeria'),
		'search_items'	=> __( 'Seach Servicios', 'lapizzeria'),
		'parent_item_colon'=> __('Parent Servicios:', 'lapizzeria'),
		'not_found'		=> __('No Servicios found.','lapizzeria'),
		'not_found_in_trash'=> __('No Servicios found in Trash.','lapizzeria')
	);

	$args = array(
		'labels'				=> $labels,
		'description'			=> __('Description.', 'lapizzeria'),
		'public'				=> true,
		'publicity_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'rewrite'				=> array( 'slug' => 'especialidades'),//Este es la url de especialidades
		'capability_type'		=> 'post',
		'has_archive'			=> true,
		'hierarchical'			=> false,
		'menu_position'			=> 6,
		'supports'				=> array('title', 'editor', 'thumbnail'),//Queremos que tenga un titulo un editor y una imagen destacada
		'taxonomies'			=> array('category'),//Darle una categoría
		);

		register_post_type('especialidades', $args);
}

//WIDGETS

function lapizzeria_widgets(){
	register_sidebar( array(
	'name'	 =>		'Blog sidebar',//titulo en el backoffice de apariencia>widgets
	'id'	 =>		'blog_sidebar',
	'before_widget'	 =>		'<div class="widget">',
	'after_tittle'	 =>		'</div>',	
	'before_tittle'	 =>		'<h3>',//El titulo de Buscar
	'after_tittle'	 =>		'</h3>',


	));
}
//Hacemos hook
add_action('widgets_init','lapizzeria_widgets');

?>