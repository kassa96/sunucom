
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlIUserProfilStyle().'"'; ?>/>

</head>
<body>
<div class="well_color container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top">
   <?php
   include ("./../../view/nav.php");
   ?>
  </nav>
<section class="row jumbotron user_div">
  <div  style="padding: 5px;" class="col-lg-12"> 
    <?php 
    if (isset($_SESSION['user'])&& isset($_GET['message'])&&$_GET['message']=="1") {
   ?>
   <div id="message" style="margin-top: 10px;" class="alert alert-info">
    <button id="close-connexion" type="button" class="close">&times;</button>
    <h3>Merci d'étre inscrit en tant que membre!</h3>
   Vous pouvez maintenant envoyer des commentaires, répondre à des commentaires, partager sur les réseaux sociaux et consulter les articles que vous avez lues en étant contecté .<br>
   Pour étre rédacteur d'article vous pouvez cliquer <a href=<?php echo '"'.urlNewRedacteur().'"'; ?> >ici</a>
</div>
   <?php 
    }         
  ?>
  <?php 
    if (isset($_SESSION['user'])&& isset($_GET['message'])&&$_GET['message']=="2") {
   ?>
   <div id="message" style="margin-top: 10px;" class="alert alert-info">
    <button id="close-connexion" type="button" class="close">&times;</button>
    <h3>Vos informations personnelles ont été modifié avec succes!</h3>
   
</div>
   <?php 
    }         
  ?>
    
  </div>

<div class="col-lg-12">
   <div class="row">
    <div style="padding: 10px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
       <h1 class="name_user"><?php echo $user['name']; ?></h1>
    <h3 class="metier_user"><?php echo $user['email']; ?></h3> 

        <img id="photo"style="margin-left: 20px;"src=<?php echo '"'.urlPhotoCouverture($user['profil']).'"'; ?> class="img-rounded photo_user pull-left"/>
    </div> 
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
       <?php
  if(isset($_SESSION['user'])&&$_SESSION['user']['id']==$user['id']){
    ?>
     <div style="padding: 15px;">
 <form style="display: inline-block;padding-bottom: 0px;" method="post" enctype="multipart/form-data"id="form-photo"action=<?php echo '"'.urlNewPhotoProfil().'"'; ?> target="frame-photo">
    <label class="suivre " for="change_photo"id="photo-label" >Changer mon photo de profil</label>

      <input id="change_photo" style="display:none;"  type="file" name="photo_profil">
      <input  style="display:none;"  type="hidden" name="user"value=<?php echo '"'.$user["id"].'"'; ?> >
</form>
<iframe style="display:none;" name="frame-photo" id="frame-photo"></iframe>
    <div style="margin-top : 10px;">
      <a id="change_profil"class="suivre  btn-primary btn-lg"href="<?php echo urlEditUser(); ?>">Changer mes informations personnelles </a>
    </div>
     </div>
      <?php
    }
    ?>
     </div> 
    </div>
</div>
  </section>
  <section class="row">
       <?php
    if(count($liste_article)!=0){
    ?>
      <div class="col-lg-12 panel panel-default">
  <div class="panel-heading"> 
        <h3 class="panel-title">
          <?php
    if(count($liste_article)!=0){
    echo "Liste des articles que ".$user['name']." a lue en étant connecté à votre compte";
    }

    ?>
        </h3>
      </div>
      <div style="background: #CCC;" class="panel-body">

        <section class="row">
    <?php
    if(count($liste_article)!=0){
      foreach ($liste_article as $key => $article) {
        ?>
  <div class="blog_div col-xs-12 col-sm-6 col-md-3 col-lg-2">
    <a class="blog_link"href=<?php echo '"'.urlArticle($article['id'].'"'); ?>>

        <img class="blog_img"src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture'].'"'); ?>>

      <strong class="blog_title">
        <?php echo $article['theme']; ?>
      </strong>
        
    </a>
  </div>
        <?php
      }
    }
    ?>
        </section>
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
<script type="text/javascript" src=<?php echo '"'.urlJqueryScript().'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"'.urlBootstrapScript().'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"'.urlScript("profil").'"'; ?>> 
</script>

</body>

</html>
