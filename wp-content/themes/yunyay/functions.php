<?php
/* functions.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
*/

// Los metaboxes
require_once "includes/meta-box/meta-box.php";
require_once "includes/metabox.php";

// Las tarifas
// require_once "includes/tarifa.php";

// Cargar Panel de Opciones
if ( !function_exists( 'optionsframework_init' ) )
{
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/' );
	require_once dirname( __FILE__ ) . '/includes/05._options-framework.php';
}

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function()
{
	jQuery('#example_showhidden').click(function()
	{
		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined)
	{
		jQuery('#section-example_text_hidden').show();
	}
});
</script>

<?php
}
// Permitir comentarios encadenados
function enable_threaded_comments()
{
	if(is_singular() AND comments_open() AND (get_option('thread_comments')==1))
	{
		wp_enqueue_script('comment-reply');
	}
}; 
add_action('get_header','enable_threaded_comments');

// Deshabilitar Iconos Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Agregando un favicon al área de administración
function admin_favicon()
{
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('stylesheet_directory') . '/img/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon', 1);



// Remover clases automáticas del the_post_thumbnail
function the_post_thumbnail_remove_class( $output )
{
	$output = preg_replace( '/class=".*?"/', '', $output );
	return $output;
}
add_filter( 'post_thumbnail_html', 'the_post_thumbnail_remove_class'  );


// Remover atributos de ancho y alto de las imágenes insertadas
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to__ditor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html )
{
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;
};


//Cambiar el logo del login y la url del mismo y el título
function custom_login_logo()
{
	echo '<style type="text/css">
		h1 a
		{
			background: url('.get_bloginfo('stylesheet_directory').'/img/logo_full.png) center center no-repeat !important;
			width: 300px !important;
			height: 150px !important;
			background-size: 50% !important;
		}
		div#login {padding:0 !important;}
		</style>';
};
add_action('login_head', 'custom_login_logo');
function the_url( $url )
{
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );
function change_wp_login_title()
{
	return get_option('blogname');
};
add_filter('login_headertitle', 'change_wp_login_title');


//Permitir svg en las imágenes para cargar.
function cc_mime_types($mimes)
{
	$mimes['svg']='image/svg+xml';return $mimes;
};
add_filter('upload_mimes','cc_mime_types');

// Modifica el pie de página del panel de administarción
function remove_footer_admin()
{
	echo _e('Desarrollado por', 'webmoderna') . ' <a title="'.__('WebModerna | el futuro de la web', 'webmoderna') . '" href="http://www.webmoderna.com.ar" target="_blank"> <img title="WebModerna" src="' . get_bloginfo("stylesheet_directory") . '/img/webmoderna.png" width="150" style="display:inline-block;vertical-align:middle;" alt="WebModerna" /></a>';
};
add_filter('admin_footer_text', 'remove_footer_admin');


// Deshabilitar la edición desde otros programas, el link corto y la versión del WP.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator'); 
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link', 1);
remove_action('wp_head', 'wlwmanifest_link'); 
remove_action('wp_head', 'feed_links__xtra', 3);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');


//Remover clases e ids automáticos de los menúes
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var)
{
	return is_array($var) ? array_intersect($var, array('current-menu-item', 'current_page_item')) : '';
};


// Personalizar las palabras del excerpt; o sea de los pequeños reúmenes.
function custom__xcerpt_length($length)
{
	return 57;
}; 
add_filter('excerpt_length','custom__xcerpt_length');


//Remover versiones de los scripts y css innecesarios
function remove_script_version($src)
{
	$parts = explode('?', $src); return $parts[0];
};
add_filter('script_loader_src','remove_script_version',15,1);
//add_filter('style_loader_src','remove_script_version',15,1);


// Deshabilitar los enlaces automáticos en los comentarios
remove_filter('comment_text','make_clickable',9);


//Cambio del avatar de WordPress por uno personalizado
function nuevoGravatar($avatar_defaults)
{
    $nuevo = get_bloginfo("stylesheet_directory").'/img/favicon-32x32.png';
    $avatar_defaults[$nuevo] = 'Cabañas Yunyay';
    return $avatar_defaults;
}
add_filter('avatar_defaults', 'nuevoGravatar');


//Modificar los campos del perfil de usuario de WordPress
function extra_contact_info($contactmethods)
{
	unset($contactmethods['aim']);
	unset($contactmethods['yim']);
	unset($contactmethods['jabber']);
	$contactmethods['facebook']='Facebook';
	$contactmethods['twitter']='Twitter';
	$contactmethods['google_mas']='Google+';
	$contactmethods['youtube']='YouTube';
	$contactmethods['linkedin']='LinkedIn';
	$contactmethods['perfil_feed']='RSS';
	return $contactmethods;
};
add_filter('user_contactmethods','extra_contact_info');


//Añadir imágenes a los feeds rss
function rss_post_thumbnail($content)
{
	global $post; 
	if(has_post_thumbnail($post->ID))
		{
			$content='<p>'.get_the_post_thumbnail($post->ID).'</p>'.get_the_content();
		};
	return $content;
};
add_filter('the__xcerpt_rss','rss_post_thumbnail');
add_filter('the_content_feed','rss_post_thumbnail');


//Remover versión del WordPress
function remove_wp_version()
{
	return'';
};
add_filter('the_generator','remove_wp_version');


//Eliminar el atributo rel="category tag".
function remove_category_list_rel($output)
{
	return str_replace(' rel="category tag"','',$output);
};
add_filter('wp_list_categories','remove_category_list_rel');
add_filter('the_category','remove_category_list_rel');


//Eliminar css y scripts de comentarios cuando no hagan falta
function clean_header()
{
	wp_deregister_script('comment-reply');
};
add_action('init','clean_header');


//Definir tamaños personalizados de miniaturas - hay que configurarlas
add_theme_support('post-thumbnails', array('post','page', 'cabana'));
add_image_size('custom-thumb-1800-1000', 1800, 1000, true); //Slideshow Inicio - Desktop
add_image_size('custom-thumb-1800-x', 1800, false); 
add_image_size('custom-thumb-1200-666', 1200, 666, true); //Slideshow Inicio - Tablets
add_image_size('custom-thumb-1200-x', 1200, false);
add_image_size('custom-thumb-800-600', 800, 600, true);
add_image_size('custom-thumb-800-x', 1200, false);
add_image_size('custom-thumb-600-334', 600, 334, true); //Slideshow Inicio - Móviles
add_image_size('custom-thumb-600-x', 600, false); 
add_image_size('custom-thumb-500-x', 500, false); //para miniaturas del blog
add_image_size('custom-thumb-100-100', 100, 100, true);

// Añadiendo al listado del gestor de multimedia
add_filter('image_size_names_choose', 'hmuda_image_sizes');
function hmuda_image_sizes($sizes)
{
	$addsizes = array(
		// Tamaños fijos
		"custom-thumb-100-100"		=>	__("Tamaño recortado 1"),
		"custom-thumb-600-334"		=>	__("Tamaño recortado 2"),
		"custom-thumb-800-600"		=>	__("Tamaño recortado 3"),
		"custom-thumb-1200-666"		=>	__("Tamaño recortado 4"),
		"custom-thumb-1800-1000"	=>	__("Tamaño recortado 5"),


		// Tamaños adaptables
		"custom-thumb-500-x"		=>	__("Tamaño adaptable 1"),
		"custom-thumb-600-x"		=>	__("Tamaño adaptable 2"),
		"custom-thumb-800-x"		=>	__("Tamaño adaptable 3"),
		"custom-thumb-1200-x"		=>	__("Tamaño adaptable 4"),
		"custom-thumb-1800-x"		=>	__("Tamaño adaptable 5"),
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}


// Habilitar la compresión de imágenes
// add_filter( 'jpeg_quality', create_function( '', 'return 50;' ) );


//Registrar las menúes de navegación
register_nav_menus ( array(
	'header_nav'  => __( 'Menú Principal',  'yunyay' ),
	'footer_nav'  => __( 'Menú Secundario', 'yunyay' )
	)
);

// Desactivar el script de embebidos
function my_deregister_scripts()
{
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


// Añadiendo cabeceras de seguridad
function add_security_headers()
{
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'X-XSS-Protection: 1;mode=block' );
}
add_action( 'send_headers', 'add_security_headers' );

// Agregar nofollow a los enlaces externos
function auto_nofollow( $content )
{
    return preg_replace_callback( '/<a>]+/', 'auto_nofollow_callback', $content );
}
function auto_nofollow_callback( $matches )
{
    $link = $matches[0];
    $site_link = get_bloginfo('url'); 
    if (strpos($link, 'rel') === false)
    {
        $link = preg_replace("%(href=S(?!$site_link))%i", 'rel="nofollow" $1', $link);
    }
    elseif (preg_match("%href=S(?!$site_link)%i", $link))
    {
        $link = preg_replace('/rel=S(?!nofollow)S*/i', 'rel="nofollow"', $link);
    }
    return $link;
}
add_filter('comment_text', 'auto_nofollow');


//Habilitar botones de edición avanzados
function habilitar_mas_botones($buttons)
{
	$buttons[]='hr';
	$buttons[]='sub';
	$buttons[]='sup';
	$buttons[]='fontselect';
	$buttons[]='fontsizeselect';
	$buttons[]='cleanup';
	$buttons[]='styleselect';
	return $buttons;
};
add_filter("mce_buttons_3","habilitar_mas_botones");


// Agregar varias imágenes a las entradas y páginas
function add_custom_meta_box() {
	add_meta_box(
	'custom_meta_box',
	'<strong>Subir las fotos del producto desde aquí</strong>',
	'show_custom_meta_box',
	'page',
	'normal',
	'high');

	add_meta_box(
	'custom_meta_box',
	'<strong>Subir las fotos del producto desde aquí</strong>',
	'show_custom_meta_box',
	'cabana',
	'normal',
	'high');
};
add_action('add_meta_boxes', 'add_custom_meta_box');


// Para imágenes cargamos el script sólo si estamos en páginas.
function add_admin_scripts ($hook)
{
	global $post;
	if ( $hook == 'post-new.php' || $hook == 'post.php' )
	{
		wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/js/custom-js.js');
	}
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

//Nombre del campo personalizado.
$prefix = 'custom_';
$custom_meta_fields = array( // Dentro de este array podemos incluir más tipos
	 array(
	   'label'  => 'Fotos',
	   'desc'   => '<strong>IMPORTANTE!!: </strong>Las imágenes deben ser mínimo de <strong><i style="color:red;">2048px (ancho) por 1536px (alto);</i></strong> ya que hay que optimizar para Tablets y Móviles, es muy importante cargar imágenes al doble del tamaño en el cual van a aparecer en la página web (A las imágenes más chicas o de diferentes tamaños, el sistema las cortará autmáticamente). Tiene que ser de esta forma para que se pueda optimizar y ver correctamente en los dispositivos con tecnología Retina Display. Estos aparatos lo que hacen es cuadriplicar la densidad en píxeles; por lo tanto una foto común ser vería en esos dispositivos en la mitad de su tamaño real (en el mejor de los casos); o si no, horriblemente pixelada (lo más común).
	  ',
	   'id'     => $prefix.'imagenrepetible',
	   'type'   => 'imagenrepetible' ));

// Función show custom metabox
function show_custom_meta_box()
{
	global $custom_meta_fields, $post;
	
	// Usamos nonce para verificación
    // echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
    // Reemplazé por lo de más abajo para desaparecer los errores del depurador
    
    wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' );
 	// Creamos la tabla de campos personalizados y empezamos un loop con todos ellos
	
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field)
	{
		// Hacemos un loop con todos los campos personalizados
		// obtenemos el valor del campo personalizado si existe para este $post->ID
		$meta = get_post_meta($post->ID, $field['id'], true);
		// comenzamos una fila de la tabla
		echo '<tr><th><label for="'.$field['id'].'">'.$field['label'].'</label></th><td>';
		switch($field['type'])
		{
			case 'imagenrepetible':
			$image = get_stylesheet_directory_uri().'/img/gravatar.png';

			echo '<i class="custom_default_image" style="display:none">'.$image.'</i>';

			echo '<ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
			$i = 0;
	if ($meta)
	{
		// Si get_post_meta nos ha dado valores, hacemos un foreach
		foreach($meta as $row)
		{

		// Obtenemos la imagen en su tamaño máximo. Podéis poner en su lugar thumbnail, medium o large      
		$image = wp_get_attachment_image_src($row, 'custom-thumb-500-x');

		// la primera parte de wp_get_attachment_image_src nos da su url.
		$image = $image[0]; ?>
	<li>
		<i class="sort hndle" style="float:left;"><img src="<?php echo get_stylesheet_directory_uri().'/img/drag_drop.gif';?>" />&nbsp;&nbsp;&nbsp;</i>

	<input name="<?php echo $field['id'] . '['.$i.']'; ?>" id="<?php echo $field['id']; ?>" type="hidden" class="custom_upload_image" value="<?php echo $row; ?>" />

	<img src="<?php echo $image; ?>" class="custom_preview_image" alt="" width="200"/><br />

	<input class="custom_upload_image_button button" type="button" value="Seleccionar imagen" />


	<small><a href="#" class="custom_clear_image_button">Eliminar imagen</a></small>                      
	&nbsp;&nbsp;&nbsp;<a class="repeatable-remove button" href="#">Quitar fila</a>
</li>
	<?php $i++;
}
	} else { ?>

<li><i class="sort hndle" style="float:left;"><img src="<?php echo get_stylesheet_directory_uri().'/img/gravatar.png';?>" />&nbsp;&nbsp;&nbsp;</i>
	<input name="<?php echo $field['id'] . '['.$i.']'; ?>" id="<?php echo $field['id']; ?>" type="hidden" class="custom_upload_image" value="<?php echo $row; ?>" />
	<img src="<?php echo $image; ?>" class="custom_preview_image" alt="" width="200" /><br />
	<input class="custom_upload_image_button button" type="button" value="Seleccionar imagen" />
	<small><a href="#" class="custom_clear_image_button">Eliminar imagen</a></small>
	&nbsp;&nbsp;&nbsp;<a class="repeatable-remove button" href="#">Quitar fila</a>
</li>
<?php } ?>
</ul><br />

<a class="repeatable-add button-primary" href="#">+ Agregar Imagen</a>

<br clear="all" /><br /><p class="description"><?php echo $field['desc']; ?></p>
<?php break;}
	echo '</td></tr>';}
	echo '</table>';
};

// Grabar los datos de las imágenes subidas.
function save_custom_meta($post_id)
{
	global $custom_meta_fields;

	// verificamos usando nonce
	// if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
	// Reemplazé por lo de más abajo para desaparecer los errores del depurador.
    if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
    return $post_id;
	
	// comprobamos si se ha realizado una grabación automática, para no tenerla en cuenta
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	return $post_id;

	// comprobamos que el usuario puede editar
	if ('page' == $_POST['post_type'])
	{
		if (!current_user_can('edit_page', $post_id))
		return $post_id;
		}
		elseif (!current_user_can('edit_post', $post_id))
		{
			return $post_id;
		}

	foreach ($custom_meta_fields as $field)
	{
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
	if ($new && $new != $old)
	{
		update_post_meta($post_id, $field['id'], $new);
	}
	elseif ('' == $new && $old)
	{
		delete_post_meta($post_id, $field['id'], $old);}
	}
};
add_action('save_post', 'save_custom_meta');


// Paginación avanzada
function pagination($pages = '', $range = 4)
{
	$pagina_palabra = __('Página', 'yunyay');
	$de_palabra = __('de', 'yunyay');
	$showitems = ($range * 2)+1; 
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}  
	if(1 != $pages)
	{
		echo "<ul class='pagination'><li>".$pagina_palabra." ".$paged." ".$de_palabra." ".$pages."</li>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				 echo ($paged == $i)? "<li class='current'>".$i."</li>":"<a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a>";
			}
		}
		if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>"; 
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		 echo "</ul>\n";
	}
};


//Para hacer posible que esta plantilla pueda cambiar de idioma
load_theme_textdomain('yunyay',TEMPLATEPATH.'/languages');
$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if(is_readable($locale_file)) require_once($locale_file);


//Detén las adivinanzas de URLs de WordPress
add_filter('redirect_canonical','stop_guessing');
function stop_guessing($url)
{
	if(is_404())
	{
		return false;
	}
	return $url;
}


//Ocultar los errores en la pantalla de Inicio de sesión de WordPress
function no__rrors_please()
{
	return __('¡Sal de mi jardín! ¡AHORA MISMO!', 'yunyay');
};
add_filter('login__rrors','no__rrors_please');


//Eliminar palabras cortas de URL
function remove_short_words($slug)
{
    if (!is_admin()) return $slug;
    $slug = explode('-', $slug);
    foreach ($slug as $k => $word)
    {
        if (strlen($word) < 3)
        {
            unset($slug[$k]);
        }
    }
    return implode('-', $slug);
};
add_filter('sanitize_title', 'remove_short_words');


// Registra Custom Post Type de las Cabañas
require_once "includes/cpt_cabanas.php";


//Relativas las urls
// require_once "includes/url_relativas.php";


// Eliminar cajas innecesarias del dashboard
// Quitar cajas del escritorio
function quita_cajas_escritorio()
{
	// if( !current_user_can('manage_options') )
	// {
	remove_meta_box('dashboard_activity', 'dashboard', 'normal' ); // Actividad
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Ahoramismo
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Comentarios recientes
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Enlaces entrantes
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Publicación rápida
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Borradores recientes
	remove_meta_box('dashboard_primary', 'dashboard', 'side');   // Noticas del blog de WordPress
	remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Otras noticias de WordPress
	// utiliza 'dashboard-network' como segundo parámetro para quitar cajas del escritorio de red.
	// }
}
add_action('wp_dashboard_setup', 'quita_cajas_escritorio' );

// Removiendo el panel de bienvenida del wordpress
remove_action('welcome_panel', 'wp_welcome_panel');


// remove unnecessary page/post meta boxes
function remove_meta_boxes()
{

	// posts
	remove_meta_box('postcustom','post','normal');
	remove_meta_box('trackbacksdiv','post','normal');
	remove_meta_box('commentstatusdiv','post','normal');
	remove_meta_box('commentsdiv','post','normal');
	remove_meta_box('categorydiv','post','normal');
	remove_meta_box('tagsdiv-post_tag','post','normal');
	remove_meta_box('slugdiv','post','normal');
	remove_meta_box('authordiv','post','normal');
	remove_meta_box('postexcerpt','post','normal');
	remove_meta_box('revisionsdiv','post','normal');

	// pages
	remove_meta_box('postcustom','page','normal');
	remove_meta_box('commentstatusdiv','page','normal');
	remove_meta_box('trackbacksdiv','page','normal');
	remove_meta_box('commentsdiv','page','normal');
	remove_meta_box('slugdiv','page','normal');
	remove_meta_box('authordiv','page','normal');
	remove_meta_box('revisionsdiv','page','normal');
	remove_meta_box('postexcerpt','page','normal');

	// Cabañas
	remove_meta_box('commentstatusdiv','cabana','normal');
	remove_meta_box('trackbacksdiv','cabana','normal');
	remove_meta_box('commentsdiv','cabana','normal');
}
add_action('admin_init','remove_meta_boxes');

// Sitemap en xml
require_once "includes/06._sitemap.php";


//Función para Minificar el HTML
class WP_HTML_Compression
{
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);		
		$savings = ($raw-$compressed) / $raw * 100;		
		$savings = round($savings, 2);		
		return '<!-- HTML Minify | Se ha reducido el tamaño de la web un '.$savings.'% | De '.$raw.' Bytes a '.$compressed.' Bytes -->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			$content = $token[0];
			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
						$content = str_replace(' />', '/>', $content);
					}
				}
			}
			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}
			$html .= $content;
		}
		return $html;
	}
	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);
		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}
	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}
		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
// add_action('get_header', 'wp_html_compression_start');

?>