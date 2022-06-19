<?php
$from = "kassadiallo@gmail.com";

 function validationCompte($user){
 	$to=$user['email'];
 	$subject = "<h1> Activation de votre compte </h1>";
 	$validation=urlValidation($user['id'],$user['jeton']);
	$lien='<a href="'.$validation.'">'.$validation.'</a>';
	$message = '<h3>Veuillez cliquer sur ce lien '.$lien.' pour activer votre compte<h3/><br/>';
 	$headers = "From:" . $from;
 	// mail($to,$subject,$message, $headers);
 }
 function changePassword($user){
 	$user['jeton']=""+time();
	$initialisation=urlInitialisation($user['jeton']);
    $to = $user['email'];
    $subject = "<h1>Changement mot de passe oublié</h1>";
    $lien='<a href="'.$initialisation.'">ici</a>';
    $message = '<h3>Mot de passe oublié : Veuillez cliquer sur ce lien '.$lien.' pour changer votre mot de passe<h3/><br/>';
         $headers = "From:" . $from;
   // mail($to,$subject,$message, $headers);
 }
?>