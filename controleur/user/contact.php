<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/contact.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$contact=array();
$contact['email']="";
$contact['message']="";
$contact['contenu']="";
if(isset($_POST['email'])&&isset($_POST['contenu'])){
$contact['email']=$_POST['email'];
$contact['contenu']=$_POST['contenu'];	
if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email'])){
if (strlen($_POST['contenu'])>0) {
	addContact($_POST['email'],$_POST['contenu'],$db);

}
else{
$contact['message']="Vous n'avez pas saisie de méssage";
include ("./../../view/user/contact.php");	
}
}
else{
	$contact['message']="votre email est incorrecte";
include ("./../../view/user/contact.php");
}
}
else{
	include ("./../../view/user/contact.php");
}
?>