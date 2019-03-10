<?php
/* contacto.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Contacto
*/
get_header();
if (have_posts()):while(have_posts()):the_post();get_page($page_id);$page_data=get_page($page_id);?>
    
			<article id="contacto">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<div class="list_item">
						<?php echo do_shortcode('[contact-form-7 id="149" title="Formulario de contacto 1"]');?>
						<div class="list_item_img">
							<figure>
								<?php
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-500-x');
								}
								else
								{
									echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="Sin Imagen" />';
								};?>
								<figcaption>
								</figcaption>
								<div class="redes_sociales">
									<a rel="nofollow" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&count=vertical&lang=es" class="twitter-share-button">Tweet</a>
									<span class="g-plusone"></span>
								</div>
							</figure>
						</div>
					</div>
				<?php endwhile; endif;?>
				</div><!-- #slider -->
<?php get_footer();?>