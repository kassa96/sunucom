<?php 
function addRedacteur($redacteur,$db)
{
$req = $db->prepare('INSERT INTO 
	                 redacteur(id_user,profession, bibliographie, nbre_abonnee,nbre_article) 
	                 VALUES(:id_user, :profession, :bibliographie, :nbre_abonnee,:nbre_article)');
$req->execute(array(
'id_user' => $redacteur['id_user'],
'profession' => $redacteur['profession'],
'bibliographie' => $redacteur['bibliographie'],
'nbre_abonnee' => 0,
'nbre_article'=>0
));	
}
function updateRedacteur($redacteur,$db)
{
$req = $db->prepare('UPDATE redacteur SET 
	                  id_user = :id_user,
	                  profession = :profession,
	                  bibliographie = :bibliographie,
	                  nbre_abonnee = :nbre_abonnee,
	                  nbre_article = :nbre_article
                     WHERE id = :id');
$req->execute(array(
'id' => $redacteur['id'],	
'id_user' => $redacteur['id_user'],
'profession' => $redacteur['profession'],
'bibliographie' => $redacteur['bibliographie'],
'nbre_abonnee' => $redacteur['nbre_abonnee'],
'nbre_article' => $redacteur['nbre_article']
));	
	
}
function removeRedacteur($redacteur,$db)
{
$req = $db->prepare('DELETE FROM redacteur
                     WHERE id = :id');
$req->execute(array(
'id' => $redacteur['id']
));		
}
function findRedacteur($id,$db)
{
$req = $db->prepare('SELECT 
	                  id,id_user, profession, bibliographie, nbre_abonnee,nbre_article FROM redacteur
	                   WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findRedacteurByUser($id,$db)
{
$req = $db->prepare('SELECT 
	                  redacteur.id,user.name, user.email, user.password, user.profil, user.genre, user.date_inscription,user.jeton, user.etat_user,redacteur.id_user, redacteur.profession, redacteur.bibliographie, redacteur.nbre_abonnee ,redacteur.nbre_article
	                  FROM redacteur INNER JOIN user ON redacteur.id_user=user.id
	                   WHERE redacteur.id_user = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findRedacteurWithUser($id,$db)
{
$req = $db->prepare('SELECT 
	                  redacteur.id,user.name, user.email, user.password, user.profil, user.genre, user.date_inscription,user.jeton, user.etat_user,redacteur.id_user, redacteur.profession, redacteur.bibliographie, redacteur.nbre_abonnee ,redacteur.nbre_article
	                  FROM redacteur INNER JOIN user ON redacteur.id_user=user.id
	                   WHERE redacteur.id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
 ?>