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
    $user['erreur']="";
if(isset($_POST['password1'])&&isset($_POST['password2']))      
{
   if(strlen($_POST['password1'])>=7){
    if ($_POST['password1']==$_POST['password2']) {
        $user['password']=sha1($_POST['password1']);
        updateUser($user,$db);
        $connexion=urlConnexion($user['id'],$user['jeton']);  
header("Location: ".$connexion); 
    }
    else{
         $user['erreur']="Vos deux mot de passe doivent étre identiques";   
include ("./../../view/user/change_password.php");
    }
   }
   else{
     $user['erreur']="votre mot de passe doit avoir plus de 7 caractéres";   
include ("./../../view/user/change_password.php");
   }
}
else
 {
include ("./../../view/user/change_password.php");
 }
}else{
$connexion=urlConnexion();  
header("Location: ".$connexion);        
}
}

else{
 $connexion=urlConnexion();  
header("Location: ".$connexion);   

}
?>