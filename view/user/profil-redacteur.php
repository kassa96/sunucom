
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlInscriptionStyle().'"'; ?>/>

</head>
<body>
<div class="well_color container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top">
   <?php
   include ("./../../view/nav.php");
   ?>
  </nav>
 <section style="padding: 5px;"class="row jumbotron user_div">
  <?php 
    if (isset($_SESSION['redacteur'])&& isset($_GET['message'])&&$_GET['message']=="1") {
   ?>
   <div id="message" style="margin-top: 10px;" class="alert alert-info">
    <button id="close-connexion" type="button" class="close">&times;</button>
    <h3>Merci d'étre connecté en tand que rédacteur!</h3>
   Vous pouvez maintenant rédiger des articles sur l'économie et la finance, publier vos articles et consulter celles que vous avez redigé.
</div>
   <?php 
    }         
  ?>
   <?php 
    if (isset($_SESSION['redacteur'])&& isset($_GET['message'])&&$_GET['message']=="2") {
   ?>
   <div id="message" style="margin-top: 10px;" class="alert alert-info">
    <button id="close-connexion" type="button" class="close">&times;</button>
        <h3>Vos informations personnelles ont été modifié avec succes!</h3>

</div>
   <?php 
    }         
  ?>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h1 class="name_user"><?php echo $redacteur['name'];?></h1>
    <h2 class="metier_user"> <?php echo $redacteur['profession'];?> </h2> 
  </div>
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12" >
         <img id="photo" style="margin-left: 20px;"src=<?php echo '"'.urlPhotoCouverture($redacteur['profil']).'"'; ?> class="img-rounded photo_user pull-left"/>
 
    </div> 
    <div style="padding-left: 15px;" class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
       <h4>Bibliographie</h4>
        <p >
          <?php if ($redacteur['bibliographie']!="")
                echo $redacteur['bibliographie'];
                else echo "Pas de bibliographie enregistré pour l'instant";
                ?>
        </p>
    </div> 
   
<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <div id="error"class="alert  alert-danger"style="display:none">
    <strong></strong>
</div>
<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <div id="success"class="alert  alert-success"style="display:none">
    <strong>Vous étes maintenant de s'abonner au rédacteur <?php echo $redacteur['name'] ?></strong>
</div>
  <?php
  if(isset($_SESSION['redacteur'])&&$_SESSION['redacteur']['id']==$redacteur['id']){
    ?>
      <form style="display: inline-block;padding-bottom: 0px;" method="post" enctype="multipart/form-data"id="form-photo"action=<?php echo '"'.urlNewPhotoProfil().'"'; ?> target="frame-photo">
    <label class="suivre " for="change_photo"id="photo-label" >Changer mon photo de profil</label>

      <input id="change_photo" style="display:none;"  type="file" name="photo_profil">
      <input  style="display:none;"  type="hidden" name="user"value=<?php echo '"'.$redacteur["id_user"].'"'; ?> >
</form>

<iframe style="display:none;" name="frame-photo" id="frame-photo"></iframe>
<a id="change_profil"class="suivre  btn-primary btn-lg"href="<?php echo urlEditRedacteur(); ?>">Changer mes informations personnelles </a>;
<?php
  }
  else{
    if ($doublon==null||!$doublon) {
     echo '<button id="abonner"class="suivre  btn-primary btn-lg">S\'abonner à mes articles</button>'; 
    }
    else {
echo '<a id="abonner"class="suivre daja-suivi  btn-primary btn-lg"><span class="glyphicon glyphicon-ok-sign"></span> déja abonnée</a>';
    }
  }
  ?>
 <input type="hidden"id="number_user"value=<?php echo '"'.$redacteur['id'].'"'; ?> name="number"> 
<span class="pull-right">
  <a id="nbre-article"class=" nbre-article btn btn-warning btn-lg"><span class="glyphicon glyphicon-comment"></span><br><?php 
if ($redacteur['nbre_article']==0||$redacteur['nbre_article']==1) {
 echo $redacteur['nbre_article']." article publié";
  }
  else
  echo $redacteur['nbre_article']." articles publiés";?></a>
<a id="nbre-abonner"class="nbre-abonner btn btn-info btn-lg"><span class="glyphicon glyphicon-bullhorn"></span><br><?php 
if ($redacteur['nbre_abonnee']==0||$redacteur['nbre_abonnee']==1) {
 echo $redacteur['nbre_abonnee']." abonnée";
  }
  else
  echo $redacteur['nbre_abonnee']." abonnées";?></a>
<input id="input-abonner"type="hidden" name="input-abonner">
</span>

</div>
  </section>
<section class="row">
  <div class="col-lg-12 panel panel-default">
  <div class="panel-heading"> 
        <h3 class="panel-title">
          <?php
    if(count($liste_article_publier)!=0){
      ?>
    <?php
    if(count($liste_article_publier)==1)
      echo count($liste_article_publier)." article publiés par le rédacteur ".$redacteur['name'];
    else echo count($liste_article_publier)." articles publiés par le rédacteur ".$redacteur['name'];
    ?>
      <?php
    }
     else{
      
      ?>
      Aucun article n'a été publié par le rédacteur <?php echo $redacteur['name'];?>

      <?php
    }
    ?>
        </h3>
      </div>
      <div style="background: #CCC;" class="panel-body">

        <section class="row">
    <?php
    if(count($liste_article_publier)!=0){
      foreach ($liste_article_publier as $key => $article) {
        ?>
  <div class="blog_div col-xs-6 col-sm-4 col-md-3 col-lg-2">
    <a class="blog_link"href=<?php echo '"'.urlArticle($article['id'].'"'); ?>>

        <img class="blog_img"src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture'].'"'); ?>>

      <strong class="blog_title">
        <?php echo $article['theme']; ?>
      </strong>
      <button class=" btn-lecteur btn btn-primary btn-xs"> <span class="badge text-success"><?php echo $article['nbre_lecteur']; ?></span><span class="label-lecteur"><?php 
      if ($article['nbre_lecteur']==0 ||$article['nbre_lecteur']==1) {
        echo " Lecteur ";
      } 
      else echo" Lecteurs ";?> 
    </span></button>
        
    </a>
  </div>
        <?php
      }
    }
    else{
      ?>
      <?php
    }
    ?>
        </section>
      </div>
      </div>
      <?php 
      if(isset($_SESSION['redacteur'])&&$_SESSION['redacteur']['id']==$redacteur['id']){
      ?>
     
   <?php 
      if(count($liste_article_nom_publier)!=0){
      ?>
       <div style="margin: 5px;" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">
      <?php 
      if(isset($liste_article_nom_publier) && count($liste_article_nom_publier)!=0){
        echo "Liste des articles nom publiés ( en cours de rédaction ) ";
      }
      ?>
    </h3>
  </div>
  <div class="panel-body"> 
      <table class="table table-bordered table-striped table-condensed">
   <thead>
      <tr>
            <th>Théme ou titre de l'article </th>
            <th>Action </th>
      </tr>
   </thead>
   <tbody>
    <?php
      foreach ($liste_article_nom_publier as $key => $article) {
        ?>
          <tr>
            <td><?php echo $article['theme'];?></td>
            <td>
              <a style="margin: 5px;" href="">Publeir l'article</a>
              <a style="margin: 5px;"href="">Modifier le contenu </a>
            </td>
          </tr>
          <?php
        }
        ?>
    </tbody>
    </table>
    <?php
    } 
      ?>
      </div>
      </div>
      <?php         
      }
      ?>
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
$(function () {
  $('#close-connexion').bind('click',function(e){
    $("#message").hide();
  });
setTimeout(function() {
             $("#message").hide();
            }, 180000);
  $('#change_photo').on('change',function(e){
  var files = this.files,
imgType;
var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];

imgType = files[0].name.split('.');
imgType = imgType[imgType.length - 1];
if(allowedTypes.indexOf(imgType) != -1) {
  createThumbnail(files[0]);
  $('#form-photo').submit();
}
});
  function createThumbnail(file) {
  var reader = new FileReader();
  reader.onload = function() {
  var imgElement = $('#photo');
  imgElement.attr('src',this.result);
  imgElement.show();
};
reader.readAsDataURL(file);
}
  $('#abonner').bind('click',function(){

    if($(this).is('a')){
      return false;
    }
    $.post(
            'http://localhost/micro_blog_economie/user/abonner/'+$('#number_user').val(), 
            {
            },
            function(code_html){ 
              if(code_html=="no-user"){
               $('#error').show()
                          .find('strong')
                          .text("Veuillez vous connecter pour vous s'abonner à un rédacteur !");
                           $('#success').hide();
              }
              else if(code_html=="no-redacteur"){
                $('#error').show()
                          .find('strong')
                          .text("Cette rédacteur n'existe pas !");
                           $('#success').hide();
              }
              else if(code_html=="doublon"){
                         $('#error').show()
                          .find('strong')
                          .text("Vous étes déja abnnée à cette rédacteur !");
                          $('#success').hide();
              }
              else if (code_html=="ok") {
                         var nbre=$('#input-abonner').val();
                         nbre=parseInt(nbre);
                         nbre=nbre+1;
                         $('#nbre-abonner').text(nbre+" abonnées"); 
                          $('#error').hide();
                          $('#abonner').html('<span class="glyphicon glyphicon-ok-sign"></span> abonnement reussi !')
                          $('#success').show();
              }
              });
    return false;
  });
});  
</script>

</html>
