<?php

require "./phpmailer/class.phpmailer.php";

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

        $mail = new PHPmailer();
        $mail->IsSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->From=$email;
        $mail->FromName=$name;
        $mail->AddAddress('jeanforteroche@outlook.fr');
        $mail->AddReplyTo('ben.bdx@outlook.com');     
        $mail->Subject='Nouveau message de '. $name . '- Un Billet pour l\'Alaska';
        $mail->Body=$message;

        if(!$mail->Send()) { //Teste le return code de la fonction
          echo "Erreur: Mail non envoyé";
        }
        else {     
          echo 'Mail envoyé avec succès';
        }

        $mail->SmtpClose();
        unset($mail);
?>
