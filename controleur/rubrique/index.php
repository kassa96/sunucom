<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/category.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../util/routage_url.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../util/date.php');
header('Content-Type: text/html; charset=utf-8');
$db=getDBInstance();
$liste=array();
$rubriques=findCategories($db);
$topSecteur=findCategories($db);

foreach ($rubriques as $key => $rubrique) {
	$rubrique['article']=array();
	$liste[]=$rubrique;
	$articles=findArticleForIdCategory($db,$rubrique['id']);
	$liste[count($liste)-1]['article']=$articles;

}
include ("./../../view/category/index.php");	

?>