<?php 

// Variables a utilizar
$telefono_celular		=	of_get_option( 'telefono_celular', '' );
$telefono_fijo			=	of_get_option( 'telefono_fijo', '');
$facebook_contact		=	of_get_option( 'facebook_contact', '' );
$google_plus_contact	=	of_get_option( 'google_plus_contact', '' );
$add_this_script		=	of_get_option( 'add_this_script', '');
$google_analitycs		=	of_get_option( 'google_analitycs', '');
$direccion_web			=	of_get_option( 'direccion_web', '');
$email_contact			=	of_get_option( 'email_contact', '');
$instagram_contact		=	of_get_option( 'instagram_contact', '');
$twitter_contact		=	of_get_option( 'twitter_contact', '');

?>

				<div class="footer_bg">
					<!--[if IE 8]>
						<img src="<?php bloginfo('stylesheet_directory');?>/img/footer_bg.png" alt="<?php _e('Imagen de fondo', 'yunyay');?>" />
					<![endif]-->
				</div>
				<div id="mensaje">
					<?php //Pie de página. Mensaje
						$recent = new WP_Query("page_id=42");
						while($recent->have_posts()) : $recent->the_post();
						the_content();
						endwhile; 
						wp_reset_query();
					?>
				</div>
			</article><!-- #home_slider -->
		</section>
		<footer>
			<?php //Pie de página. Dirección y demás datos
				/*$recent = new WP_Query("page_id=44");
				while($recent->have_posts()) : $recent->the_post();
				the_content();
				endwhile; 
				wp_reset_query();*/
				if( $direccion_web )
				{
					echo '<p>' . $direccion_web . '</p>';
				}
				if ( $email_contact	 )
				{
					echo '<p>E-Mail: ' . $email_contact	. ' - Teléfonos: ' . $telefono_fijo . ' - ' . $telefono_celular . '</p>';
				}
			?>

		<?php if ( wpmd_is_device() ) { ?>
			<a id="irarriba" title="<?php _e('Ir arriba', 'yunyay');?>" href="#">^</a>
		<?php } else { ?>
			<a id="ir_arriba" title="<?php _e('Ir arriba', 'yunyay');?>" href="#">^</a>
		<?php };?>
			
			<p><small>© <?php echo date("Y "); bloginfo("name");?> – Todos los derechos reservados - Desarrollado por <a href="//www.webmoderna.com.ar" target="_blank">WebModerna</a></small></p>
			<div class="iconos">
				<ul>
					<?php
	                // FACEBOOK
	                if ( $facebook_contact )
					{
						echo '<li class="autor_fb"><a target="_blank" href="//' . $facebook_contact . '" title="Facebook"></a></li>';
					};

					// WhatsApp
					if ( $telefono_celular )
					{
						if ( wpmd_is_device() )
						{
							echo '<li id="whatsapp"><a target="_blank" href="whatsapp://send?phone=' . $telefono_celular . '&text=Hola Cabañas Yunyay. " title="WhatsApp" rel="nofollow"></a></li>';
						}
					}

					// Instagram
					if ( $instagram_contact )
					{
						echo '<li id="instagram"><a target="_blank" title="Instagram" href="//instagram.com/' .  $instagram_contact . '"></a></li>';
					}

					// Twitter
					if ( $twitter_contact )
					{
						echo '<li class="autor_tw"><a target="_blank" title="Twitter" href="//' . $twitter_contact . '"></a></li>';
					}
					?>
	                
					<!-- <li class="autor_feed">
						<a target="_blank" title="RSS" href="<?php //bloginfo("rss2_url");?>"></a>
					</li> -->
	                
	                <?php

	                // Google+
	                if ( $google_plus_contact )
	                {
	                    echo '<li class="autor_google"><a target="_blank" title="Google+" href="' . $google_plus_contact . '"></a></li>';
	                }
                ?>
				</ul>
			</div>
		</footer>
	</div>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/scripts.js"></script>
	<?php if(is_page( 'contacto' )) { //Solo se cargará en la página del formulario ?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/datepicker-completo.js"></script>
	<?php };

		// Google Analitics
		if ( $google_analitycs )
		{
			echo '<script type="text/javascript">' . $google_analitycs . '</script>';
		}

		// AddThis para compartir en redes sociales
		if ( $add_this_script )
		{
			echo '<script type="text/javascript" src="https:' . $add_this_script . '"></script>';
		} 
	?>

	
<?php wp_footer();?>
</body>
</html>