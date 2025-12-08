<?php
/* ubicacion.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Ubicación
*/ ?>
<?php

$mapa_de_google = of_get_option("mapa_de_google", "");

get_header();

if (have_posts()):while(have_posts()):the_post();?>

			<article id="ubicacion">
				<div>
				<h2><?php the_title();?></h2>
					
					<div id="googlemaps" class="contenido_una_columna">
						<?php echo $mapa_de_google;?>
					</div>

					<div id="distancias" class="contenido_una_columna">
						<?php the_content();?>
					</div>
				<?php endwhile; endif;?>
				</div>
<?php get_footer();?>