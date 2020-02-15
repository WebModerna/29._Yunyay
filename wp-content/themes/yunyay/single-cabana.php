<?php
/* single-cabana.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Cabaña
*/ ?>
<?php get_header();?>
			<article id="cabanas">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<?php if (have_posts()) : while (have_posts()) : the_post() ;?>		
					<div class="list_item">
						<div class="clearfix"></div>
						<div class="list_item_img">
							<?php if(wpmd_is_phone()) { ?>
							<figure>
							<?php } else { ?>
							<figure class="cycle-slideshow"
									data-cycle-fx="tileBlind"
									data-cycle-tile-vertical=false
									data-cycle-prev=".back"
									data-cycle-next=".next"
									>
							<?php };?>
							<?php
							if(wpmd_is_phone())
							{
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-600-334');
								}
								else
								{
									echo '<img src="'.get_stylesheet_directory_uri().'/img/sin_imagen2.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
								}
							};

							if(wpmd_is_notphone())
							{
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-800-600');
								}
								else
								{
									echo '<img src="'.get_stylesheet_directory_uri().'/img/sin_imagen2.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
								};?>

									<?php
										//Listado de imágenes para Tablets y Desktops en un slideshow
										$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
										foreach ($attachID as $item)
										{
											$imagen_chica = wp_get_attachment_image_src($item,'custom-thumb-800-600');
											$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
											$descripcion = get_post_field('post_content', $item);
											if ($imagen_chica[0]!='') 
											{
												echo '<img src="'.$imagen_chica[0].'" alt="'.$alt.'" />';
												
											}
											else
											{
												echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
											};
										};?>
								<?php };?>	
								
								<?php if (wpmd_is_notphone())
									{//Obteniendo la url de la thumbnail. Desktop
										$custom_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'custom-thumb-1800-x' );
										$src = $custom_thumb['0'];
									}
								?>

								<?php if(wpmd_is_notphone()) { ?>
									<figcaption>
										<a href="<?php echo $src;?>" class="fancybox" rel="gallery<?php echo $post->ID;?>"><?php _e('Ver fotos de las cabañas', 'yunyay');?></a>
									</figcaption>
								<?php };

								if(wpmd_is_notphone())
								{		
									//Enlaces provistos por el listado de imágenes
									$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
									foreach ($attachID as $item)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-1800-x');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										if ($imagen[0]!='') 
										{
											echo '<a title="'.$alt.'" class="fancybox" rel="gallery'.$post->ID.'" href="'.$imagen[0].'">';
											
											echo '</a>';
										}
									};
								};?>
							</figure>
						</div><!-- .list_item_img -->
						<div class="list_item_content">
							<?php the_content();?>
						</div><!-- .list_item_content -->
						<?php if(wpmd_is_phone()) { ?>
						<div>
							<figure>
								<?php
									//listado de imágenes para smatphones
									$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
									foreach ($attachID as $item)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-600-x');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										if ($imagen[0]!='') 
										{
											echo '<img src="'.$imagen[0].'" alt="'.$alt.'" />';
											
										}
										else
										{
											echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
										};
								};?>
							</figure>
						</div>
						<?php };?>
					<?php endwhile; endif; ?>
					</div><!-- .list_item -->
					<div class="list_item">
						<div class="list_item_content">
							<h3><?php _e('Ver otros tipos de cabañas', 'yunyay');?></h3>
							<?php 
							$default=array(
								'container'=>false,
								'depth'=>1,
								'menu'=>'footer_nav',
								'theme_location'=>'footer_nav',
								'items_wrap'=>'<ul class="cabana_menu">%3$s</ul>'
							);
							wp_nav_menu($default);
						?>
						</div><!-- .list_item_content -->
					</div><!-- .list_item -->
				</div><!-- #slider -->
<?php get_footer();?>