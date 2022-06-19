<?php
include_once ('C:/wamp64/www/micro_blog_economie/data/db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/article.php');
$db=getDBInstance();
$article= array(
	         'id' =>3,
	         'theme' =>"Pétrole-gaz Sénégal: comment le Sénégal atteindra 50% de contenu local en 2030 ?",
	         'contenu' =>"Pour conjurer la malédiction des ressources naturelles, le Sénégal qui devrait entamer sa production gazière en 2022 balise le terrain par une réglementation en faveur de l'inclusion. Au cœur du dispositif, une loi sur le contenu local pour permettre aux entreprises locales de mieux saisir les opportunités dans la chaîne de valeur pétro-gazière. Le texte en attente d'un decret d'application repose sur cinq points",
	         'photo_couverture' =>"image/article/photo_couverture/2.jpg",
	         'date_publication' =>"2020-01-01 11:20:39",
	         'etat_article' =>1,
	         'nbre_lecteur' =>2,
             'nbre_comment' =>3,
             'id_category' =>2,
             'id_redacteur' =>2);
//insertArticle($article,$db);
//updateArticle($article,$db);
//removeArticle($article,$db);
$liste_cat=array();
$liste_cat[] = array('id' => 1,'secteur' => 'finance', 'nbre_article' => 2);
$liste_cat[] = array('id' => 2,'secteur' => 'banque', 'nbre_article' => 5);
$liste_article=array();
$liste_article[] = array(
	         'id' =>1,
	         'theme' =>"Pétrole-gaz Sénégal: comment le Sénégal atteindra 50% de contenu local en 2030 ?",
	         'contenu' =>"Pour conjurer la malédiction des ressources naturelles, le Sénégal qui devrait entamer sa production gazière en 2022 balise le terrain par une réglementation en faveur de l'inclusion. Au cœur du dispositif, une loi sur le contenu local pour permettre aux entreprises locales de mieux saisir les opportunités dans la chaîne de valeur pétro-gazière. Le texte en attente d'un decret d'application repose sur cinq points",
	         'photo_couverture' =>"image/article/photo_couverture/2.jpg",
	         'date_publication' =>"2020-01-01 11:20:39",
	         'etat_article' =>1,
	         'nbre_lecteur' =>2,
             'nbre_comment' =>3,
             'id_category' =>1,
             'id_redacteur' =>2);
$liste_article[] = array(
	         'id' =>2,
	         'theme' =>"Pétrole-gaz Sénégal: comment le Sénégal atteindra 50% de contenu local en 2030 ?",
	         'contenu' =>"Pour conjurer la malédiction des ressources naturelles, le Sénégal qui devrait entamer sa production gazière en 2022 balise le terrain par une réglementation en faveur de l'inclusion. Au cœur du dispositif, une loi sur le contenu local pour permettre aux entreprises locales de mieux saisir les opportunités dans la chaîne de valeur pétro-gazière. Le texte en attente d'un decret d'application repose sur cinq points",
	         'photo_couverture' =>"image/article/photo_couverture/2.jpg",
	         'date_publication' =>"2020-01-01 11:20:39",
	         'etat_article' =>1,
	         'nbre_lecteur' =>2,
             'nbre_comment' =>3,
             'id_category' =>1,
             'id_redacteur' =>2);
$liste_article[] = array(
	         'id' =>3,
	         'theme' =>"Pétrole-gaz Sénégal: comment le Sénégal atteindra 50% de contenu local en 2030 ?",
	         'contenu' =>"Pour conjurer la malédiction des ressources naturelles, le Sénégal qui devrait entamer sa production gazière en 2022 balise le terrain par une réglementation en faveur de l'inclusion. Au cœur du dispositif, une loi sur le contenu local pour permettre aux entreprises locales de mieux saisir les opportunités dans la chaîne de valeur pétro-gazière. Le texte en attente d'un decret d'application repose sur cinq points",
	         'photo_couverture' =>"image/article/photo_couverture/2.jpg",
	         'date_publication' =>"2020-01-01 11:20:39",
	         'etat_article' =>1,
	         'nbre_lecteur' =>2,
             'nbre_comment' =>3,
             'id_category' =>2,
             'id_redacteur' =>2);
/*$liste=array();
$liste[0]=$liste_cat[0];
$liste[0]['article']=array();
$liste[0]['article'][]=$liste_article[0];
print_r($liste[0]['article'][0]);
*/

/*$data=findArticle(2,$db);
if ($data!=null) {
	echo $data["contenu"].'<br/>';
}
else echo "no category";
*/
$liste_id=array();
$liste_id[]=2;
//$liste=findArticleForAbonnee($db,$liste_id);
//$liste=findArticleForCategory($db,$liste_id);
$liste=findAllArticle($db);
foreach ($liste as $article) {
	insertArticle($article,$db);
}
?>