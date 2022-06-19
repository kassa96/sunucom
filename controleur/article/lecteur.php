<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/lecteur.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$lecteur=array();
	if (isset($_SESSION['user'])) {
		$current_user=$_SESSION['user'];
    $lecteur=findLecteurForUserAndArticle($db,$current_user['id'],$_GET['article']);
    $article=findArticle($_GET['article'],$db);
    if($article!=null){
      if($lecteur==null){
         $lecteur['id_article']=$article['id'];
      $lecteur['id_user']=$current_user['id'];
      $current_lecteur="lecteur".$article['id'];
       addLecteur($lecteur,$db);
       $article['nbre_lecteur']=$article['nbre_lecteur']+1;
       updateArticle($article,$db);
      setcookie($current_lecteur, $article['id'], time() + 365*24*3600); 
      echo "lue";
    }
    else{
    echo "deja lue";
    }
    }
    else{
      echo "no-article";
    }
   
  }
  else 
   {
     $lecteur['id_user']=null;
   if (isset($_GET['article'])) {
    $article=findArticle($_GET['article'],$db);
    if($article!=null){
      $lecteur['id_article']=$article['id'];
      $current_lecteur="lecteur".$article['id'];
      if (!isset($_COOKIE[$current_lecteur])) {
          echo "lue";
       addLecteur($lecteur,$db);
       $article['nbre_lecteur']=$article['nbre_lecteur']+1;
       updateArticle($article,$db);
      setcookie($current_lecteur, $article['id'], time() + 365*24*3600); 
      }
      else{
        echo "deja-lue";
      }
      ;
    }
    else{
      echo "no-article";
    }
  }
   else{
    echo "no-article";
   }
   }
  
?>