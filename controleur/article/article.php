<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/category.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../data/dao_entity/commentaire.php');
include_once ('./../../data/dao_entity/abonnee.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../util/routage_url.php');
include_once ('./../../util/date.php');

$db=getDBInstance();
if(!isset($_GET['article'])){
	$index=urlIndex();
	header("Location: ".$index);
}
$article=findArticle($_GET['article'],$db);
if($article==null){
$index=urlIndex();
header("Location: ".$index);
}
$topSecteur=findCategories($db);
$redacteur=findRedacteurWithUser($article['id_redacteur'],$db);
$comments=findCommentsAndUserForArticle($article,$db);
$liste_article=findArticleForIdCategory($db,$article['id_category']);
if(count($liste_article)<=0){
$liste_article=findAllArticle($db);
}
$current_user=array();
if (isset($_SESSION['user'])) {
	$current_user=$_SESSION['user'];
}
else 
$current_user['profil']="image/profil/default-profil.png";
$nbre_comment=0;
$nbre_comment=count($comments);
include ("./../../view/article/article.php");
?>