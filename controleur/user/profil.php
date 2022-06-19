<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../data/dao_entity/abonnee.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$topSecteur=findCategories($db);

if (!isset($_GET['user'])) {
	$index=urlIndex();  
    header("Location: ".$index); 
}
$user=findUser($_GET['user'],$db);
if($user==null){
$index=urlIndex();  
    header("Location: ".$index);	
}
$redacteur=findRedacteurByUser($user['id'],$db);
if($redacteur!=null){
	$doublon=null;
	if(isset($_SESSION['user'])){
    $abonnee=array();
	$abonnee['id_redacteur']=$redacteur['id'];
	$abonnee['id_user']=$_SESSION['user']['id'];
    $doublon=isDuplicate($abonnee,$db);
	}
	$liste_article_publier=findArticleByRedacteur($db,$redacteur['id']);
	$liste_article_nom_publier=array();
	if(isset($_SESSION['redacteur'])&&$_SESSION['redacteur']['id']==$redacteur['id'])
	$liste_article_nom_publier=findArticleNotShowByRedacteur($db,$redacteur['id']);
	include ("./../../view/user/profil-redacteur.php");
}
else if (isset($_SESSION['user'])) {
	$liste_article=findArticleByLecteur($db,$_SESSION['user']['id']);
	include ("./../../view/user/profil.php");
}
else{
	$index=urlIndex();  
header("Location: ".$index); 
}

?>