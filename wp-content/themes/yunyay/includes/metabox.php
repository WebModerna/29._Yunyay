<?php 
// El segundo campo de contenido
function tarifas_condicones_no_show( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'tarifas_condicones_no_show',
		'title' => esc_html__( 'segundo contenido', 'yunyay' ),
		'post_types' => array('page' ),
		'context' => 'after_editor',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'segundo_campo',
				'type' => 'wysiwyg',
				'desc' => esc_html__( 'Segundo campo de contenido', 'yunyay' ),
				'raw' => 'false'
			)
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'tarifas_condicones_no_show' );


?>