<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'yunyay_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "yunyay" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function yunyay_register_meta_boxes( $meta_boxes )
{
	/**
	* prefix of meta keys (optional)
	* Use underscore (_) at the beginning to make keys hidden
	* Alt.: You also can make prefix empty to disable it
	*/
	// Better has an underscore as last sign
	$prefix = 'yunyay_';

	// 1st meta box
	$meta_boxes[] = array(

		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Tarifario para las cabañas', 'yunyay' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'temporada_tarifa' ),

		// 'post_types' => array( 'home_page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',

		// Auto save: true, false (default). Optional.
		'autosave'   => true,

		// List of meta fields
		'fields'     => array(



			// POST
			array(
				'name'			=> __( 'Seleccionar una cabaña', 'yunyay' ),
				'id'          => "yunyay_pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'cabana',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder'	=> __( 'Seleccionar una cabaña', 'yunyay' ),
				'desc'  		=> __( 'Monoambiente, dos ambientes, etc...', 'yunyay' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
				'clone' => true,
			),
			
			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'yunyay_1',
			),

			// Cantidad de personas
			array(
				'name'  => __( 'Cantidad de personas por cabañas', 'yunyay' ),
				'id'    => "yunyay_personas",
				'desc'  => __( '1, 2, 3, etc... una cantidad por cada cabaña.', 'yunyay' ),
				'type'  => 'number',
				'std'   => __( '', 'yunyay' ),
				'clone' => true,
			),

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'yunyay_2',
			),
			

			// Precio
			array(
				'name'	=> __( 'Tarifas en $', 'yunyay' ),
				'id'	=> "yunyay_precio",
				'type'	=> 'number',
				'min'	=> 0,
				'desc'	=> __( '$1000, $2.000, etc... un precio por cada cabaña.', 'yunyay' ),
				'step'	=> 1,
				'clone' => true,
			),

			// TEXTAREA
			array(
				'name' => __( 'Descripción', 'yunyay' ),
				'desc' => __( '¿En qué consiste esta temporada?', 'yunyay' ),
				'id'   => "descripcion_temporada",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),



			/*
			// Reservas
			array(
				'name'       => __( 'Calendario de Reservas', 'yunyay' ),
				'id'         => "yunyay_date",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'		=> __( ' día-mes-año', 'yunyay' ),
					'dateFormat'		=> __( '"dd-mm-yy"', 'yunyay' ),
					'changeMonth'		=> true,
					'changeYear'		=> true,
					'showButtonPanel'	=> true,
					'autoSize'			=> true,
					'selectMultiple'	=> true,
				),
			),
			// DATETIME
			array(
				'name'       => __( 'Datetime picker', 'yunyay' ),
				'id'         => $prefix . 'datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			// TIME
			array(
				'name'       => __( 'Time picker', 'yunyay' ),
				'id'         => $prefix . 'time',
				'type'       => 'time',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),


			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Imágenes y Fotos', 'yunyay' ),
				// Not used but needed for plugin
				'id'   => 'fake_id',
				'desc' => __( 'Las fotos deben ser mínimo de 2000px de ancho. Pesan aproximadamente 1 a 2 Megabytes', 'yunyay' ),
			),

			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí.', 'yunyay' ),
				'id'               => 'yunyay_imagenes',
				'type'             => 'image_advanced',
				'max_file_uploads' => false,
			),

			
			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Ubicación de la Propiedad en el Mapa', 'yunyay' ),
				// Not used but needed for plugin
				'id'   => 'fake_id',
				'desc' => __( 'Si quieres mostrarlo en el mapa, mueve el puntero hasta la indicación deseada', 'yunyay' ),
			),

			// Ubicación en el Mapa
			array(
				'type'         => 'map',
				'id'			=> 'yunyay_map',
				'width'        => '100%', // Map width, default is 640px. Can be '%' or 'px'
				'height'       => '480px', // Map height, default is 480px. Can be '%' or 'px'
				'zoom'         => 25,  // Map zoom, default is the value set in admin, and if it's omitted - 14
				'marker'       => true, // Display marker? Default is 'true',
				'marker_title' => '', // Marker title when hover
				'info_window'  => '<h3>Info Window Title</h3>Info window content. HTML <strong>allowed</strong>', // Info window content, can be anything. HTML allowed.
				'js_options'   => array(

					// 'mapTypeId'   => 'HYBRID',
					'zoomControl' => true,
					// You can use 'zoom' inside 'js_options' or as a separated parameter
					'zoom'        => 16,
				)
			),*/
			// echo rwmb_meta( 'loc', $args ); // For current post
			// echo rwmb_meta( 'loc', $args, $post_id ); // For another post with $post_id

			// FILE UPLOAD
			/*
			array(
				'name' => __( 'File Upload', 'yunyay' ),
				'id'   => "yunyay_file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Advanced Upload', 'yunyay' ),
				'id'               => "yunyay_file_advanced",
				'type'             => 'file_advanced',
				'max_file_uploads' => false,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE UPLOAD
			array(
				'name' => __( 'Image Upload', 'yunyay' ),
				'id'   => "yunyay_image",
				'type' => 'image',
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name' => __( 'Thickbox Image Upload', 'yunyay' ),
				'id'   => "yunyay_thickbox",
				'type' => 'thickbox_image',
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Image Advanced Upload', 'yunyay' ),
				'id'               => "yunyay_imgadv",
				'type'             => 'image_advanced',
				'max_file_uploads' => 4,
			),
			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí.', 'yunyay' ),
				'id'               => "yunyay_plupload",
				'type'             => 'plupload_image',
				'max_file_uploads' => false,
			),

			// BUTTON
			array(
				'id'   => "yunyay_button",
				'type' => 'button',
				'name' => 'yunyay_map', // Empty name will "align" the button to all field inputs
			),
			*/
		)
	);
	return $meta_boxes;
};



// El segundo contenido
add_filter( 'rwmb_meta_boxes', 'meta_box_segundo_contenido' );
function meta_box_segundo_contenido( $meta_boxes )
{
	// Better has an underscore as last sign
	$prefix = 'meta_';

	// 1st meta box
	$meta_boxes[] = array(

		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'second_content',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Segundo contenido', 'yunyay' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),

		// 'post_types' => array( 'home_page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.

		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.

		'priority'   => 'high',
		// Auto save: true, false (default). Optional.

		'autosave'   => true,
		// List of meta fields

		'fields'     => array(

		// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => __( '', 'yunyay' ),
				'id'      => "yunyay_wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				// 'std'     => __( 'Agregar otro tipo de contenido y aclaraciones.', 'yunyay' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 12,
					'teeny'         => false,
					'media_buttons' => true,
				),
			),
		));
	return $meta_boxes;
};


// Es para las páginas
add_filter( 'rwmb_meta_boxes', 'meta_paginas_register_meta_boxes' );
function meta_paginas_register_meta_boxes( $meta_boxes )
{
	// Better has an underscore as last sign
	$prefix = 'meta_paginas_';

	// 1st meta box
	$meta_boxes[] = array(

		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'estandard',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'S.E.O. y posicionamiento web', 'yunyay' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),

		// 'post_types' => array( 'home_page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.

		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.

		'priority'   => 'high',
		// Auto save: true, false (default). Optional.

		'autosave'   => true,
		// List of meta fields

		'fields'     => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Palabras claves.', 'yunyay' ),
				// Field ID, i.e. the meta key
				'id'    => "meta_keywords",
				// Field description (optional)
				'desc'  => __( 'Palabras claves (keywords) separadas por comas. Son útiles para SEO en algunos buscadores. Máximo 160 caracteres.', 'yunyay' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'yunyay' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
		// TEXTAREA
			array(
				'name' => __( 'Descripción', 'yunyay' ),
				'desc' => __( 'Es una descripción que aparece en el meta description. Es muy recomendable para SEO. Máximo 160 caracteres.', 'yunyay' ),
				'id'   => "meta_descripcion",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
		));
	return $meta_boxes;
};


// Es para las cabañas
add_filter( 'rwmb_meta_boxes', 'cabana_meta_boxes' );
function cabana_meta_boxes( $meta_boxes )
{
	// Better has an underscore as last sign
	$prefix = 'meta_cabana';

	// 1st meta box
	$meta_boxes[] = array(

		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'meta_box_cabana',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Subir las fotos de las cabañas desde aqui', 'yunyay' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'cabana', 'page' ),

		// 'post_types' => array( 'home_page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.

		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.

		'priority'   => 'high',
		// Auto save: true, false (default). Optional.

		'autosave'   => true,
		// List of meta fields

		'fields'     => array(

			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí.', 'yunyay' ),
				'id'               => "yunyay_plupload",
				'type'             => 'plupload_image',
				'max_file_uploads' => false,
			),
		));
	return $meta_boxes;
};

