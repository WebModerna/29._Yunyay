<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
/*function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}*/
function optionsframework_option_name()
{

	// Nombre de la plantilla
	$themename = wp_get_theme();
	$themename = preg_replace("/W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'yunyay'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */


function optionsframework_options()
{
	//Pestaña Configuración general
	$options[]	=	array(
	'name'	=>	__('Configuración General', 'options_framework_theme'),
	'type'	=>	'heading');

	// Cambio del logo
	$options[]	=	array(
	'name'	=>	__('Logotipo del Sitio Web', 'options_check'),
	'desc'	=>	__('Selecciona el logo a mostrar en la web, tamaño 300px x 300px.', 'options_check'),
	'id'	=>	'logo_uploader',
	'type'	=>	'upload');

	/*// Titular del Portfolio de la home
	$options[]	=	array(
		'name'			=>	__('Titular del Portfolio de la home', 'options_framework_theme'),
		'desc'			=>	__('Introduca un titular para el portfolio de la home.', 'options_framework_theme'),
		'id'			=>	'portfolio_home',
		'placeholder'	=>	'Titular de ejemplo...',
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido o mensaje para el porfolio de la home
	$options[]	=	array(
		'name'			=>	__('Mensaje para el porfolio de la home', 'options_framework_theme'),
		'desc'			=>	__('Introduzca un contenido o mensaje para el porfolio de la home.', 'options_framework_theme'),
		'id'			=>	'contenido_portfolio_home',
		'placeholder'	=>	'Contenido de ejemplo...',
		'class'			=>	'',
		'type'			=>	'textarea'
	);*/

	// Meta: keywords
	$options[]	=	array(
		'name'			=>	__('Meta: Palabras claves', 'options_framework_theme'),
		'desc'			=>	__('Introducir palabras (separadas por comas) claves de la web que son útiles para algunos buscadores. Muy importantes para SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_keywords2',
		'placeholder'	=>	'palabra1, palabra2, palabra3...',
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Meta: Descripción
	$options[]	=	array(
		'name'			=>	__('Meta: Descripción de la web', 'options_framework_theme'),
		'desc'			=>	__('Introducir una descripción breve acerca de lo que trata esta web. Muy importante para el SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_description',
		'placeholder'	=>	'Este sitio web está dedicado a la ...',
		'class'			=>	'',
		'type'			=>	'textarea',
	);

	// Google Analitics
	$options[]	=	array(
		'name'			=>	__('Google Analitycs', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el script de Google Analitycs.', 'options_framework_theme'),
		'id'			=>	'google_analitycs',
		'placeholder'	=>	'var _gaq = _gaq || []; _gaq.push(["_setAccount", "UA-40089469-1"]); _gaq.push(["_trackPageview"]); etc...',
		'class'			=>	'',
		'type'			=>	'textarea'
	);


	/*====================================================================================*/
	/* =================== Pestaña información de contacto ============================== */
	$options[]	=	array(
	'name'	=>	__('Redes Sociales', 'options_framework_theme'),
	'type'	=>	'heading' );

	// Facebook
	$options[] = array(
		'name'			=>	__('Facebook', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el enlace a Facebook.', 'options_framework_theme'),
		'id'			=>	'facebook_contact',
		'class'			=>	'',
		'placeholder'	=>	'www.facebook.com/usuario',
		'type'			=>	'text'
	);


	// Twitter
	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('Introduzca su enlace a Twitter.', 'options_framework_theme'),
		'id' => 'twitter_contact',
		'placeholder' => 'www.twitter.com/usuario',
		'class' => '',
		'type' => 'text'
	);

	// Instagram
	$options[] = array(
		'name' => __('Instagram', 'options_framework_theme'),
		'desc' => __('Introduzca su usuario de Instagram.', 'options_framework_theme'),
		'id' => 'instagram_contact',
		'placeholder' => 'usuario.de.instagram',
		'class' => '',
		'type' => 'text'
	);

	/*// LinkedIn
	$options[] = array(
		'name' => __('LinkedIn', 'options_framework_theme'),
		'desc' => __('Introduzca su enlace al perfil de LinkedIn.', 'options_framework_theme'),
		'id' => 'linkedin_contact',
		'placeholder' => 'www.linkedin.com/usuario',
		'class' => '',
		'type' => 'text'
	);*/

	// Google+
	$options[] = array(
		'name' => __('Google+', 'options_framework_theme'),
		'desc' => __('Introduzca su enlace a Google+.', 'options_framework_theme'),
		'id' => 'google_plus_contact',
		'placeholder' => 'plus.google.com/usuario',
		'class' => '',
		'type' => 'text'
	);

	/*// GitHub
	$options[] = array(
		'name' => __('GitHub', 'options_framework_theme'),
		'desc' => __('Introduzca su enlace a GitHub.', 'options_framework_theme'),
		'id' => 'github_contact',
		'placeholder' => 'github.com/usuario',
		'class' => '',
		'type' => 'text'
	);*/

	// Add This. Solo el enlace al script
	/*$options[] = array(
		'name' => __('Compartir en Redes Sociales', 'options_framework_theme'),
		'desc' => __('Introduzca el enlace a AddThis.', 'options_framework_theme'),
		'id' => 'add_this',
		'placeholder' => '<a class="addthis_button alignright" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c8ff9282b8657a0">...',
		'class' => '',
		'type' => 'textarea'
	);*/
	$options[] = array(
		'name' => __('Compartir en Redes Sociales', 'options_framework_theme'),
		'desc' => __('Introduzca solamente el script de AddThis.', 'options_framework_theme'),
		'id' => 'add_this_script',
		'placeholder' => '//s7.addthis.com/js/...',
		'class' => '',
		'type' => 'text'
	);


	$facebook_contact = of_get_option('facebook_contact','');
	$twitter_contact = of_get_option('twitter_contact','');
	$linkedin_contact = of_get_option('linkedin_contact', '');
	$google_plus_contact = of_get_option('google_plus_contact','');
	$email_contact = of_get_option('email_contact','');
	$email_contact_ventas = of_get_option('email_contact_ventas','');
	$background_de_la_web = of_get_option('background_de_la_web','');

	/* para guardar los campos en variable y para mostrarlos con un condicional
	<ul>
		<?php
			if($tel_contact){echo "<li><strong>Teléfono:</strong>" . $tel_contact . "</li>";}
			if($email_contact){ echo "<li><strong>Email:</strong>" . $email_contact . "</li>";}
			if($dir_contact){ echo"<li><strong>Dirección:</strong>" . $dir_contact . "</li>";}
			if($cp_contact){echo"<li><strong>Cp:</strong>" . $cp_contact . "</li>";}
		?>
	</ul>

	*/

	/* ============================================================================== */
	/* Panel de la home page =========================================================*/
	$options[] = array(
	'name' => __('Datos de Contacto', 'options_framework_theme'),
	'type' => 'heading');

	// Email de contacto
	$options[] = array(
		'name' => __('E-mail de contacto', 'options_framework_theme'),
		'desc' => __('Introduzca el Email de contacto, se mostrará al pie del sitio web en un ícono.', 'options_framework_theme'),
		'id' => 'email_contact',
		'placeholder' => 'tu-mail@lo-que-sea.com.ar',
		'class' => '',
		'type' => 'text'
	);

/*	// Email de Ventas
	$options[] = array(
		'name' => __('E-mail de Ventas', 'options_framework_theme'),
		'desc' => __('Introduzca el Email para el departamento de Ventas, se mostrará al pie del sitio web en un ícono.', 'options_framework_theme'),
		'id' => 'email_contact_ventas',
		'placeholder' => 'ventas@lo-que-sea.com.ar',
		'class' => '',
		'type' => 'text'
	);*/

	// Teléfono Fijo
	$options[] = array(
		'name' => __('Teléfono Fijo', 'options_framework_theme'),
		'desc' => __('Introduzca su teléfono fijo incluyendo el código de área.', 'options_framework_theme'),
		'id' => 'telefono_fijo',
		'placeholder' => '0351-4882213',
		'class' => 'mini',
		'type' => 'text'
	);

	// Teléfono Celular
	$options[] = array(
		'name' => __('Teléfono Celular', 'options_framework_theme'),
		'desc' => __('Introduzca su teléfono móvil en modo celular.', 'options_framework_theme'),
		'id' => 'telefono_celular',
		'placeholder' => '351882213',
		'class' => 'mini',
		'type' => 'text'
	);

	// Campo de texto
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 7,
		'tinymce' => array( 'plugins' => 'wordpress, wplink' ),
	);

	// Dirección
	$options[] = array(
		'name' => __('Dirección', 'options_framework_theme'),
		'desc' => __('Introduzca calle, número, ciudad y provincia.', 'options_framework_theme'),
		'id' => 'direccion_web',
		'placeholder' => __('Man Sartín 453, Dpto. 3, Las Catitas, Tierra del Agua.', 'yunyay'),
		'class' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings,
	);
	// Lunes a viernes de 9 a 13 hs y de 16 a 20 hs sábados de 9 a 13 hs.
	// Días y horario de atención al público
	/*$options[] = array(
		'name' => __('Horario de atención', 'options_framework_theme'),
		'desc' => __('Introduzca los días de la semana y el horario de atención al público.', 'options_framework_theme'),
		'id' => 'horario_web',
		'placeholder' => __('Domingos a Martes; de 2 de la tarde a 14hs.', 'yunyay'),
		'class' => '',
		'type' => 'text'
	);*/


	/* ============================================================================== */
	/* Panel de la home page =========================================================*/
	/*$options[] = array(
	'name'		=>	__('Mensajes Centrales. 3 ó 4.', 'options_framework_theme'),
	'type'		=>	'heading',
	);

	// =================================== MENSAJE 1
	// Imagen del mensaje 1
	$options[] = array(
	'name'			=>	__('Mensaje 1', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 300px por 300px.', 'options_check'),
	'id'			=>	'mensaje_1__imagen',
	'type'			=>	'upload',
	);
	// Imagen del mensaje 1
	$options[] = array(
	'name'			=>	__('Mensaje 1', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_1__imagen_x2',
	'type'			=>	'upload',
	);

	// Titular del mensaje 1
	$options[] = array(
		'name'			=>	__('Título del Mensaje 1.', 'options_framework_theme'),
		'desc'			=>	__('Introduzca titular que se mostrará en el Mensaje 1.', 'options_framework_theme'),
		'id'			=>	'mensaje_1__titulo',
		'placeholder'	=> __('Título de ejemplo 1.', 'yunyay'),
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido del Mensaje 1
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 7,
		'tinymce' => array( 'plugins' => 'wordpress, wplink' ),
	);
	$options[] = array(
		'name' => __('Contenido del Mensaje 1', 'options_framework_theme'),
		'desc' => __('Introduzca el contenido que se mostrará en el Mensaje 1.', 'options_framework_theme'),
		'id' => 'mensaje_1__contenido',
		'placeholder' => __('Contenido ...', 'yunyay'),
		'class' => 'big',
		'type' => 'editor',
		'settings' => $wp_editor_settings,
	);

	// ================================ MENSAJE 2
	// Imagen del Mensaje 2
	$options[] = array(
	'name'			=>	__('Mensaje 2', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 300px por 300px.', 'options_check'),
	'id'			=>	'mensaje_2__imagen',
	'type'			=>	'upload',
	);
	// Imagen del Mensaje 2
	$options[] = array(
	'name'			=>	__('Mensaje 2', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_2__imagen_x2',
	'type'			=>	'upload',
	);

	// Titular del Mensaje 2
	$options[] = array(
		'name'			=>	__('Título del Mensaje 2.', 'options_framework_theme'),
		'desc'			=>	__('Introduzca titular que se mostrará en el Mensaje 2.', 'options_framework_theme'),
		'id'			=>	'mensaje_2__titulo',
		'placeholder'	=> __('Título de ejemplo 2.', 'yunyay'),
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido del Mensaje 2
	$options[] = array(
		'name' => __('Contenido', 'options_framework_theme'),
		'desc' => __('Introduzca el contenido del Mensaje 2.', 'options_framework_theme'),
		'id' => 'mensaje_2__contenido',
		'placeholder' => __('Contenido ...', 'yunyay'),
		'class' => 'big',
		'type' => 'editor',
		'settings' => $wp_editor_settings,
	);

	// =================================== MENSAJE 3
	// Imagen del Mensaje 3
	$options[] = array(
	'name'			=>	__('Mensaje 3', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 300px por 300px.', 'options_check'),
	'id'			=>	'mensaje_3__imagen',
	'type'			=>	'upload',
	);
	// Imagen del Mensaje 3
	$options[] = array(
	'name'			=>	__('Mensaje 3', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_3__imagen_x2',
	'type'			=>	'upload',
	);

	// Titular del Mensaje 3
	$options[] = array(
		'name'			=>	__('Título del Mensaje 3.', 'options_framework_theme'),
		'desc'			=>	__('Introduzca un titular que se mostrará en el Mensaje 3.', 'options_framework_theme'),
		'id'			=>	'mensaje_3__titulo',
		'placeholder'	=> __('Título de ejemplo 3.', 'yunyay'),
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido del Mensaje 3
	$options[] = array(
		'name' => __('Contenido', 'options_framework_theme'),
		'desc' => __('Introduzca el contenido que se mostrará en el Mensaje 3.', 'options_framework_theme'),
		'id' => 'mensaje_3__contenido',
		'placeholder' => __('Contenido ...', 'yunyay'),
		'class' => 'big',
		'type' => 'editor',
		'settings' => $wp_editor_settings,
	);


	// =================================== MENSAJE 4
	// Imagen del Mensaje 4
	$options[] = array(
	'name'			=>	__('Mensaje 4', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 300px por 300px.', 'options_check'),
	'id'			=>	'mensaje_4__imagen',
	'type'			=>	'upload',
	);
	// Imagen del Mensaje 4
	$options[] = array(
	'name'			=>	__('Mensaje 4', 'options_check'),
	'desc'			=>	__('Selecciona una imagen cuadrada de 600px por 600px', 'options_check'),
	'id'			=>	'mensaje_4__imagen_x2',
	'type'			=>	'upload',
	);

	// Titular del Mensaje 4
	$options[] = array(
		'name'			=>	__('Título del Mensaje 4.', 'options_framework_theme'),
		'desc'			=>	__('Introduzca un titular que se mostrará en el Mensaje 4.', 'options_framework_theme'),
		'id'			=>	'mensaje_4__titulo',
		'placeholder'	=> __('Título de ejemplo 4.', 'yunyay'),
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido del Mensaje 4
	$options[] = array(
		'name' => __('Contenido', 'options_framework_theme'),
		'desc' => __('Introduzca el contenido que se mostrará en el Mensaje 4.', 'options_framework_theme'),
		'id' => 'mensaje_4__contenido',
		'placeholder' => __('Contenido ...', 'yunyay'),
		'class' => 'big',
		'type' => 'editor',
		'settings' => $wp_editor_settings,
	);*/

	/*
	// Desafectado por no usarse
	// Almacenamos las páginas de wordpress
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Seleccione una página de destino', 'yunyay');
	foreach ($options_pages_obj as $page)
	{
		$options_pages[$page->ID] = $page->post_title;
	}

	// Elegir la página al cual se enlazará el botón del E-Book 3
	$options[] = array(
		'name' => __('Redirección del botón N° 3', 'options_framework_theme'),
		'desc' => __('Elegir a cual página se enlazará el botón.', 'options_framework_theme'),
		'id' => 'enlace_boton_3',
		'std' => 'three',
		'type' => 'select',
		'class' => 'small', //mini
		'options' => $options_pages
		);

	// Elegir la página al cual se enlazará el botón principal
	$options[] = array(
		'name' => __('Redirección del botón N° 4', 'options_framework_theme'),
		'desc' => __('Elegir a cual página se enlazará el botón.', 'options_framework_theme'),
		'id' => 'enlace_boton_4',
		'std' => 'three',
		'type' => 'select',
		'class' => 'small', //mini
		'options' => $options_pages
		);
	*/

	return $options;
}
