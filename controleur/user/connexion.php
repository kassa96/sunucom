<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$topSecteur=findCategories($db);

	if (isset($_SESSION['user'])) {
	$index=urlIndex();  
header("Location: ".$index); 
}
$user=array();
$user['email']="";
$user['password']="";
$user["erreur"]="";
$user["message"]="";
if(isset($_GET['id'])){
$user=findUser($_GET['id'],$db);
if($user!=null && $user['jeton']==$_GET['jeton']){
$user['erreur']="";
$user['message']="Votre mot de passe a été modifié avec succés ! <br/>Veuillez vous connecter avec votre nouveau mot de passe !";
}
else {
	$user=array();
	$user['email']="";
$user['password']="";
$user["erreur"]="";
$user["message"]="";

}
}
else
{

}

if(isset($_POST['email'])&&isset($_POST['password'])){
	$user['email']=$_POST['email'];
$user['password']=sha1($_POST['password']);
if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$user['email'])&&$user['password'] >=5) 
{
$user['email']=$_POST['email'];
$user['password']=sha1($_POST['password']);
$user_current=findUserByEmail($user['email'],$db);
if($user_current!=null){
if($user_current['password']==$user['password']){
if ($user_current['etat_user']==1) {
	$user_sesion=array();
	$user_sesion['id']=$user_current['id'];
	$user_sesion['name']=$user_current['name'];
	$user_sesion['profil']=$user_current['profil'];
	$redacteur=findRedacteurByUser($user_current['id'],$db);
	if($redacteur!=null)
	{
    $redacteur_session=array();
	$redacteur_session['id']=$redacteur['id'];
	$redacteur_session['name']=$redacteur['name'];
	$redacteur_session['id_user']=$redacteur['id_user'];
	$_SESSION['redacteur']=$redacteur_session;
	$index=urlMessageIndex("1");  
     header("Location: ".$index); 
	}
	else{
	$_SESSION['user']=$user_sesion;
    $index=urlMessageIndex("1");  
     header("Location: ".$index);
	}
}
else{
	 $user["erreur"]=" Vous avez déja un compte avec cette email saisie mais vous ne l'avez pas encore activé <br/>
     Veuillez vous connecter à votre compte mail ".$user['email']." puis cliquer sur le lien qu'on vous a envoyé pour l'activer ! ";
include ("./../../view/user/connexion.php");
}
}
else{
$forget=urlForget();
    	$lien='<a href="'.$forget.'"> ici </a>';
    $user["erreur"]=" Vous avez déja un compte avec cette email saisie mais votre mot de passe n'est pas correcte <br/>
     Veuillez réinitialiser votre mot de passe ".$lien." si vous avez oublié votre mot de passe ! ";
include ("./../../view/user/connexion.php");	
}
}else{
$inscription=urlInscription();
    	$lien='<a href="'.$inscription.'"> inscrire ici </a>';
$user["erreur"]=" Votre email n'existe pas Veullez vous ".$lien." ! ";

include ("./../../view/user/connexion.php");	
}
}
else{
	$user["erreur"]=" Votre email ou votre mot de passe est incorrecte  ! ";
include ("./../../view/user/connexion.php");
}
}
else{
	include ("./../../view/user/connexion.php");
}
?>