<?php
/*
Template Name: Pagina de Contacto
*/
 
//Si ha sido enviado el formulario
if(isset($_POST['submitted']))
{
    //Validar y limpiar los datos (codigo aqui)
 
    //Si no hay ningún error, enviar el email. (codigo aqui)
 
}
 
//Obtener el Header
get_header();
 
//El Loop de WordPress para obtener el contenido y poder usar campos personalizados
if (have_posts()):
    while (have_posts()) : the_post();
 
        //Si se envió el email, mostrar mensaje de notificación
        if(isset($emailSent) && $emailSent == true):
            # <!-- Mensaje de notificación -->
 
        //No se envió el email, hubo errores
        elseif(isset($hasError) OR isset($honeypotError) OR isset($captchaError)):
            # <!-- Mensaje de error -->
 
        //Se carga normalmente el contenido de la página
        else:
            the_content();
        endif;
 
        //Si no se ha intentado enviar el mensaje o hubo errores, carga el formulario
        if(!isset($emailSent) OR $emailSent == false)
            // <!-- Codigo del Formulario -->
        endif;
 
    endwhile;
endif;
 
//Obtener Sidebar (opcional)
get_sidebar();
//Obtener el Footer
get_footer();
?>