<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/category.php');
include_once ('./../../util/mail.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../util/routage_url.php');
if (isset($_SESSION['user'])) {
    $index=urlIndex();  
header("Location: ".$index); 
}
$db=getDBInstance();
$topSecteur=findCategories($db);

$resultat=false;
$user=array();
$user["name"]="";
$user["email"]="";
$user["password1"]="";
$user["password2"]="";
$user["genre"]="";
$user["erreur"]="";
if (isset($_POST['name'])&&isset($_POST['email'])&&
	isset($_POST['password1'])&&isset($_POST['password2'])) {
	$user['name']=trim($_POST['name']);
	$user['email']=trim($_POST['email']);
    $user['password1']=trim($_POST['password1']);
    $user['password2']=trim($_POST['password2']);
    $user['password']=trim($_POST['password2']);
    $user['genre'] = (isset($_POST['genre'])) ? $_POST['genre'] : "" ;
    $user['profil']="image/profil/default-profil.png";
    
if (strlen($user['name'])>=5&&
	preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$user['email'])&&
	$user['password1']==$user['password2']&&( $user['genre'] =="m" || $user['genre'] =="f") ) {
	$user_base=findUserByEmail($user['email'],$db);
    if ($user_base==null) {
         $user['jeton']=""+time();
	     $user['etat_user']=0;
	     $user["password"]=sha1($user['password1']);
	     addUser($user,$db);
         $user=findUserByEmail($user['email'],$db);
         validationCompte($user);	
         $validation=urlValidation();
	    header("Location: ".$validation);	
    }else{
    	$forget=urlForget();
    	$connexion=urlConnexion();
    	$lien='<a href="'.$forget.'"> ici </a>';
    	$lien_connexion='<a href="'.$connexion.'"> ici </a>';
    $user["erreur"]=" Vous avez déja un compte avec cette email saisie <br/>
     Veuillez vous connecter ".$lien_connexion." ou réinitialiser votre mot de passe ".$lien." si vous avez oublié votre mot de passe ! ";
include ("./../../view/user/inscription.php");	
    }
    
	}
	else{
		$user["erreur"]=" Votre formulaire est mal remplie Veuillez recommencer  ! ";
include ("./../../view/user/inscription.php");
	}	
}
else{
	
include ("./../../view/user/inscription.php");
}
?>