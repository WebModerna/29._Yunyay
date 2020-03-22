<?php
// Tarifas
function temporada() {

	$labels = array(
		'name'                  => _x( 'Tarifas', 'Post Type General Name', 'yunyay' ),
		'singular_name'         => _x( 'Tarifa', 'Post Type Singular Name', 'yunyay' ),
		'menu_name'             => __( 'Tarifas', 'yunyay' ),
		'name_admin_bar'        => __( 'Tarifas', 'yunyay' ),
		'archives'              => __( 'Tarifas', 'yunyay' ),
		'parent_item_colon'     => __( 'Tarifa superior:', 'yunyay' ),
		'all_items'             => __( 'Todas las Tarifas', 'yunyay' ),
		'add_new_item'          => __( 'Agregar una temporada de tarifa', 'yunyay' ),
		'add_new'               => __( 'Agregar una nueva', 'yunyay' ),
		'new_item'              => __( 'Nueva tarifa', 'yunyay' ),
		'edit_item'             => __( 'Editar la tarifa', 'yunyay' ),
		'update_item'           => __( 'Actualizar la tarifa', 'yunyay' ),
		'view_item'             => __( 'Ver tarifa', 'yunyay' ),
		'search_items'          => __( 'Buscar Tarifas', 'yunyay' ),
		'not_found'             => __( 'No hay tarifas cargadas. Está vacío.', 'yunyay' ),
		'not_found_in_trash'    => __( 'Vacío', 'yunyay' ),
		'featured_image'        => __( 'Imagen destacada', 'yunyay' ),
		'set_featured_image'    => __( 'Colocar una imagen destacada del tarifa', 'yunyay' ),
		'remove_featured_image' => __( 'Remover la imagen', 'yunyay' ),
		'use_featured_image'    => __( 'Usar como una imagen principal', 'yunyay' ),
		'insert_into_item'      => __( 'Insertar dentro de la tarifa', 'yunyay' ),
		'uploaded_to_this_item' => __( 'Actualizar todas las tarifas', 'yunyay' ),
		'items_list'            => __( 'Listado de Tarifas', 'yunyay' ),
		'items_list_navigation' => __( 'Navegar por el listado de Tarifas', 'yunyay' ),
		'filter_items_list'     => __( 'Filtrar el listado de tarifas', 'yunyay' ),
	);
	$args = array(
		'label'                 => __( 'Tarifario', 'yunyay' ),
		'description'           => __( 'Nuestras Tarifas', 'yunyay' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		// 'menu_icon'             => 'dashicons-coins',
		'menu_icon'				=> get_stylesheet_directory_uri() . '/img/pesos.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var'             => '$equipo_trabajo',
		'capability_type'       => 'page',
	);
	register_post_type( 'temporada_tarifa', $args );
}
add_action( 'init', 'temporada', 0 );
;?>