<?php
include_once ('C:/wamp64/www/micro_blog_economie/data/db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/lecteur.php');
$db=getDBInstance();
$lecteur= array(
	         'id' =>1,
	         'id_article' =>2,
	         'id_user' =>1,
	         'date_lue'=>null);
//addLecteur($lecteur,$db);
updateLecteur($lecteur,$db);
$lecteurs=findLecteurForArticle($db,4);
foreach ($lecteurs as $lecteur) {
	echo 'user lecteur : '.$lecteur['name'].'<br/>';
}
?>