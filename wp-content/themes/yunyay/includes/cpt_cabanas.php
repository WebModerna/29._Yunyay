<?php
// CPT de las cabañas

add_action( 'init', 'register_cpt_cabana' );

function register_cpt_cabana()
{

    $labels = array( 
        'name' => __( 'Cabañas', 'yunyay' ),
        'singular_name' => __( 'Cabaña', 'yunyay' ),
        'add_new' => __( 'Agregar nueva', 'yunyay' ),
        'add_new_item' => __( 'Agregar nueva Cabaña', 'yunyay' ),
        'edit_item' => __( 'Editar Cabaña', 'yunyay' ),
        'new_item' => __( 'Nueva Cabaña', 'yunyay' ),
        'view_item' => __( 'Ver Cabaña', 'yunyay' ),
        'search_items' => __( 'Buscar Cabañas', 'yunyay' ),
        'not_found' => __( 'No hay cabañas', 'yunyay' ),
        'not_found_in_trash' => __( 'No hay cabañas en la papelera', 'yunyay' ),
        'parent_item_colon' => __( 'Listado de Cabañas:', 'yunyay' ),
        'menu_name' => __( 'Cabañas', 'yunyay' )
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Tipo de cabañas de uno, dos, tres o etc... ambientes',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-multisite',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can__xport' => true,
        'rewrite' => true,
        'capability_type' => 'page'
    );
    register_post_type( 'cabana', $args );
}

?>