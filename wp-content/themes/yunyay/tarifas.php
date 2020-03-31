<?php
/* tarifas.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Tarifas
*/ ?>
<?php get_header();?>
		<?php if (have_posts()):while(have_posts()):the_post();

			// Obtención del segundo contenido

			$segundo_contenido = rwmb_meta( 'second_content', '');

		?>

				<div class="contenido_una_columna">
				<h2><?php the_title();?></h2>

					<?php the_content();?>
				</div>
				<div class="contenido_una_columna">
					<?php 
					if($segundo_contenido)
					{
						echo $segundo_contenido;
					} else {
						echo "algo falló";
					}
					;?>
				</div>

		<?php endwhile; endif;?>
<?php get_footer();?>