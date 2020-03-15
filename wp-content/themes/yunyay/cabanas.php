<?php
/* cabanas.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Cabañas - Listado
*/ ?>

<?php get_header();?>
			<article id="cabanas">
				<div>
					<?php
						$args=array(
						  'post_type' 			=> 'cabana',
						  'posts_per_page' 		=> 10,
						  'order' 				=> 'ASC',
						  'ignore_sticky_posts' => 1
						);

						$my_query = null;
						$my_query = new WP_Query($args);
						
						if( $my_query->have_posts() )
						{
						  while ($my_query->have_posts()) : $my_query->the_post();
					?>	

					<div class="list_item">

						<h2>
							<a href="<?php the_permalink();?>">
								<?php the_title();?>
							</a>
						</h2>

						<div class="list_item_img">
							<figure>
								<?php 
									if( has_post_thumbnail() )
									{
										echo '<a class="imagen_resaltar" href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
										the_post_thumbnail('custom-thumb-800-600');
										echo '</a>';
									}
									else
									{
										echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'yunyay').'" />';
									};	
								?>
								
							</figure>
						</div>

						<div class="list_item_content">
							<?php the_content();?>
						</div>

					</div>
					<?php endwhile;
				}
				wp_reset_query();?>
				</div>

<?php get_footer();?>