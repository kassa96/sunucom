<?php
function addComment($comment,$db)
{
$req = $db->prepare('INSERT INTO comment (id_user,id_article,texte,reponse) VALUES
                                         (:id_user,:id_article,:texte,:reponse)');
$req->execute(array(
'id_user' => $comment['id_user'],
'id_article' => $comment['id_article'],
'texte' => $comment['texte'],
'reponse' => $comment['reponse']
));	
}
function updateComment($comment,$db)
{
$req = $db->prepare('UPDATE comment SET 
	                  id_user = :id_user,
	                  id_article = :id_article,
	                  texte=:texte,
	                  reponse=:reponse
                     WHERE id = :id');
$req->execute(array(
'id' => $comment['id'],	
'id_user' => $comment['id_user'],
'id_article' => $comment['id_article'],
'texte' => $comment['texte'],
'reponse' => $comment['reponse']
));		
}
function removeComment($comment,$db)
{
$req = $db->prepare('DELETE FROM comment
                     WHERE id = :id');
$req->execute(array(
'id' => $comment['id']
));		
}
function findComment($id,$db)
{
$req = $db->prepare('SELECT 
	                  * FROM comment
	                   WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findCommentsForArticle($article,$db)
{
$req = $db->prepare('SELECT * FROM comment WHERE id_article=:id');
$req->execute(array('id' => $article['id_article']));
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findCommentsAndUserForArticle($article,$db)
{
$req = $db->prepare('SELECT 	
                           comment.id,comment.id_user,comment.id_article,
                           comment.texte,comment.reponse,user.id AS user_id,user.name, user.profil 
	                   FROM comment INNER JOIN user ON comment.id_user=user.id
	                   WHERE id_article=:id');
$req->execute(array('id' => $article['id']));
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
