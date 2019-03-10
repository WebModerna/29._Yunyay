<?php //Si no hay ningún error, envía el email.   
if(!isset($hasError))   {       $sendCopy = $_POST['sendCopy'];         $keywords = array('%name%','%email%','%message%','%bloginfo%');         $replace = array($name, $email, $message, get_bloginfo());      $mail = new PHPMailer();        $mail--->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = get_post_meta($contactId, "mailHost", true); #"smtp.gmail.com";
        $mail->Port = get_post_meta($contactId, "mailPort", true); #465;
        $mail->Username = get_post_meta($contactId, "mailUsername", true); #"contacto@tudominio.com";
        $mail->Password = get_post_meta($contactId, "mailPassword", true); #"password";
 
        $mail->From = get_post_meta($contactId, "mailFrom", true); #'noreply@tudominio.com'; #get_option('admin_email');
        $mail->FromName = str_replace($keywords, $replace, get_post_meta($contactId, "mailFromName", true)); #get_bloginfo();
        $mail->Subject = str_replace($keywords, $replace, get_post_meta($contactId, "mailSubject", true)); #'Contacto: ' . $name;
        $mail->AltBody = str_replace($keywords, $replace, get_post_meta($contactId, "mailText", true)); #"Envia: $name <$email>\n\n$message";
        $mail->MsgHTML(str_replace($keywords, $replace, get_post_meta($contactId, "mailHTML", true))); #"
<strong>$name</strong><$email>
 
$message
 
";
 
        $mail->AddBCC(get_post_meta($contactId, "mailUsername", true), get_bloginfo());
 
        if($sendCopy == true)
            $mail->AddAddress($email, $name);
 
        $mail->AddReplyTo($email, $name);
        $mail->IsHTML(true);
        $mail->AddCustomHeader('Mime-Version: 1.0\r\n');
 
        $emailSent = $mail->Send();
    }
?>