<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../data/dao_entity/abonnee.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$abonnee=array();
	if (isset($_SESSION['user'])) {
	 if (isset($_GET['user'])) {
	 	$redacteur=findRedacteur($_GET['user'],$db);
	 	if($redacteur!=null){
      $abonnee['id_redacteur']=$redacteur['id'];
      $abonnee['id_user']=$_SESSION['user']['id'];
      if (!isDuplicate($abonnee,$db)) {
         addAbonnee($abonnee,$db);
         $redacteur['nbre_abonnee']=$redacteur['nbre_abonnee']+1;
         updateRedacteur($redacteur,$db);
         echo "ok";     
        }
        else{
          echo "doublons";
        } 

    }
    else{
      echo "no-redacteur";
    }
  }
	 else{
	 	echo "no-redacteur";
	 }
  }
   else{
    echo "no-user";
   }
?>