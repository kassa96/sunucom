<?php
include_once ('C:/wamp64/www/micro_blog_economie/data/db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/commentaire.php');
$db=getDBInstance();
$comment= array(
	         'id' =>1,
	         'id_article' =>1,
	         'id_user' =>1,
	         'texte' =>"Cette model économique n'est pas faisable ici au sénégal",
	          'reponse'=>null);
//addComment($comment,$db);
//updateComment($comment,$db);
//removeComment($comment,$db);
/*$comment=null;
$comment=findComment(6,$db);
if($comment!=null)
echo "comment : ".$comment['texte'];
*/
$article=array("id_article"=>1);
$liste=findCommentsForArticle($article,$db);
$liste=findCommentsAndUserForArticle($article,$db);
foreach ($liste as $comment) {
	echo "comment : ".$comment["texte"];
	echo " user name : ".$comment["name"].'<br/>';
}
?>