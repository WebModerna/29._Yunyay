<?php
/* contacto.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Contacto
*/
// Obtención del segundo contenido
$segundo_contenido = rwmb_meta( 'tarifas_condicones_no_show', '');

get_header();


if ( have_posts() ) : while ( have_posts() ) : the_post();

	?>
			<article id="contacto">
				<div>
					<h2><?php the_title();?></h2>
					<div class="flexbox">
						
						<div class="flexbox__item">
							<?php echo do_shortcode('[contact-form-7 id="149" title="Formulario de contacto 1"]');?>
						</div>


						<div class="flexbox__item">
							<?php
							the_content();
							?>
						</div>


						<div class="contenido_una_columna">
							<?php 
								echo $segundo_contenido;
							?>
						</div>

						<?php endwhile; endif;?>
					</div>
				</div><!-- #slider -->
<?php get_footer();?>