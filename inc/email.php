<?php 

require 'phpmailer/PHPMailerAutoload.php';

$from = $_POST['email'];
$sujet = $_POST['sujet'];
$message =  $_POST['message'];



$mail = new PHPMailer;

$mail->setFrom($from, $from);

$mail->addReplyTo($from, $from);

$mail->addAddress('contact@enascor.fr', 'Compagnie Enascor');

$mail->Subject = 'Message via enascor.fr : '.$sujet;

$mail->msgHTML('<p>'.$message.'</p>');



if (!$mail->send()) {
    echo '<div class="alert alert-danger" role="alert"><h5>Désolé, Il s\'est produit une erreur: </h5>'. $mail->ErrorInfo.'</div>';
} else {
    echo '<div class="alert alert-success" role="alert"><h5>Merci, votre message a bien été envoyé</h5><p>Nous vous recontacterons prochainement</p></div>';
}

?>