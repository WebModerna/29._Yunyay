<?php
/* contacto.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Contacto
*/

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

// Obtención del segundo contenido
$segundo_contenido = rwmb_meta('yunyay_wysiwyg', '');

$yunyay_cabanas = rwmb_meta('yunyay_cabanas', '');
$yunyay_personas = rwmb_meta('yunyay_personas', '');
$yunyay_temporada = rwmb_meta('yunyay_temporada', '');
$yunyay_precio = rwmb_meta('yunyay_precio', '');
$matriz_precios = sizeof($yunyay_precio);
$filas = $matriz_precios / sizeof($yunyay_cabanas);

	?>
			<article id="contacto">
				<div>
					<h2><?php the_title();?></h2>
					<div class="flexbox">
						
						<div class="flexbox__item">
							<?php echo do_shortcode('[contact-form-7 id="149" title="Formulario de contacto 1"]');?>
						</div>


						<div class="flexbox__item">
							<?php //the_content();?>
							<?php
							echo $filas;

							if($yunyay_temporada)
							{
								echo '<table class="table">';

								foreach ($yunyay_cabanas as $key => $value)
								{
									echo $yunyay_cabanas[$key]. '<br />';
								}

								foreach ($yunyay_precio as $key1 => $value1)
								{
									echo $yunyay_precio[$key1]. '<br />';
								}

								echo '</table>';
							}
							?>
						</div>


						<div class="segundo_contenido contenido_una_columna">
						<?php 
							if ($segundo_contenido)
							{
								echo $segundo_contenido;
							}
						?>
						</div>

						<?php endwhile; endif;?>
					</div>
				</div><!-- #slider -->
<?php get_footer();?>