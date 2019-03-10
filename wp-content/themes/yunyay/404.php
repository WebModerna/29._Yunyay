<?php get_header();?>
			<article>
				<h1><?php _e('Error 404', 'yunyay');?></h1>
				<div id="slider">
					<div id="ventana"></div>
						<hr class="separador" />
						<div>
							<div class="list_item">
								<div class="list_item_img">
									<figure>
										<a href="<?php bloginfo('home');?>"><img src="<?php bloginfo('template_directory');?>/img/gravatar.png" alt="<?php _e('Logo de Cabañas Yunyay', 'yunyay');?>" /></a>
									</figure>
								</div><!-- .list_item_img -->
								<div class="list_item_content">
									<p>
										<strong><?php _e('La página o publicación que estás buscando no existe. Intentá de nuevo y colocá bien tu dirección URL', 'yunyay');?></strong>
									</p>
									<form>
										<input type="text" value="<?php the_search_query();?>" placeholder="<?php _e('Escriba aquí lo que busca...', 'yunyay');?>" name="buscar" id="buscar">
										<input type="submit" value="<?php _e('Buscar', 'yunyay');?>" />
									</form>
								</div>
							</div><!-- .list_item -->
						</div>
				</div><!-- #slider -->
<?php get_footer();?>