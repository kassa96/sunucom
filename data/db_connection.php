<?php
function getDBInstance(){
	$bdd =null;
	try
{
$bdd = new PDO('mysql:host=localhost;dbname=micro-blog_economie', 'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
$bdd->exec("SET NAMES 'utf8'");
return $bdd;
}
?>