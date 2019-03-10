<?php
/* cabanas.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Cabañas - Listado
*/ ?>
<?php get_header();?>
			<article id="cabanas">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<?php
						$args=array(
						  'post_type' => 'cabana',
						  'posts_per_page' => 10,
						  'order' => 'ASC',
						  'ignore_sticky_posts' => 1
						);
						$my_query = null;
						$my_query = new WP_Query($args);
						if( $my_query->have_posts() )
						{
						  while ($my_query->have_posts()) : $my_query->the_post();
					?>	
					<div class="list_item">
						<a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
						<div class="list_item_img">
							<figure>
								<?php 
									if(has_post_thumbnail())
									{
										the_post_thumbnail('custom-thumb-800-600');
									}
									else
									{
										echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
									};	
								?>
								<a href="<?php the_permalink();?>">
									<figcaption><?php _e('Ver fotos de las cabañas', 'yunyay');?></figcaption>
								</a>
							</figure>
						</div><!-- .list_item_img -->
						<div class="list_item_content">
							<?php the_content();?>
						</div><!-- .list_item_content -->
					</div><!-- .list_item -->
					<?php endwhile;} wp_reset_query();?>
				</div><!-- #slider -->

<?php get_footer();?>