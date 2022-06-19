<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/category.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../util/routage_url.php');
include_once ('./../../util/date.php');
$db=getDBInstance();
$topSecteur=findCategories($db);

$liste=array();
$rubriques=findAllCategory($db);
include ("./../../view/category/all.php");	

?>