<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
if (isset($_FILES['photo_profil'])&& (isset($_SESSION['redacteur'])||isset($_SESSION['user']))) {
	if(isset($_SESSION['redacteur']))
$user=findUser($_SESSION['redacteur']['id_user'],$db);
else if(isset($_SESSION['user']))
$user=findUser($_SESSION['user']['id'],$db);
if($user!=null){
	$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			 $size=1000000;
			 $path="image/profil/".time();
			 $infosfichier = pathinfo($_FILES['photo_profil']['name']);
             $extension_upload = $infosfichier['extension'];
             $path=$path.".".$extension_upload;
			 
        	if (upload($_FILES['photo_profil'],$extensions_autorisees,$size,$path)) {
        		$user['profil']=$path;
                 updateUser($user,$db);
        		}	
}
}
else{
$index=urlIndex();  
header("Location: ".$index); 
}

function upload($file,$extensions_autorisees,$size,$path){
	if (isset($file) AND $file['error'] == 0)
{
// Testons si le fichier n'est pas trop gros
if ($file['size'] <= $size)
{
// Testons si l'extension est autorisée
$infosfichier = pathinfo($file['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
if (in_array($extension_upload, $extensions_autorisees))
{
// On peut valider le fichier et le stocker définitivement
$path="./../../web/".$path;
move_uploaded_file($file['tmp_name'],$path);
return true;
}
else 
{
	return false;
}
}
else {
	{
	return false;
}
}
}
else{
	{
	return false;
}
}
}
?>