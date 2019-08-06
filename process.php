<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "./phpmailer/src/PHPMailer.php";
require_once "./phpmailer/src/SMTP.php";
require_once "./phpmailer/src/Exception.php";

// $name = $_POST["name"];
// $email = $_POST["email"];
// $message = $_POST["message"];
 
// $EmailTo = "jeanforteroche@outlook.fr";
// $Subject = "Nouveau message - Un billet pour l'Alaska";
 
// // prepare email body text
// $Body = "Nom: ";
// $Body .= $name;
// $Body .= "\n";
 
// $Body .= "Email: ";
// $Body .= $email;
// $Body .= "\n";
 
// $Body .= "Message: ";
// $Body .= $message;
// $Body .= "\n";
 
// // send email
// $success = mail($EmailTo, $Subject, $Body, "From:".$email);
 
// // redirect to success page
// if ($success){
//    echo "success";
// }else{
//     echo "invalid";
// }

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

        // $mail = new PHPMailer(true);
        // $mail->IsSMTP();
        // $mail->SMTPAuth = true;
        // // $mail->SMTPSecure = 'tls';
        // $mail->Host='smtp.gmail.com';
        // $mail->Port = 465;
        // $mail->Username = "benjaminboeuf.bdx@gmail.com";
        // $mail->Password = "8213+benjamin";
        // $mail->From=$email;
        // $mail->FromName=$name;
        // $mail->AddAddress('jeanforteroche@outlook.fr');
        // $mail->AddReplyTo('benjaminboeuf.bdx@gmail.com');     
        // $mail->Subject='Nouveau message de '. $name . '- Un Billet pour l\'Alaska';
        // $mail->Body=$message;

        // if(!$mail->Send()) { //Teste le return code de la fonction
        //   echo "Erreur: Mail non envoyé";
        // }
        // else {     
        //   echo 'Mail envoyé avec succès';
        // }

        // $mail->SmtpClose();
        // unset($mail);


$mail = new PHPMailer(true);
//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "benjaminboeuf.bdx@gmail.com";                 
$mail->Password = "8213+benjamin";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = $email;
$mail->FromName = $name;

$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);

$mail->addAddress("jeanforteroche@outlook.fr");

// $mail->isHTML(true);

$mail->Subject = "Nouveau message de ". $name ." - Un Billet pour l'Alaska";
$mail->Body = $message;
// $mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
?>
