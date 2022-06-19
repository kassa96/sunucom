<?php
function addContact($email,$contenu,$db)
{
$req = $db->prepare('INSERT INTO 
	                 contact ( email, contenu ) 
	                 VALUES(:email, :contenu)');
$req->execute(array(
'email' => $email,
'contenu' => $contenu
));	
}

?>