<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../util/routage_url.php');
include_once ('./../../data/dao_entity/category.php');

if (isset($_SESSION['user'])) {
    $index=urlIndex();  
header("Location: ".$index); 
}
$db=getDBInstance();
$topSecteur=findCategories($db);

if (isset($_GET['token'])&&isset($_GET['id'])){
	$id=(int)$_GET['id'];
$user=findUser($id,$db);
if ($user!=null && $user['jeton']==$_GET['token']) {
$user['etat_user']=1;
updateUser($user,$db);
echo $user['etat_user'];
$user_sesion=array();
	$user_session['id']=$user['id'];
	$user_session['name']=$user['name'];
	$user_session['profil']=$user['profil'];
	$_SESSION['user']=$user_session;
	$message="1";
	$user_show=urlMessageProfil($id,$message);  
      header("Location: ".$user_show);		
}
else{
$inscription=urlInscription();	
header("Location: ".$inscription);
}		
}
else{
	
include ("./../../view/user/validation.php");
}
?>