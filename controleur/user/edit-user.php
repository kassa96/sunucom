<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../util/routage_url.php');
if (!isset($_SESSION['user'])) {
    $connexion=urlConnexion();  
header("Location: ".$connexion); 
}
$db=getDBInstance();
$topSecteur=findCategories($db);

$user_id=$_SESSION['user']['id'];
$user=findUser($user_id,$db);
if (!isset($user)) {
    $connexion=urlConnexion();  
header("Location: ".$connexion); 
}
if (isset($_POST['name'])&&isset($_POST['email'])) {
 $user=findUser($user['id'],$db);
 $user['name']=(strlen($_POST['name'])>=5)?$_POST['name']:$user['name'];
 $user['email']=(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$user['email']))?$_POST['email']:$user['email'];
 if($_POST['genre']=="m"||$_POST['genre']=="f")
  $user['genre']=$_POST['genre'];

 updateUser($user,$db);
 $message="2";
	$user_show=urlMessageProfil($user['id'],$message);  
      header("Location: ".$user_show);
}
else{
  
include ("./../../view/user/edit-user.php");
}
?>