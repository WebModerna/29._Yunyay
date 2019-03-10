<?php
/* servicios.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Servicios
*/ ?>
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
							<?php if(wpmd_is_notphone()) { ?>
							<div class="cycle-slideshow"
							data-cycle-fx="tileBlind"
							data-cycle-speed="2000" 
							data-cycle-pause-on-hover="true"
							data-cycle-prev=".back"
							data-cycle-next=".next"
							>
							<?php } else { ?> 
							<div>
							<?php };?>
							<?php 
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-800-600');
								}
								else
								{
									echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
								};?>
							<?php if(wpmd_is_notphone()) {
								$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
								if ($attachID !== '')
								{
									foreach ($attachID as $item)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-800-600');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										if (count($alt)) { echo ' alt="' . $alt . '"';
									}
									echo ' />';
								};};}; //No se porqué pero acá tiene que haber dos llaves; de lo contrario no funciona.
							?>
						</div><!-- .cycle-slideshow -->
						<?php if(wpmd_is_notphone()) { ?>
						<div class="navegacion">
							<div class="back"><a class="boton_general">‹</a></div>
							<div class="next"><a class="boton_general">›</a></div>
							<div class="clearfix"></div>
						</div><!-- .navegación -->
						<figcaption>
						</figcaption>
						<?php };?>
						</figure>
					</div><!-- .list_item_img -->
					<?php the_content();?>
					<figure>
						<div>
						<?php if(wpmd_is_phone()) {
							$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
							if ($attachID !== '')
							{
								foreach ($attachID as $item)
								{
									$imagen = wp_get_attachment_image_src($item,'custom-thumb-600-x');
									$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
									$descripcion = get_post_field('post_content', $item);
									echo '<img class="item" src="' . $imagen[0] . '"';
									if (count($alt)) { echo ' alt="' . $alt . '"';
								}
								echo ' />';
							};};}; //No se porqué pero acá tiene que haber dos llaves; de lo contrario no funciona.
						?>
						</div>
					</figure>
				</div><!-- .list_item -->
			</div>
		<?php endwhile; endif;?>
	</div><!-- #slider -->
<?php get_footer();?>