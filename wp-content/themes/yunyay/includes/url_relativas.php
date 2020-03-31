<?php 
// Las url las pasa a relativas
add_action( 'template_redirect', 'relative_url' );

  function relative_url() {
    // Don't do anything if:
    // - In feed
    // - In sitemap by WordPress SEO plugin
    if ( is_feed() || get_query_var( 'sitemap' ) )
      return;
    $filters = array(
      'post_link',       // Normal post link
      'post_type_link',  // Custom post type link
      'page_link',       // Page link
      'attachment_link', // Attachment link
      'get_shortlink',   // Shortlink
      'post_type_archive_link',    // Post type archive link
      'get_pagenum_link',          // Paginated link
      'get_comments_pagenum_link', // Paginated comment link
      'term_link',   // Term link, including category, tag
      'search_link', // Search link
      'day_link',   // Date archive link
      'month_link',
      'year_link',

      // site location
      // 'option_siteurl',
      // 'blog_option_siteurl',
      // 'option_home',
      // 'admin_url',
      // 'home_url',
      'includes_url',
      // 'site_url',
      'site_option_siteurl',
      'network_home_url',
      'network_site_url',

      // debug only filters
      'get_the_author_url',
      'get_comment_link',
      'wp_get_attachment_image_src',
      'wp_get_attachment_thumb_url',
      'wp_get_attachment_url',
      'wp_login_url',
      'wp_logout_url',
      'wp_lostpassword_url',
      'get_stylesheet_uri',
      'get_stylesheet_directory_uri',//
      'plugins_url',//
      'plugin_dir_url',//
      'stylesheet_directory_uri',//
      'get_template_directory_uri',//
      'template_directory_uri',//
      'get_locale_stylesheet_uri',
      'script_loader_src', // plugin scripts url
      'style_loader_src', // plugin styles url
      // 'get_theme_root_uri',
      // 'home_url'
    );

    foreach ( $filters as $filter ) {
      add_filter( $filter, 'wp_make_link_relative' );
    }
    home_url($path = '', $scheme = null);
  }


// Agregar varias imágenes a las entradas y páginas
function add_custom_meta_box()
{
  add_meta_box(
  'custom_meta_box',
  '<strong>Subir las fotos del producto desde aquí</strong>',
  'show_custom_meta_box',
  'page',
  'normal',
  'high');

/*
  add_meta_box(
  'custom_meta_box',
  '<strong>Subir las fotos del producto desde aquí</strong>',
  'show_custom_meta_box',
  'cabana',
  'normal',
  'high');
*/
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

?>