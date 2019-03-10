<?php
/* single-default.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
*/
get_header();?>
	<article id="blog">
		<div id="slider">
		<a href="<?php bloginfo('url');?>/category/noticias/"><h2><?php _e('Noticias', 'yunyay');?></h2></a>
			<div id="ventana"></div>
			<hr class="separador" />
			<?php if (have_posts()) : while (have_posts()) : the_post() ;?>
			<div class="list_item blog">
				<h2><?php the_title();?></h2>
				<figure>
					<?php
					if(has_post_thumbnail())
					{
						the_post_thumbnail('custom-thumb-600-x');
					}
					else
					{
						echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="Sin Imagen" />';
					};
					?>
					<figcaption>
						<?php _e('Publicado el: ', 'yunyay'); the_time('j/m/Y');?>
					</figcaption>
				</figure>
				<div class="list_item_content">
					<?php the_content(); ?>					
				</div><!-- list_item_content -->
				<div class="clearfix"></div>
				<hr />
				<p class="page"><?php previous_post_link(); echo _e(" : Anterior", "yunyay");?>  ||  <?php echo _e("Siguiente: ", "yunyay"); next_post_link();?></p>
				<div class="clearfix"></div>
			</div><!-- .list_item.blog -->
			<div class="list_item">
			<?php comments_template();?>
			</div>
		<?php endwhile; endif;?>
		</div><!-- #slider -->
<?php get_footer();?>