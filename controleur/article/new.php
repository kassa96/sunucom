<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/redacteur.php');
include_once ('./../../data/dao_entity/category.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$topSecteur=findCategories($db);
$article=array();
$article['erreur']="";
if (isset($_SESSION['redacteur'])) {
	if (isset($_POST['theme'])&&
		isset($_POST['secteur'])&&
		isset($_FILES['couverture'])) {
		$article['theme']=$_POST['theme'];
	    $article['secteur']=$_POST['secteur'];
		if($_POST['secteur']=="autre"){
			if(isset($_POST['autre-secteur'])&&$_POST['autre-secteur']!=""){
				 $article['secteur']=$_POST['autre-secteur'];
			}
			else{
                 $article['secteur']=null;
			}

		}
		if($article['secteur']!=null){
			if ($_POST['theme']!="") {
				$article['theme']=$_POST['theme'];
				$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
				$extensions_videos = array('mp4', 'webm');
			 $size=1000000;
			 $path="image/article/photo_couverture/".time();
			 $infosfichier = pathinfo($_FILES['couverture']['name']);
             $extension_upload = $infosfichier['extension'];
             $path=$path.".".$extension_upload;
			 
        	if (upload($_FILES['couverture'],$extensions_autorisees,$size,$path)) {
        		$article['photo_couverture']=$path;  
        		 if(isset($_POST['contenu'])&&$_POST['contenu']!=""){
                  $article['contenu']=$_POST['contenu'];
                 } 
                 else{
                 	$secteurs=findAllCategory($db);
                 $article['erreur']="Erreur : Vous devez ecrire du contenu pour votre article";
			       include ("./../../view/article/new-article.php");	
                 }      		
        		}	
        	else{
        		$secteurs=findAllCategory($db);
			$article['erreur']="Erreur : Vous devez ajouter une photo de couverture qui fait moins de 1 Mo ";
			include ("./../../view/article/new-article.php");
		}
				}	
				else{
					$secteurs=findAllCategory($db);
				$article['erreur']="Erreur : Veuillez choisir un titre pour votre article";
			include ("./../../view/article/new-article.php");	
				}
		}
		else{
			$secteurs=findAllCategory($db);
			$article['erreur']="Erreur : Veuillez choisir une secteur d'activité";
			include ("./../../view/article/new-article.php");
		}


	}
	else{
	$secteurs=findAllCategory($db);
	include ("./../../view/article/new-article.php");
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
//$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
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