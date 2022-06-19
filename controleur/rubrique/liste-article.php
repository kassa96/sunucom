<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/category.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../util/routage_url.php');
include_once ('./../../util/date.php');
$db=getDBInstance();
$liste=array();
$topSecteur=findCategories($db);

if(!isset($_GET['secteur']))
{
$index=urlIndex();  
header("Location: ".$index); 
}
$articles=findListArticleForIdCategory($db,$_GET['secteur']);
include ("./../../view/category/liste-article.php");	

?>