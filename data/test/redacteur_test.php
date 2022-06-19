<?php
include_once ('C:/wamp64/www/micro_blog_economie/data/db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/redacteur.php');
$db=getDBInstance();
$redacteur= array(
	         'id' =>1,
	         'id_user' =>1,
	         'profession' =>"staticien",
	         'bibliographie' =>"je suis bla bla",
	         'nbre_abonnee' =>5);
$redacteur1= array(
	         'id_user' =>1,
	         'profession' =>"ingenieur en finance",
	         'bibliographie' =>"je suis bla bla",
	         'nbre_abonnee' =>1);
//addRedacteur($redacteur,$db);
//updateRedacteur($redacteur,$db);
//removeRedacteur($redacteur,$db);
$redacteur=findRedacteurWithUser(2,$db);
if ($redacteur!=null) {
	echo $redacteur["profession"];
}
else echo "no user";
?>