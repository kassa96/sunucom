<?php
function addNewletter($email,$secteur,$db)
{
$req = $db->prepare('INSERT INTO 
	                 newletter ( email, secteur ) 
	                 VALUES(:email, :secteur)');
$req->execute(array(
'email' => $email,
'secteur' => $secteur
));	
}
function updateNewletter($newletter,$db)
{
$req = $db->prepare('UPDATE secteur SET 
	                  email = :email,
	                  secteur = :secteur
                     WHERE id = :id');
$req->execute(array(
'id' => $newletter['id'],
'email' => $newletter['email']
));	
	
}
function removeNewletter($newletter,$db)
{
$req = $db->prepare('DELETE FROM newletter
                     WHERE id = :id');
$req->execute(array(
'id' => $newletter['id']
));		
}
function findNewletter($id,$db)
{
$req = $db->prepare('SELECT 
	                  id,email, secteur FROM newletter
	                   WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}

?>