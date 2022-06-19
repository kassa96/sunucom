<?php
function addLecteur($lecteur,$db)
{
$req = $db->prepare('INSERT INTO lecteur ( id_user, id_article) 
	                 VALUES (:id_user, :id_article)');
$req->execute(array(
'id_user' => $lecteur['id_user'],
'id_article' => $lecteur['id_article']
));	
}
function updateLecteur($lecteur,$db)
{
$req = $db->prepare('UPDATE lecteur SET 
	                  id_user = :id_user,
	                  id_article = :id_article
                     WHERE id = :id');
$req->execute(array(
'id' => $lecteur['id'],
'id_user' => $lecteur['id_user'],
'id_article' => $lecteur['id_article']
));		
}
function removeLecteur($lecteur,$db)
{
$req = $db->prepare('DELETE FROM lecteur WHERE id= :id');
$req->execute(array(
'id' => $lecteur['id']
));		
}
function findLecteur($id,$db)
{
$req = $db->prepare('SELECT * FROM lecteur WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findLecteurForArticle($db,$id)
{
$req = $db->prepare('SELECT lecteur.id_user,
	                        lecteur.id_article,
	                        lecteur.date_lue,
	                        user.name, user.profil
	                         FROM lecteur INNER JOIN user ON user.id=lecteur.id_user
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
function findLecteurForUserAndArticle($db,$id,$id_article)
{
$req = $db->prepare('SELECT lecteur.id_user,
	                        lecteur.id_article,
	                        lecteur.date_lue,
	                        user.name, user.profil
	                         FROM lecteur INNER JOIN user ON user.id=lecteur.id_user
	                         WHERE id_user = :id AND id_article=:id_article');
$req->execute(array('id' => $id,
                     'id_article'=>$id_article));
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