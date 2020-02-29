<?php 
// El segundo campo de contenido
function segundo_contenido( $meta_boxes ) {
	$prefix = 'yunyay_';

	$meta_boxes[] = array(
		'id' => 'ID_segundo_contenido',
		'title' => esc_html__( 'Segundo Contenido', 'yunyay' ),
		'post_types' => array('page' ),
		'context' => 'after_editor',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'wysiwyg_1',
				'name' => esc_html__( 'Segundo Contenido', 'yunyay' ),
				'type' => 'wysiwyg',
				'desc' => esc_html__( 'Colocar aquí el segundo contenido', 'yunyay' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'segundo_contenido' );


?>