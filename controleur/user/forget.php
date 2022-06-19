<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../util/routage_url.php');
include_once ('./../../util/mail.php');
include_once ('./../../data/dao_entity/category.php');

if (isset($_SESSION['user'])) {
    $index=urlIndex();  
header("Location: ".$index); 
}
$db=getDBInstance();
$topSecteur=findCategories($db);

$user=array();
$user['email']="";
$user["erreur"]="";
if(isset($_POST['email'])){
	$user['email']=$_POST['email'];
if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$user['email'])) 
{
$user['email']=$_POST['email'];
$user_current=findUserByEmail($user['email'],$db);
if($user_current!=null){
	updateUser($user_current);
	changePassword($user);
	include ("./../../view/user/initialisation.php");

}else{
$inscription=urlInscription();
$user["erreur"]=" Votre email n'existe pas ! ";
include ("./../../view/user/forget.php");	
}
}
else{
	$user["erreur"]=" Votre email ou votre mot de passe est incorrecte  ! ";
include ("./../../view/user/forget.php");
}
}
else{
	include ("./../../view/user/forget.php");
}
?>