<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/newletter.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$newletter=array();
if(isset($_POST['email'])&&isset($_POST['secteur'])&&
	preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email'])){
$newletter['email']=$_POST['email'];
if ($_POST['secteur']!=0)
$cat=findCategory($_POST['secteur'],$db);
if($_POST['secteur']==0||$cat!=null){
addNewletter($newletter['email'],$cat['id'],$db);
echo "success";
}
else{
echo "no-secteur";
}
}
else{
	echo "mail-incorrecte";
}
?>