<?php
include_once ('C:/wamp64/www/micro_blog_economie/data/db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/category.php');
$db=getDBInstance();
define('nbre_category_show', 3);
define('nbre_article_show', 20);
$index_cat_current = 3;//(isset($_GET['index_current'])) ? $_GET['index_current'] : 0 ;
/*
* on recupere la liste des id pour les category que l'utilisateur a déja visité à travers un cooki
*/
$tab_id_cat=array();
if (isset($_COOKIE['abc'])) {
	$tab_id_cat=explode(".",$_COOKIE['abc']);
}
/*
* on recupere la liste des category que l'utilisateur a déja lue leur articles
*/
if (count($tab_id_cat)!=0) {
	$liste_cat1=array();
	$liste_cat2=array();
if ($index_cat_current<count($tab_id_cat)) {
	$liste_cat1=findCategoryForIdList($db,$tab_id_cat,$index_cat_current,nbre_category_show);
	foreach ($liste_cat1 as $cat) {
	echo $cat['id']." => ". $cat['secteur']."<br/>";
}
echo "---------------------------------------<br/>";

}
if (count($liste_cat1)<nbre_category_show) {
	$liste_cat2=array();
    $limite=nbre_category_show-count($liste_cat1);
    echo $limite."<br/>";
    if(count($liste_cat1)!=0)
	$liste_cat2=findCategoryForNotIdList($db,$tab_id_cat,$index_cat_current,$limite);
else
	$liste_cat2=findAllCategory($db,$index_cat_current,$limite);
	foreach ($liste_cat2 as $cat) {
	echo $cat['id']." => ". $cat['secteur']."<br/>";
}
}
$liste_cat=array();
$liste_cat=array_merge($liste_cat1,$liste_cat2);
}
else{
	$liste_cat=array();
	$liste_cat=findAllCategory($db,$index_cat_current,nbre_category_show);

}
echo "---------------------------------------<br/>";

foreach ($liste_cat as $cat) {
	echo $cat['id']." => ". $cat['secteur']."<br/>";
}


?>