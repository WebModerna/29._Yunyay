<?php 
//Checa si el codigo captcha es correcto 
if ($securimage -> check($_POST['ccode']) == false)
{
 $captchaError = true;
 $hasError = true;
}
 
//Checa si la trampa (honeypot captcha) está vacia
if($_POST['ageCheck'] !== '')
{
 $honeypotError = true;
 $hasError = true;
}
 
//Checa que no esté vacio el campo Nombre
if(trim($_POST['contactName']) === '')
{
 $nameError = 'Olvidaste escribir tu nombre.';
 $hasError = true;
}
else
 $name = trim($_POST['contactName']);
 
//Checa que sea una dirección email válida
if(trim($_POST['email']) === '')
{
 $emailError = 'Olvidaste tu dirección de email.';
 $hasError = true;
}
else if (!is_email(trim($_POST['email'])))
{
 $emailError = 'Dirección de email no válida.';
 $hasError = true;
}
else
 $email = trim($_POST['email']);
 
//Checa que hallan escrito un mensaje
if(trim($_POST['message']) === '')
{
 $messageError = 'Olvidaste escribir tu mensaje.';
 $hasError = true;
}
else
{
 if(function_exists('stripslashes') && function_exists('htmlspecialchars'))
 $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
 else
 $message = trim($_POST['message']);
}
//Checa que la ID de la página "the_ID" sea numérica
if(is_numeric($_POST['contactId']))
 $contactId = $_POST['contactId'];
else
 $hasError = true;
?>