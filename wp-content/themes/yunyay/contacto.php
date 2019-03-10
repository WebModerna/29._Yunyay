<?php
/* contacto.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Contacto
*/
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<article id="contacto">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<div class="list_item contacto">
						<?php echo do_shortcode('[contact-form-7 id="149" title="Formulario de contacto 1"]');?>
						<div class="list_item_img">
							<?php
							the_content();
			/*				if( has_post_thumbnail() )
							{
								echo "<figure>";
								the_post_thumbnail( 'custom-thumb-600-x' );
								echo "</figure>";
							};*/
							?>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php endwhile; endif;?>
				</div><!-- #slider -->
<?php get_footer();?>