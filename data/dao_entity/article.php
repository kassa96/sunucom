<?php
function insertArticle($article,$db)
{
$req = $db->prepare('INSERT INTO 
	                 article (theme,contenu,photo_couverture,
	                 date_publication,etat_article,nbre_lecteur,
	                 nbre_comment,id_category,id_redacteur) VALUES 
	                 (:theme,:contenu,:photo_couverture,
	                 :date_publication,:etat_article,:nbre_lecteur,
	                 :nbre_comment,:id_category,:id_redacteur)');
$req->execute(array(
'theme' => $article['theme'],
'contenu' => $article['contenu'],
'photo_couverture' => $article['photo_couverture'],
'date_publication' => $article['date_publication'],
'etat_article' => $article['etat_article'],
'nbre_lecteur' => $article['nbre_lecteur'],
'nbre_comment' => $article['nbre_comment'],
'id_category' => $article['id_category'],
'id_redacteur' => $article['id_redacteur']
));	
}
function updateArticle($article,$db)
{
$req = $db->prepare('UPDATE article SET 
	                   theme = :theme,
	                   contenu = :contenu,
	                   photo_couverture= :photo_couverture,
	                   date_publication = :date_publication,
	                   etat_article = :etat_article,
	                   nbre_lecteur = :nbre_lecteur,
	                   nbre_comment = :nbre_comment,
	                   id_category = :id_category,
	                   id_redacteur = :id_redacteur
                     WHERE id = :id');
$req->execute(array(
'id' => $article['id'],
'theme' => $article['theme'],
'contenu' => $article['contenu'],
'photo_couverture' => $article['photo_couverture'],
'date_publication' => $article['date_publication'],
'etat_article' => $article['etat_article'],
'nbre_lecteur' => $article['nbre_lecteur'],
'nbre_comment' => $article['nbre_comment'],
'id_category' => $article['id_category'],
'id_redacteur' => $article['id_redacteur']
));			
}
function removeArticle($article,$db)
{
$req = $db->prepare('DELETE FROM article
                     WHERE id = :id');
$req->execute(array(
'id' => $article['id']
));		
}
function findArticle($id,$db)
{
$req = $db->prepare('SELECT * FROM article WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findAllArticle($db,$debut=0,$nbre=10)
{
$requete="SELECT * FROM article ORDER BY date_publication DESC LIMIT :debut, :nbre ";
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
/*
function findArticleForAbonnee($db,$liste_id,$debut=0,$nbre=60)
{
foreach ($liste_id as $key => $value) {
	$liste_id[$key]="'".$value."'";
}
$liste_id=implode(",", $liste_id);
$requete="SELECT * FROM article WHERE id_redacteur IN (".$liste_id.") LIMIT :debut, :nbre ";
$req = $db->prepare($requete);
$req->execute(array(
'debut' => $debut,	
'nbre' => $nbre
));	
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}*/
function findArticleForCategory($db,$liste_cat)
{
foreach ($liste_cat as $key => $value) {
	$liste_cat[$key]="'".$value."'";
}
$liste_cat=implode(",", $liste_cat);
$requete="SELECT * FROM article WHERE id_category IN (".$liste_cat.") ";
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
function findListArticleForIdCategory($db,$category_id)
{
$requete="SELECT category.secteur, article.id,article.theme,
	                        article.photo_couverture,article.video, category.nbre_article FROM category INNER JOIN article 
	                        ON category.id=article.id_category  WHERE category.id =:id AND article.etat_article=1 ORDER BY article.date_publication DESC ";
$req = $db->prepare($requete);
$req->execute(array(
'id' => $category_id
));
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findArticleForIdCategory($db,$category_id,$debut=0,$nbre=8)
{
$requete="SELECT * FROM article WHERE id_category =:id AND etat_article=1 ORDER BY date_publication DESC LIMIT ".$debut." , ".$nbre;
$req = $db->prepare($requete);
$req->execute(array(
'id' => $category_id
));
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findArticleByRedacteur($db,$redacteur_id)
{
$requete="SELECT * FROM article WHERE id_redacteur =:id AND etat_article=1 ORDER BY date_publication DESC ";
$req = $db->prepare($requete);
$req->execute(array(
'id' => $redacteur_id
));
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findArticleNotShowByRedacteur($db,$redacteur_id)
{
$requete="SELECT * FROM article WHERE id_redacteur =:id AND etat_article=0 ORDER BY date_publication DESC ";
$req = $db->prepare($requete);
$req->execute(array(
'id' => $redacteur_id
));
$liste = array();
$i=0;
while ($donnees = $req->fetch()) {
	$liste[$i]=$donnees;
    $i++;
}
$req->closeCursor();
return $liste;
}
function findArticleByLecteur($db,$lecteur_id)
{
$requete="SELECT * FROM article INNER JOIN lecteur ON
          article.id=lecteur.id_article WHERE lecteur.id_user =:id AND etat_article=1 ORDER BY lecteur.date_lue DESC ";
$req = $db->prepare($requete);
$req->execute(array(
'id' => $lecteur_id
));
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