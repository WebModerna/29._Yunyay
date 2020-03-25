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

					<!-- <div class="flexbox">
						<div id="googlemaps" class="flexbox__item">
							<?php /*echo $mapa_de_google;?>
						</div>

						<div id="mapa-curabrochero" class="flexbox__item">
							<figure>
								<?php if (wpmd_is_notphone())
								{
									if(has_post_thumbnail())
									{
										the_post_thumbnail('custom-thumb-1200-666');
										$img_id = get_post_thumbnail_id($post->ID); 

										$image = wp_get_attachment_image_src($img_id, 'full');

										$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
									};
								}?>
								<?php if (wpmd_is_phone())
								{
									if(has_post_thumbnail())
									{
										the_post_thumbnail('custom-thumb-600-334');
										$img_id = get_post_thumbnail_id($post->ID);

										$image = wp_get_attachment_image_src($img_id, 'full'); 
										$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
									};
								}?>

								<figcaption>
									<a href="<?php echo $image[0] ;?>">
										<?php echo $alt_text;?>	
									</a>
								</figcaption>
										
								<?php //if(has_post_thumbnail()=='')
									{
										//echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'yunyay').'" />';
									?>
								<figcaption><?php //_e('Sin imagen', 'yunyay');?></figcaption>
								<?php };*/?>
							</figure>
						</div>
					</div> -->


					<div id="distancias" class="contenido_una_columna">
						<?php the_content();?>
					</div>
				<?php endwhile; endif;?>
				</div>
<?php get_footer();?>