<?php
/* ubicacion.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Ubicación
*/ ?>
<?php get_header();?>
		<?php if (have_posts()):while(have_posts()):the_post();get_page($page_id);$page_data=get_page($page_id);?>
			<article id="ubicacion">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<div id="googlemaps">
						<?php echo do_shortcode('[codepeople-post-map]');?>
					</div>
					<div id="mapa-curabrochero">
						<figure>
							<?php if (wpmd_is_notphone())
							{
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-1200-666');
									$img_id = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
									$image = wp_get_attachment_image_src($img_id, 'full'); // Get URL of the image, and size can be set here too (same as with get_the_post_thumbnail, I think)
									$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
								};
							}?>
							<?php if (wpmd_is_phone())
							{
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-600-334');
									$img_id = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
									$image = wp_get_attachment_image_src($img_id, 'full'); // Get URL of the image, and size can be set here too (same as with get_the_post_thumbnail, I think)
									$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
								};
							}?>

							<figcaption><a href="<?php echo $image[0] ;?>"><?php echo $alt_text;?></a></figcaption>
									
							<?php if(has_post_thumbnail()=='')
								{
									echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
								?>
							<figcaption><?php _e('Sin imagen', 'yunyay');?></figcaption>
							<?php };?>
						</figure>
					</div>
					<div class="clearfix"></div>
					<div id="distancias">
						<?php the_content();?>
					</div>
				<?php endwhile; endif;?>
				</div><!-- #slider -->
<?php get_footer();?>