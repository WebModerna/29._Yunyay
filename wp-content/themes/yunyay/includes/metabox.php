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
				// 'std'     => __( 'WYSIWYG default value', 'yunyay' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 8,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),



			// RADIO BUTTONS
			/*array(
				'name'    => __( 'Radio', 'yunyay' ),
				'id'      => "yunyay_radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'yunyay' ),
					'value2' => __( 'Label2', 'yunyay' ),
				),
			),
			// SELECT BOX
			array(
				'name'        => __( 'Select', 'yunyay' ),
				'id'          => "yunyay_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'yunyay' ),
					'value2' => __( 'Label2', 'yunyay' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select an Item', 'yunyay' ),
			),
			// HIDDEN
			array(
				'id'   => "yunyay_hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => __( 'Hidden value', 'yunyay' ),
			),
			// PASSWORD
			array(
				'name' => __( 'Password', 'yunyay' ),
				'id'   => "yunyay_password",
				'type' => 'password',
			),*/

/*
		),
		'validation' => array(
			'rules'    => array(
				"yunyay_password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"yunyay_password" => array(
					'required'  => __( 'Password is required', 'yunyay' ),
					'minlength' => __( 'Password must be at least 7 characters', 'yunyay' ),
				),
			)
		)
	);
*/

			// Precio
			array(
				'name' => __( 'Precio en $', 'yunyay' ),
				'id'   => "yunyay_precio",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),

			// Precio u$s
			array(
				'name' => __( 'Precio en U$s', 'yunyay' ),
				'id'   => "yunyay_precio_dolar",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
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
			// COLOR
			array(
				'name' => __( 'Color picker', 'yunyay' ),
				'id'   => "yunyay_color",
				'type' => 'color',
			),
			// AUTOCOMPLETE
			array(
				'name'    => __( 'Autocomplete', 'yunyay' ),
				'id'      => "yunyay_autocomplete",
				'type'    => 'autocomplete',
				// Options of autocomplete, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'yunyay' ),
					'value2' => __( 'Label2', 'yunyay' ),
				),
				// Input size
				'size'    => 30,
				// Clone?
				'clone'   => false,
			),
			// EMAIL
			array(
				'name' => __( 'Email', 'yunyay' ),
				'id'   => "yunyay_email",
				'desc' => __( 'Email description', 'yunyay' ),
				'type' => 'email',
				'std'  => 'name@email.com',
			),
			// RANGE
			array(
				'name' => __( 'Range', 'yunyay' ),
				'id'   => "yunyay_range",
				'desc' => __( 'Range description', 'yunyay' ),
				'type' => 'range',
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
				'std'  => 0,
			),
			// URL
			array(
				'name' => __( 'URL', 'yunyay' ),
				'id'   => "yunyay_url",
				'desc' => __( 'URL description', 'yunyay' ),
				'type' => 'url',
				'std'  => 'http://google.com',
			),
			// OEMBED
			array(
				'name' => __( 'oEmbed', 'yunyay' ),
				'id'   => "yunyay_oembed",
				'desc' => __( 'oEmbed description', 'yunyay' ),
				'type' => 'oembed',
			),
			// SELECT ADVANCED BOX
			array(
				'name'        => __( 'Select', 'yunyay' ),
				'id'          => "yunyay_select_advanced",
				'type'        => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'yunyay' ),
					'value2' => __( 'Label2', 'yunyay' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Item', 'yunyay' ),
			),
			// TAXONOMY
			array(
				'name'    => __( 'Taxonomy', 'yunyay' ),
				'id'      => "yunyay_taxonomy",
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy' => 'category',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
					'type'     => 'checkbox_list',
					// Additional arguments for get_terms() function. Optional
					'args'     => array()
				),
			),
			// POST
			array(
				'name'        => __( 'Posts (Pages)', 'yunyay' ),
				'id'          => "yunyay_pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => __( 'Select an Item', 'yunyay' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => __( 'WYSIWYG / Rich Text Editor', 'yunyay' ),
				'id'      => "yunyay_wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => __( 'WYSIWYG default value', 'yunyay' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
			// CHECKBOX LIST
			array(
				'name'    => __( 'Checkbox list', 'yunyay' ),
				'id'      => "yunyay_checkbox_list",
				'type'    => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'yunyay' ),
					'value2' => __( 'Label2', 'yunyay' ),
				),
			),
			*/

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'yunyay_1', // Not used, but needed
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

			/*
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
				'id'    => "meta_paginas_meta_keywords",
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
				'id'   => "meta_paginas_meta_descripcion",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
		));
	return $meta_boxes;
};