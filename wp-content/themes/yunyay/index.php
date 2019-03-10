<?php
/* index.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
*/ ?>
<?php get_header();?>
	<article id="blog">
		<div id="slider">
		<h2><?php _e('Noticias', 'yunyay');?></h2>
			<div id="ventana"></div>
			<hr class="separador" />
			<?php if (have_posts()):while(have_posts()):the_post();?>
			<div class="list_item blog">
				<a href="<?php the_permalink()?>">
					<h2><?php the_title();?></h2>
				</a>
				<figure>
					<?php
					if(has_post_thumbnail())
					{
						the_post_thumbnail('custom-thumb-500-x');
					}
					else
					{
						echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="Sin Imagen" />';
					};
					?>
					<figcaption>
						<a href="<?php the_permalink()?>"><?php _e('Publicado el: ', 'yunyay'); the_time('j/m/Y');?></a>
					</figcaption>
				</figure>
				<div class="list_item_content">
					<?php the_excerpt();?>
						<p><a href="<?php the_permalink()?>" class="vermas"><?php _e('Ver más...', 'yunyay');?></a></p>
				</div><!-- list_item_content -->
				<div class="clearfix"></div>
			</div><!-- .list_item.blog -->
		<?php endwhile; else:
		echo _e('No hay ninguna entrada o noticia publicada por el momento.', 'yunyay');
		wp_reset_query(); endif;?>
		<div class="paginacion">
			<?php if (function_exists("pagination")) {pagination();};?>
		</div>
		</div><!-- #slider -->
<?php get_footer();?>