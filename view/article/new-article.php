
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlStyle("add-article").'"'; ?>/>

</head>
<body
<?php 
 if (isset($_SESSION['user'])) {
 ?> 
 style="padding-top: 70px;"
 <?php
 }
?>>
<div class=" container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top">
   <?php
   include ("./../../view/nav.php");
   ?>
  </nav>

  <section class="row">
  <div id="panel-inscription" class="col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-12 col-sm-10 col-md-8 col-lg-8">

     <div id="panel-info">
        <h4>Bienvenu au réseau social de micro blog en économie et en finance</h4>
      </div>
    <form method="post" enctype="multipart/form-data">
    <fieldset>
  <legend>Rédaction d'un nouveau article</legend>
    <div id="panel-error">
     
      <div id="erreur-redaction" class="alert alert-block alert-danger" style=" <?php if ($article['erreur']=="") {echo "display:none";}
      ?>">
     <?php echo $article['erreur']; ?>
    </div>
    </div>
    <div  class="form-group">
    <div id="panel-secteur" class="form-group ">
      <label for="secteur">Séléctionnez le secteur d'activité sur lequel vous voulez rédiger une article : </label>
      <span id="error-secteur"class="help-block"style="display:none;">Il y a un problème dans la saisie</span>
 <select id="secteur" name="secteur" class="form-control" >
         <?php
         foreach ($secteurs as $key => $secteur) {
        echo '<option value="'.$secteur["id"].'">'.$secteur["secteur"].'</option>';
         }
         ?>
         <option value="autre">autre</option>
        </select>
       <div id="panel-autre-secteur" class="form-group">
          <span id="error-autre-secteur"class="help-block"style="display:none;">Il y a un problème dans la saisie</span>
<input  placeholder="ajouter un nouveau secteur d'activité" style="margin-top:10px;display:none;" name="autre-secteur"id="autre-secteur" type="text" class="form-control">
       </div>
 
    </div>
    <div id="panel-theme" class="form-group">
      <label >Titre du article : </label>
       <span id="error-theme"class="help-block"style="display:none;">Il y a un problème dans la saisie</span>
<input name="theme"id="theme" type="text" class="form-control">

    </div>
    <div id="panel-couverture" class="form-group">
      <label for="couverture"id="couverture-label" >Ajouter une photo de couverture</label>
      <input id="couverture" style="display:none;"  type="file" name="couverture">
            <span id="error-couverture"class="help-block"style="display:none;">Veuillez ajouter une photo de couverture</span>
      <div>
        <img style="display:none;" id="photo-couverture" src="">
      </div>

    </div>
    <div id="panel-video" class="form-group">
      <label for="video"id="video-label" >Ajouter une vidéo</label>
      <input id="video" style=""  type="file" name="video">
            <span id="error-video"class="help-block"style="display:none;">Veuillez ajouter une video</span>
      <div>
         <video id="new-video"
          style="width: 100%;">
         <source src=""/>
        
          </video>
      </div>

    </div>
    <div id="panel-contenu" class="form-group">
      <label for="contenu" >Contenu de l'article: </label>
      <div>
        <input type="hidden" data-type=""name="contenu" id="id_contenu"value="1">        
        <input  onclick="commande('bold');" type="button" value="G" style="font-weight:bold;" /> 
        <input onclick="commande('italic');"type="button" value="I" style="font-style:italic;" /> 
        <input onclick="commande('underline');" type="button" value="S" style="text-decoration:underline;" /> 
        <input onclick="commande('strikethrough');" type="button" value="S" style="text-decoration:strikethrough; "/> 
        <input onclick="commande('createLink');" type="button" value="Lien" style="text-decoration:underline;" /> 
        <input type="button" value="Image" onclick="commande('insertImage');" />
        <select onchange="commande('heading', this.value); this.selectedIndex = 0;">

    <option value="">Titre</option>

    <option value="h1">Titre 1</option>

    <option value="h2">Titre 2</option>

    <option value="h3">Titre 3</option>

    <option value="h4">Titre 4</option>

    <option value="h5">Titre 5</option>

    <option value="h6">Titre 6</option>

</select>
      </div>
      <span id="error-contenu"class="help-block"style="display:none;">Veuillez ajouter du contenu pour votre article</span>
      <input type="hidden" id="contenu" name="contenu">
        <div id="editeur" contentEditable >
          
        </div>
            <span id="error-contenu"class="help-block"style="display:none">Veuillez saisir le contenu de l'articles  !</span>

    </div>
    <input type="hidden" name="type-btn">
    <button  id="ajouter-btn" class="btn btn-primary btn-md">Enregistrer l'article</button>
    <button  id="publier-btn" class="btn btn-primary btn-md">Enregistrer et publier l'article</button>
    </fieldset>
</form>
  </div>
    
  </section>
<footer class="row">
  <?php
   include ("./../../view/footer.php");

   ?>
</footer> 
</div>
</body>
<script type="text/javascript" src=<?php echo '"'.urlJqueryScript().'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"'.urlBootstrapScript().'"'; ?>></script>
<script type="text/javascript">
  $(function(){
    $('#ajouter-btn').bind('click',function(){
    $('#id_contenu').val($('#contenu').html());
    alert('ok');
    });
    $('#secteur').bind('change',function(){
     if($(this).val()=="autre"){
      $('#autre-secteur').show();
     }
     else{
      $('#autre-secteur').hide();
      $('#error-autre-secteur').hide();
     }
    });
     $('#autre-secteur').bind('blur',function(){
 $("#erreur-redaction").hide();
 verifInput("autre-secteur");
});
     $('#theme').bind('blur',function(){
    $("#erreur-redaction").hide();
    verifInput("theme");
});
    function verifInput(name_input){
var resultat;
name_input=name_input.trim();
var _name="#"+name_input;
var panel_name="#panel-"+name_input;
var error_name="#error-"+name_input;
var valeur=$(_name).val();
  if (name_input=="theme") 
  resultat=verifTitre(valeur);
  else if(name_input=="autre-secteur")
   resultat=verifSecteur(valeur); 
 else if(name_input=="contenu")
   resultat=verifSecteur(valeur); 
  if(!resultat){
    if(!$(panel_name).hasClass('has-error'))
    {
    $(panel_name).addClass('has-error');
    }
    
    $(error_name).html(message)
                    .show();
  }
  else{
    $(panel_name).removeClass('has-error');
    $(error_name).hide();
  }
  return resultat;
}
   function verifContenu(name){
  if (typeof name === 'undefined') {
    message="Veuillez saisir le contenu de l'article !";
    return false;
  }
  name=name.trim();
  if (name.length==0) {
message="Contenu vide : veuillez saisir le contenu de l'article !";
    return false;
  }
  if (name.length<100) {
message="le contenu de l'article doit faire plus de 100 caractéres !";
    return false;  
}
return true;
}  
  function verifSecteur(name){
  if (typeof name === 'undefined') {
    message="Veuillez saisir le secteur d'activité sur lequel vous redigez l'article !";
    return false;
  }
  name=name.trim();
  if (name.length==0) {
message="Secteur vide : veuillez donner un secteur d'activité à votre article !";
    return false;
  }
  if (name.length<3) {
message=" Le secteur d'activité doit faire plus de 3 caractéres !";
    return false;  
}
return true;
}   
    function verifTitre(name){
  if (typeof name === 'undefined') {
    message="Veuillez saisir le titre de votre article !";
    return false;
  }
  name=name.trim();
  if (name.length==0) {
message="Le titre de votre article est vide : veuillez donner un titre à votre article !";
    return false;
  }
  if (name.length<5) {
message=" Le titre de votre article doit faire plus de 5 caractéres !";
    return false;  
}
return true;
}

         function commande(nom, argument){
    if (typeof argument === 'undefined') {
        argument = '';
    }
    switch(nom){
    case "createLink":
        argument = prompt("Quelle est l'adresse du lien ?");
    break;
    case "insertImage":

    argument = prompt("Quelle est l'adresse de l'image ?");
    break;
}
    document.execCommand(nom, false, argument);
}
function createThumbnail(file) {
  var reader = new FileReader();
  reader.onload = function() {
  var imgElement = $('#photo-couverture');
  imgElement.attr('src',this.result);
  imgElement.show();
};
reader.readAsDataURL(file);
}
function createVideo(file) {
  var reader = new FileReader();
  reader.onload = function() {
  var video =$('#new-video');
  video.attr('poster',"controls");
  video.attr('preload','metadata');
  video.find('source').attr('src',this.result);
  video.show();
};
reader.readAsDataURL(file);
}
var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];
var allowedVideos = ['mp4', 'webm'];
$('#couverture').on('change',function(e){
  var files = this.files,
imgType;
imgType = files[0].name.split('.');
imgType = imgType[imgType.length - 1];
if(allowedTypes.indexOf(imgType) != -1) {
  createThumbnail(files[0]);
}
});
$('#video').on('change',function(e){
  var files = this.files,
videoType;
videoType = files[0].name.split('.');
videoType = videoType[videoType.length - 1];
if(allowedVideos.indexOf(videoType) != -1) {
  createVideo(files[0]);
}
}); 
  });
</script>
</html>
