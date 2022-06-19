<?php
$root="http://localhost/micro_blog_economie/";
function urlIndex($id="")
{
	global $root;
	return $url = ($id!="") ? $root.$id : $root ;
}

function urlBootstrapStyle()
{
	global $root;
	return $root."web/bootstrap/css/bootstrap.css";
}
function urlStyle($style)
{
	global $root;
	return $root."web/style/".$style.".css";
}
function urlInscriptionStyle()
{
	global $root;
	return $root."web/style/style.css";
}
function urlIUserProfilStyle()
{
	global $root;
	return $root."web/style/user-profil.css";
}
function urlValidationtionStyle()
{
	global $root;
	return $root."web/style/style.css";
}
function urlConnexionStyle()
{
	global $root;
	return $root."web/style/style.css";
}
function urlBootstrapScript()
{
	global $root;
	return $root."web/bootstrap/js/bootstrap.js";
}
function urlJqueryScript()
{
	global $root;
	return $root."web/bootstrap/js/jquery-3.2.0.js";
}
function urlScript($script)
{
	global $root;
	return $root."web/js/".$script.".js";

}

function urlInscriptionScript()
{
	global $root;
	return $root."web/js/inscription.js";
}
function urlConnexionScript()
{
	global $root;
	return $root."web/js/connexion.js";
}
function urlValidationScript()
{
	global $root;
	return $root."web/js/validation.js";
}
function urlForgetScript()
{
	global $root;
	return $root."web/js/forget.js";
}
function urlInitialisationScript()
{
	global $root;
	return $root."web/js/initialisation.js";
}
function urlChangeScript()
{
	global $root;
	return $root."web/js/change.js";
}
function urlAddRedacteurScript()
{
	global $root;
	return $root."web/js/add-redacteur.js";
}
function urlEditRedacteurScript()
{
	global $root;
	return $root."web/js/edit-redacteur.js";
}
function urlIndexScript()
{
	global $root;
	return $root."web/js/index.js";
}
function urlCommentScript()
{
	global $root;
	return $root."web/js/comment.js";
}
function urlConnexion($id="",$token="")
{
	global $root;
	if ($id!="" && $token!="")
	return $root."user/connexion/".$id."/".$token;
     else
     	return $root."user/connexion";
}
function urlInscription()
{
	global $root;
	return $root."user/inscription";
}
function urlDeconnexion()
{
	global $root;
	return $root."user/deconnexion";
}
function urlContact()
{
	global $root;
	return $root."contact";
}
function urlConditionUtilisation()
{
	global $root;
	return $root."condition-utilisation";
}
function urlValidation($id="",$token="")
{
	global $root;
	if ($id!="" && $token!="")
	return $root."user/validation/".$id."/".$token;
     else
     	return $root."user/validation";
}
function urlInitialisation($id="",$token="")
{
	global $root;
	if ($id!="" && $token!="")
	return $root."user/initialisation/".$id."/".$token;
     else
     	return $root."user/initialisation";
}
function urlForget()
{
	global $root;
	return $root."user/forget";
}
function urlRubriques($id="")
{
	global $root;
	if($root!="")
	return $root."rubriques/".$id;
    else return $root."rubriques";
}
function urlMessageIndex($message)
{
	global $root;
	return $root."message/".$message;
}
function urlProfil($id)
{
	global $root;
	return $root."user/profil/".$id;
}
function urlMessageProfil($id,$message)
{
	global $root;
	return $root."user/profil/".$id."/".$message;
}
function urlPhtotProfil($id)
{
	global $root;
	return $root."user/photo-profil/".$id;
}
function urlNewRedacteur()
{
	global $root;
	return $root."redacteur/new";
}
function urlEditRedacteur()
{
	global $root;
	return $root."redacteur/edit-profil";
}
function urlEditUser()
{
	global $root;
	return $root."user/edit-profil";
}
function urlPhotoProfil($path)
{
	global $root;
	return $root."web/".$path;
}
function urlNewPhotoProfil()
{
	global $root;
	return $root."user/photo-profil";
}
function urlPhotoCouverture($path)
{
	global $root;
	return $root."web/".$path;
}
function urlArticle($id)
{
	global $root;
	return $root."article/".$id;
}
function urlNewArticle()
{
	global $root;
	return $root."article/new";
}
function urlComment()
{
	global $root;
	return $root."comment/add";
}
function urlArticles($id)
{
	global $root;
	return $root."articles/".$id;
}
?>