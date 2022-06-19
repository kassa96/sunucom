<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../data/dao_entity/category.php');

include_once ('./../../util/routage_url.php');
$portrait_default="exemple de parcours
        De nos jours : je suis professeur en finance à l'UCAD
        2019-2017 : professeur en doctorat
        2017-2015 : etudiant master en sécurité financiaire et stagiaire à la sénélec
        2017-2014 : étudiant en comptablité
        NB : ce champs est facultative vous pouvez l'ignorer";
if (!isset($_SESSION['user'])) {
    $connexion=urlConnexion();  
header("Location: ".$connexion); 
}
$listProfession=array();
$listProfession[]="amateur";
$listProfession[]="etudiant";
$listProfession[]="diplome";
$listProfession[]="professeur";
$listProfession[]="salarie";
$db=getDBInstance();
$redacteur=array();
$topSecteur=findCategories($db);

$user=$_SESSION['user'];
$redacteur["id_user"]=$user['id'];
$redacteur["profession"]="";
$redacteur["bibliographie"]="";
$curent_redacteur=findRedacteurByUser($redacteur["id_user"],$db);
if ($curent_redacteur!=null) {
  $user_show=urlProfil($curent_redacteur['id_user']);  
      header("Location: ".$user_show);    
}
if (isset($_POST['type-profession'])&&isset($_POST['metier'])&&
	isset($_POST['lieu'])&&isset($_POST['portrait'])) {
	$redacteur['bibliographie'] = (trim($_POST['portrait'])!=trim($portrait_default)) ? trim($_POST['portrait']) : "";
	if (in_array(trim($_POST['type-profession']),$listProfession)) {
       if ($_POST['profession']==$listProfession[0]) {
        $redacteur["profession"]="amateur ayant des connaissances en économie et finance";
       }
       else if ($_POST['type-profession']==$listProfession[1]) {
        if ($_POST['metier']!=""&& $_POST['lieu']!="")
          $redacteur["profession"]="étudiant en ".$_POST['metier']." à l'université ".$_POST['lieu'];
        else if ($_POST['metier']!="")
          $redacteur["profession"]="étudiant en ".$_POST['metier'];
        else if ($_POST['lieu']!="")
          $redacteur["profession"]="étudiant  à l'université ".$_POST['lieu'];
        else if ($_POST['metier']==""&& $_POST['lieu']=="")
          $redacteur["profession"]="étudiant";
       }
       else if ($_POST['type-profession']==$listProfession[2]) {
        if ($_POST['metier']!=""&& $_POST['lieu']!="")
          $redacteur["profession"]="diplomé en ".$_POST['metier']." à l'université ".$_POST['lieu'];
        else if ($_POST['metier']!="")
          $redacteur["profession"]="diplomé en ".$_POST['metier'];
        else if ($_POST['lieu']!="")
          $redacteur["profession"]="diplomé  à l'université ".$_POST['lieu'];
        else if ($_POST['metier']==""&& $_POST['lieu']=="")
          $redacteur["profession"]="diplomé";
       }
       else if ($_POST['type-profession']==$listProfession[3]) {
        if ($_POST['metier']!=""&& $_POST['lieu']!="")
          $redacteur["profession"]="professeur en ".$_POST['metier']." à ".$_POST['lieu'];
        else if ($_POST['metier']!="")
          $redacteur["profession"]="professeur en ".$_POST['metier'];
        else if ($_POST['lieu']!="")
          $redacteur["profession"]="professeur  à ".$_POST['lieu'];
        else if ($_POST['metier']==""&& $_POST['lieu']=="")
          $redacteur["profession"]="professeur";
       }
       else if ($_POST['type-profession']==$listProfession[4]) {
        if ($_POST['metier']!=""&& $_POST['lieu']!="")
          $redacteur["profession"]="salarié dans le  ".$_POST['metier']." à ".$_POST['lieu'];
        else if ($_POST['metier']!="")
          $redacteur["profession"]="salarié en ".$_POST['metier'];
        else if ($_POST['lieu']!="")
          $redacteur["profession"]="salarié  à ".$_POST['lieu'];
        else if ($_POST['metier']==""&& $_POST['lieu']=="")
          $redacteur["profession"]="salarié";
       }
       addRedacteur($redacteur,$db);
       $redacteur=findRedacteurByUser($redacteur["id_user"],$db);
       $message="1";
       $redacteur_session=array();
  $redacteur_session['id']=$redacteur['id'];
    $redacteur_session['name']=$redacteur['name'];

  $redacteur_session['id_user']=$redacteur['id_user'];
  $_SESSION['redacteur']=$redacteur_session;
        $redacteur_show=urlMessageProfil($redacteur['id_user'],$message);  
        $_SESSION['user']=null;
      header("Location: ".$redacteur_show);  

    }
   else{
    $redacteur["erreur"]="Votre formulaire est mal remplie ! ";
    include ("./../../view/redacteur/add-redacteur.php");
   }
}
else{
	
include ("./../../view/redacteur/add-redacteur.php");
}
?>