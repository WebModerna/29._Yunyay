<?php
/* home.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Home
*/ ?>
<?php get_header();
$yunyay_plupload = rwmb_meta('yunyay_plupload', '');
?>
			<article id="home_slider">
				<div id="slider" class="cycle-slideshow" 
				data-cycle-fx="fade"
				data-cycle-speed="3000" 
				data-cycle-pause-on-hover="true"
				data-cycle-next=".next" 
				data-cycle-prev=".back"
				>
					<div id="ventana"></div>
						<?php if (have_posts()):while(have_posts()):the_post();
						
							//Móviles
							if(wpmd_is_phone())
							{
								/*$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
								if ($attachID !== '')
								{
									foreach ($attachID as $item)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-800-x');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="' . $alt . '"';
										echo ' />';
									}
								}*/
								if($yunyay_plupload)
								{
									foreach ($yunyay_plupload as $item => $value)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-800-x');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="';
										if($alt)
										{
											echo $alt;
										}
										elseif($descripcion)
										{
											echo $descripcion;
										}
										else
										{
											echo get_the_title();
										}
										echo '"';
										echo ' />';
									}
								}

							}
						
							//Tablets
							if(wpmd_is_tablet())
							{
								/*$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
								if ($attachID !== '')
								{
									foreach ($attachID as $item)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-1200-666');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="' . $alt . '"';
										echo ' />';
									}
								}*/
								if($yunyay_plupload)
								{
									foreach ($yunyay_plupload as $item => $value)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-1200-666');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="';
										if($alt)
										{
											echo $alt;
										}
										elseif($descripcion)
										{
											echo $descripcion;
										}
										else
										{
											echo get_the_title();
										}
										echo '"';
										echo ' />';
									}
								}
							}
						
		
							//Desktop.
							if(wpmd_is_notdevice()) 
							{
								/*$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
								if ($attachID !== '')
								{
									foreach ($attachID as $item)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-1800-1000');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="' . $alt . '"';
										echo ' />';
									}
								}*/
								if($yunyay_plupload)
								{
									foreach ($yunyay_plupload as $item => $value)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-1800-1000');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="';
										if($alt)
										{
											echo $alt;
										}
										elseif($descripcion)
										{
											echo $descripcion;
										}
										else
										{
											echo get_the_title();
										}
										echo '"';
										echo ' />';
									}
								}
							}
							endwhile; endif;?>

					<div class="ventanilla"></div>

					<div class="navegacion">
						<div class="back">
							<a class="boton_general" href="#navegacion">‹</a>
						</div>
						<div class="next">
							<a class="boton_general" href="#navegacion">›</a>
						</div>
					</div>

				</div><!-- #slider -->
<?php get_footer();?>