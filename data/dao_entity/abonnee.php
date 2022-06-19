<?php
function addAbonnee($abonnee,$db)
{
$req = $db->prepare('INSERT INTO abonnee (id_user, id_redacteur)VALUES (:id_user,:id_redacteur)');
$req->execute(array(
'id_user' => $abonnee['id_user'],
'id_redacteur' => $abonnee['id_redacteur']
));	
}
function updateAbonnee($Abonnee,$db)
{
$req = $db->prepare('UPDATE abonnee SET 
	                  id_user = :id_user,
	                  id_redacteur = :id_redacteur,
	                  date_abonnee = :date_abonnee
                     WHERE id = :id');
$req->execute(array(
'id_user' => $abonnee['id_user'],
'id_redacteur' => $abonnee['id_redacteur'],
'date_abonnee' => $abonnee['date_abonnee']
));		
}
function removeAbonnee($abonnee,$db)
{
$req = $db->prepare('DELETE FROM abonnee WHERE id= :id');
$req->execute(array(
'id' => $abonnee['id']
));		
}
function findAbonnee($id,$db)
{
$req = $db->prepare('SELECT * FROM abonnee WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function isDuplicate($abonnee,$db)
{
$req = $db->prepare('SELECT * FROM abonnee WHERE id_user = :id_user AND id_redacteur=:id_redacteur');
$req->execute(array('id_user' => $abonnee['id_user'],
                     'id_redacteur' => $abonnee['id_redacteur']));
$donnees = $req->fetch();
$req->closeCursor();
if ($donnees!=null) {
	return true;
}
else return false;
}
function findLecteurForAbonnee($db)
{
$req = $db->prepare('SELECT abonnee.id_user,
	                        abonnee.id_article,
	                        abonnee.date_abonnee,
	                        user.name, user.profil
	                         FROM abonnee INNER JOIN user ON user.id=abonnee.id_user
	                         WHERE id_article = :id');
$req->execute(array('id' => $id));
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
?>