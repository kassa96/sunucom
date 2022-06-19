<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../util/routage_url.php');
if (!isset($_SESSION['redacteur'])) {
    $connexion=urlConnexion();  
header("Location: ".$connexion); 
}
$db=getDBInstance();
$topSecteur=findCategories($db);

$redacteur_id=$_SESSION['redacteur']['id_user'];
$redacteur=findRedacteurByUser($redacteur_id,$db);
if (!isset($redacteur)) {
    $connexion=urlConnexion();  
header("Location: ".$connexion); 
}
if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['metier'])&&isset($_POST['genre'])) {
 $user=findUser($redacteur['id_user'],$db);
 $user['name']=(strlen($_POST['name'])>=5)?$_POST['name']:$user['name'];
 $user['email']=(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$user['email']))?$_POST['email']:$user['email'];
 $redacteur['profession']=(strlen($_POST['metier'])>=5)?$_POST['metier']:$redacteur['profession'];
 $redacteur['bibliographie']=(strlen($_POST['portrait'])>=5)?$_POST['portrait']:$redacteur['bibliographie'];
 if($_POST['genre']=="m"||$_POST['genre']=="f")
  $user['genre']=$_POST['genre'];

 updateUser($user,$db);
 updateRedacteur($redacteur,$db);
 $message="2";
  $redacteur_show=urlMessageProfil($redacteur['id_user'],$message);
header("Location: ".$redacteur_show); 
}
else{
  
include ("./../../view/redacteur/edit-redacteur.php");
}
?>