<?php 

// Variables a utilizar
$telefono_celular		=	of_get_option( 'telefono_celular', '' );
$telefono_fijo			=	of_get_option( 'telefono_fijo', '');
$facebook_contact		=	of_get_option( 'facebook_contact', '' );
$add_this_script		=	of_get_option( 'add_this_script', '');
$google_analitycs		=	of_get_option( 'google_analitycs', '');
$direccion_web			=	of_get_option( 'direccion_web', '');
$email_contact			=	of_get_option( 'email_contact', '');
$instagram_contact		=	of_get_option( 'instagram_contact', '');
$twitter_contact		=	of_get_option( 'twitter_contact', '');

?>

			</article><!-- #home_slider -->
		</section>
		<footer class="footer">
			<?php

				//Pie de página. Dirección y demás datos
				if( $direccion_web )
				{
					echo '<p>' . $direccion_web . '</p>';
				}
				if ( $email_contact	 )
				{
					echo '<p>E-Mail: ' . $email_contact	. ' - Teléfonos: ' . $telefono_fijo . ' - ' . $telefono_celular . '</p>';
				}
			?>

		<?php //if ( wpmd_is_device() ) { ?>
			<a class="icon-arrow-up" id="irarriba" title="<?php _e('Ir arriba', 'yunyay');?>" href="#"></a>
		<?php //} else { ?>
			<!--<a id="ir_arriba" title="<?php //_e('Ir arriba', 'yunyay');?>" href="#">^</a>-->
		<?php //};?>
			
			<p>© <?php echo date("Y "); bloginfo("name");?> – Todos los derechos reservados - Desarrollado por <a href="//www.webmoderna.com.ar" target="_blank">WebModerna</a></p>
			<div class="iconos">
				<ul>
					<?php

	                // Facebook
	                if ( $facebook_contact )
					{
						echo '<li><a class="icon-facebook3" target="_blank" href="//' . $facebook_contact . '" title="Facebook"></a></li>';
					}

					// Twitter
					if ( $twitter_contact )
					{
						echo '<li><a class=" icon-twitter1" target="_blank" title="Twitter" href="//' . $twitter_contact . '"></a></li>';
					}


					// Correo Electrónico
					if ( $email_contact	 )
					{
						echo '<li><a class="icon-gmail" target="_blank" title="E-Mail" href="mailto:' . $email_contact . '"></a></li>';
					}

					// Instagram
					if ( $instagram_contact )
					{
						echo '<li><a class="icon-instagram1" target="_blank" title="Instagram" href="//instagram.com/' .  $instagram_contact . '"></a></li>';
					}

					// WhatsApp
					if ( $telefono_celular )
					{
						if ( wpmd_is_device() )
						{
							echo '<li><a class="icon-whatsapp1" target="_blank" href="whatsapp://send?phone=' . $telefono_celular . '&text=Hola Cabañas Yunyay. " title="WhatsApp" rel="nofollow"></a></li>';
						} else {
							echo '<li><a class="icon-whatsapp1" target="_blank" href="https://web.whatsapp.com/send?l=en&phone=' . $telefono_celular . '&text=Hola Cabañas Yunyay. " title="WhatsApp" rel="nofollow"></a></li>';
							// https://web.whatsapp.com/send?l=en&phone=+5492615117948
						}
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

	<script>document.write('<script src="http://' + (location.host || '${1:localhost}').split(':')[0] + ':${2:35729}/livereload.js?snipver=1"></' + 'script>')</script>
<?php wp_footer();?>
</body>
</html>