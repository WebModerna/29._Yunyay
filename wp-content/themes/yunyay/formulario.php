<?php
/* formulario.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Formulario
*/

//si recibe un formulario
// Definición de variables
$email = "";
$nameError = "";
$emailError = "";
$commentError = "";
if(isset($_POST['submitted'])) {
   if(trim($_POST['checking']) !== '') {
      $captchaError = true;
   } else {
                //revisa el nombre
      if(trim($_POST['contactName']) === '') {
         $nameError = __('Olvidaste ingresar tu nombre.', 'yunyay');
         $hasError = true;
      } else {
         $name = trim($_POST['contactName']);
      }
 
      //revisa el email
      if(trim($_POST['email']) === '')  {
         $emailError = __('Olvidaste ingresar tu email.', 'yunyay');
         $hasError = true;
      } else if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+.[A-Z]{2,4}$/i", trim($_POST['email']))) {
         $emailError = __('Ingresa un email real.', 'yunyay');
         $hasError = true;
      } else {
         $email = trim($_POST['email']);
      }
 
                //revisa el mensaje
      if(trim($_POST['textoMensaje']) === '') {
         $commentError = __('No ingresaste ningun mensaje.', 'yunyay');
         $hasError = true;
      } else {
         if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['textoMensaje']));
         } else {
            $comments = trim($_POST['textoMensaje']);
         }
      }
   }
 
        //si no hay errores envia el email
   if(!isset($hasError)) {
      $emailTo = 'edgardogalletto@gmail.com';//cambiar esto
      $subject = 'Mensaje de '.$name;
      $body = "Nombre: $name \n\nEmail: $email \n\nComentario:\n\n $comments";
      $headers = 'From: Mi blog ' . "\r\n" . 'Reply-To: ' . $email;
 
      mail($emailTo, $subject, $body, $headers);
      $emailSent = true;
   }
}



get_header();
if (have_posts()):while(have_posts()):the_post();get_page($page_id);$page_data=get_page($page_id);?>
    
			<article id="contacto">
				<div id="slider">
				<h2><?php the_title();?></h2>
					<div id="ventana"></div>
					<hr class="separador" />
					<div class="list_item">
						<div class="list_item_content">
<!-- El formulario de contacto -->
						
<?php 
//Si el email es enviado muestra un mensaje
//Sino muestra el formulario
if(isset($emailSent) && $emailSent == true) { ?>
<h2><?php _e('Gracias por comunicarte, ', 'yunyay'); echo $name;?>.</h2>
<p class="success">
<?php _e('Te email sera atendido y respondido a la brevedad.', 'yunyay');?>
</p>
<?php } else { ?>
   <?php if(isset($hasError) || isset($captchaError)) { ?>
   <span class="error_fatal">
	<?php _e('Hubo un error grave enviando el formulario.', 'yunyay');?>
   </span>
   <?php } ?>
<form id="contactForm" action="<?php the_permalink(); ?>" method="post">
<input placeholder="<?php _e('Apellido y Nombre', 'yunyay');?>" type="text" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" />
<?php
if($nameError != '') { ?>
<span class="error"><?php echo $nameError;?></span>
<br>
<?php } ?>
 
<input placeholder="E-Mail" type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
<?php if($emailError != '') { ?>
<span class="error"><?php echo $emailError;?></span>
<br>
<?php } ?>
<textarea placeholder="<?php _e('Mensaje', 'yunyay');?>" name="textoMensaje" rows="15" cols="40"><?php if(isset($_POST['textoMensaje'])) {  if(function_exists('stripslashes')) { echo trim(stripslashes($_POST['textoMensaje']));
} else { echo trim($_POST['textoMensaje']); } } ?></textarea>
<?php if($commentError != '') { ?>
<span class="error"><?php echo $commentError;?></span>
<br>
<?php } ?>
<label class="screenReader" for="checking">Deja este campo vacio para demostrar que eres humano</label>
<input id="checking" class="screenReader" type="text" name="checking" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" />

 <a onclick="document.getElementById('captcha').src = '<?php bloginfo('template_url'); ?>/includes/securimage/securimage_show.php?' + Math.random(); return false" href="#" class="reload"><img style="width:40px;" src="<?php bloginfo('template_url'); ?>/includes/securimage/images/refresh.png"></a>
<img id="captcha" style="width:115px;" alt="CAPTCHA Image" src="<?php bloginfo('template_url'); ?>/includes/securimage/securimage_show.php" />
 
 <input id="ccode" type="text" maxlength="6" name="ccode" size="8" />
<input id="submitted" type="hidden" name="submitted" value="true" />
 
<?php
    require_once '/includes/securimage/securimage.php';

    $image = new Securimage();

    $image->show();

    // Code Validation

    $image = new Securimage();
    if ($image->check($_POST['code']) == true) {
      echo "Correct!";
    } else {
      echo "Sorry, wrong code.";
    };
?> 
<br>
<input type="submit" value="Enviar" /></form>
<?php } ?>


<!-- Fin del formulario -->
						</div>			
						<div class="list_item_img">
							<figure>
								<?php
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-500-x');
								}
								else
								{
									echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="Sin Imagen" />';
								};?>
								<figcaption>
								</figcaption>
								<!-- <div class="redes_sociales">
									<a rel="nofollow" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&count=vertical&lang=es" class="twitter-share-button">Tweet</a>
									<span class="g-plusone"></span>
								</div> -->
							</figure>
						</div>
					</div>
				<?php endwhile; endif;?>
				</div><!-- #slider -->
<?php get_footer();?>