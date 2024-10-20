<?php 

require 'phpmailer/PHPMailerAutoload.php';

$from = $_POST['email'];
$nom = $_POST['nom'];
$entreprise =  $_POST['entreprise'];
$tel = $_POST['tel'];
$projet=$_POST['projet'];
$livraison = $_POST['livraison'];
$budget = $_POST['budget'];
$message = $_POST['message'];


$mail = new PHPMailer;

$mail->setFrom($from, $nom);

$mail->addReplyTo($from, $nom);

$mail->addAddress('projet@simongourfink.fr', 'Simon Gourfink');

$mail->Subject = 'Demande via simongourfink.fr';

$mail->msgHTML('<p><strong>Nom :</strong> '.$nom.' <br/> <strong>Entreprise :</strong> '.$entreprise.'<br/><strong>Téléphone :</strong> '.$tel.'</p><p><strong>Projet : </strong>'.$projet.'<br/><strong>Date de livraison :</strong> '.$livraison.'<br/><strong>Budget : </strong>'.$budget.'<br/><br/><br/>'.$message.'</p>');

$mail->AltBody = $message;



if (!$mail->send()) {
    echo "<h3>Désolé, Il s'est produit une erreur: </h3>" . $mail->ErrorInfo;
} else {
    echo "<h3>Merci, votre message a bien été envoyé</h3><p>Je vous recontacterai dés que possible.</p>";
}

?>