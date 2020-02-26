<?php
/* paseoyactividades.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Paseo y Actividades
*/ ?>
<?php get_header();?>
		<?php if (have_posts()):while(have_posts()):the_post();?>
			<article class="servicios">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<ul>
						<?php $attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
							if ($attachID !== '')
							{
								foreach ($attachID as $item)
								{
									$imagen = wp_get_attachment_image_src($item,'custom-thumb-600-334');
									$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
									$descripcion = get_post_field('post_content', $item);
									echo '<li><figure><img class="item" src="' . $imagen[0] . '"';
									if (count($alt)) { echo ' alt="' . $alt . '"';
								}
								echo ' /><figcaption>'.$alt.'</figcaption></figure></li>';
							};}; //No se porqué pero acá tiene que haber dos llaves; de lo contrario no funciona.
						?>
					</ul>
					<div class="contenido">
						<?php the_content();?>
					</div>
					<?php endwhile; endif;?>
				</div><!-- .slider -->
<?php get_footer();?>