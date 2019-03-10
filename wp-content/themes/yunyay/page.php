<?php get_header();?>
		<?php if (have_posts()):while(have_posts()):the_post();get_page($page_id);$page_data=get_page($page_id);?>
			<article id="servicios">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<div>
						<div class="list_item">
							<div class="list_item_img">
								<figure>
									<?php if(has_post_thumbnail())
										{
											the_post_thumbnail('custom-thumb-800-600');
											$img_id = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
											$image = wp_get_attachment_image_src($img_id, 'custom-thumb-800-600'); // Get URL of the image, and size can be set here too (same as with get_the_post_thumbnail, I think)
											$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
										?>

									<figcaption><?php echo $alt_text;?></figcaption>
											
									<?php }
										else
										{
											echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
										?>
									<figcaption><?php _e('Sin imagen', 'yunyay');?></figcaption>
									<?php };?>
								</figure>
							</div><!-- .list_item_img -->
							<?php the_content();?>
						</div><!-- .list_item -->
					</div>
				<?php endwhile; endif;?>
				</div><!-- #slider -->
<?php get_footer();?>