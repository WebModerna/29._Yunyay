<?php
/* tarifas.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Tarifas
*/ ?>
<?php get_header();?>
		<?php if (have_posts()):while(have_posts()):the_post();get_page($page_id);$page_data=get_page($page_id);?>
			<article id="tarifas">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<?php the_content();?>
		<?php endwhile; endif;?>
				</div><!-- #slider -->
<?php get_footer();?>