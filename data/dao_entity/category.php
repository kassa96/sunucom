<?php
function newCategory($category,$db)
{
$req = $db->prepare('INSERT INTO category ( secteur, nbre_article) VALUES (:secteur, :nbre_article)');
$req->execute(array(
'secteur' => $category['secteur'],
'nbre_article' => $category['nbre_article']
));	
}
function updateCategory($category,$db)
{
$req = $db->prepare('UPDATE category SET 
	                  secteur = :secteur,
	                  nbre_article = :nbre_article
                     WHERE id = :id');
$req->execute(array(
'id' => $category['id'],	
'secteur' => $category['secteur'],
'nbre_article' => $category['nbre_article']
));		
}
function removeCategory($category,$db)
{
$req = $db->prepare('DELETE FROM category
                     WHERE id = :id');
$req->execute(array(
'id' => $category['id']
));		
}
function findCategory($id,$db)
{
$req = $db->prepare('SELECT 
	                  id,secteur, nbre_article FROM category
	                   WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findCategories($db,$debut=0,$nbre=3)
{
$requete="SELECT id,secteur, nbre_article FROM category  
          ORDER BY nbre_article DESC LIMIT ".$debut." , ".$nbre;
$req = $db->prepare($requete);
$req->execute();	
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findAllCategory($db)
{
$requete="SELECT id,secteur, nbre_article FROM category  
          ORDER BY nbre_article DESC ";
$req = $db->prepare($requete);
$req->execute();	
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findAllCategoryWithArticle($db,$debut=0,$nbre=60)
{
$req = $db->prepare('SELECT category.id,category.secteur, 
	                        category.nbre_article, article.id AS article_id,article.theme,
	                        article.photo_couverture FROM category INNER JOIN article 
	                        ON category.id=article.id_category 
	                        ORDER BY category.id LIMIT :debut, :nbre ');
$req->execute(array(
'debut' => $debut,	
'nbre' => $nbre
));	
$liste = array();
$liste_cat= array();
$liste_article= array();
while ($donnees = $req->fetch()) {
	$liste[]=$donnees;
	$liste_cat[]=array('id' => $donnees['id'],
		               'secteur' => $donnees['secteur'],
		               'nbre_article' => $donnees['nbre_article']);
	$liste_article[]=array('article_id' => $donnees['article_id'],
		               'theme' => $donnees['theme'],
		               'photo_couverture' => $donnees['photo_couverture']);
}
$req->closeCursor();
$liste=array();
$liste[0]=$liste_cat[0];
$liste[0]['article']=array();
$liste[0]['article'][0]=$liste_article[0];
for ($i=0; $i < count($liste_cat)-1; $i++) { 
	if($liste_cat[$i]['id']!=$liste_cat[$i+1]['id']){
      $liste[]=$liste_cat[$i+1];
      $liste[count($liste)-1]['article']=array();
      $liste[count($liste)-1]['article'][]=$liste_article[$i+1];
  }
      else{
      $liste[count($liste)-1]['article'][]=$liste_article[$i+1];

	}
}
return $liste;
}

function findArticleForAbonnee($db,$liste_id,$debut=0,$nbre=60)
{
	foreach ($liste_id as $key => $value) {
	$liste_id[$key]="'".$value."'";
}
$liste_id=implode(",", $liste_id);
$liste=null;
if ($liste_id!="") {
$req = $db->prepare("SELECT category.id,category.secteur, 
	                        category.nbre_article, article.id AS article_id,article.theme,
	                        article.photo_couverture FROM category INNER JOIN article 
	                        ON category.id=article.id_category,article.id_redacteur
	                         WHERE article.id_redacteur IN (".$liste_id.") 
	                        ORDER BY category.id LIMIT :debut, :nbre ");
$req->execute(array(
'debut' => $debut,	
'nbre' => $nbre
));	
$liste = array();
$liste_cat= array();
$liste_article= array();
while ($donnees = $req->fetch()) {
	$liste[]=$donnees;
	$liste_cat[]=array('id' => $donnees['id'],
		               'secteur' => $donnees['secteur'],
		               'nbre_article' => $donnees['nbre_article']);
	$liste_article[]=array('article_id' => $donnees['article_id'],
		               'theme' => $donnees['theme'],
		               'photo_couverture' => $donnees['photo_couverture']);
}
$req->closeCursor();
$liste=array();
$liste[0]=$liste_cat[0];
$liste[0]['article']=array();
$liste[0]['article'][0]=$liste_article[0];
for ($i=0; $i < count($liste_cat)-1; $i++) { 
	if($liste_cat[$i]['id']!=$liste_cat[$i+1]['id']){
      $liste[]=$liste_cat[$i+1];
      $liste[count($liste)-1]['article']=array();
      $liste[count($liste)-1]['article'][]=$liste_article[$i+1];
  }
      else{
      $liste[count($liste)-1]['article'][]=$liste_article[$i+1];

	}
}
}
return $liste;
}
function findCategoryForName($db,$liste_secteur)
{
foreach ($liste_secteur as $key => $value) {
	$liste_secteur[$key]="'".$value."'";
}
$liste_secteur=implode(",", $liste_secteur);
$requete="SELECT * FROM category WHERE secteur IN (".$liste_secteur.") ";
$req = $db->prepare($requete);
$req->execute();
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findCategoryForIdList($db,$liste_secteur,$debut=0,$nbre=3)
{
foreach ($liste_secteur as $key => $value) {
	$liste_secteur[$key]="'".$value."'";
}
$liste_secteur=implode(",", $liste_secteur);
$requete="SELECT * FROM category WHERE id IN (".$liste_secteur.") ORDER BY nbre_article DESC LIMIT ".$debut.", ".$nbre;
$req = $db->prepare($requete);
$req->execute();
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findCategoryForNotIdList($db,$liste_secteur,$debut=0,$nbre=3)
{
foreach ($liste_secteur as $key => $value) {
	$liste_secteur[$key]="'".$value."'";
}
$liste_secteur=implode(",", $liste_secteur);
$requete="SELECT * FROM category WHERE id NOT IN (".$liste_secteur.") 
                                ORDER BY nbre_article DESC LIMIT ".$debut.", ".$nbre;
$req = $db->prepare($requete);
$req->execute();
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
?>