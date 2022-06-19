
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlInscriptionStyle().'"'; ?>/>

</head>
<body <?php 
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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <?php
  if (isset($_GET['message'])&&$_GET['message']=="1") {
  if(isset($_SESSION['redacteur'])){
   ?>
   <div id="message"style="margin-top: 10px;"class="alert alert-info">
        <button id="close-connexion" type="button" class="close">&times;</button>

    <h3>Merci d'étre connecté en tand que rédacteur!</h3>
   Vous pouvez maintenant rédiger des articles sur l'économie et la finance, publier vos articles et consulter celles que vous avez redigé.
</div>
   <?php
    }
  else if (isset($_SESSION['user'])) {
   ?>
   <div id="message" style="margin-top: 10px;" class="alert alert-info">
    <button id="close-connexion" type="button" class="close">&times;</button>
    <h3>Merci d'étre connecté!</h3>
   Vous pouvez maintenant envoyer des commentaires, répondre à des commentaires et partager sur les réseaux sociaux et consulter celles que vous avez lues .
</div>
   <?php
    }  
    }         
  ?>
  </div>
</section>
  <?php foreach ($liste as $key => $rubrique) {
    ?>

 <section class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h4 class="theme"><?php echo $rubrique['secteur']; ?>
    <a class="pull-right"title=<?php echo '"tous les articles du rubrique '.$rubrique['secteur'].'"'; ?>href=<?php echo '"'.urlArticles($rubrique['id'].'"'); ?>>Voir</a></h4>
  </div>
  </section>
<section class="row">
  <?php foreach ($rubrique['article'] as $key =>$article) {
    ?>
  <div class="blog_div col-xs-6 col-sm-4 col-md-3 col-lg-3">
    <a class="blog_link"href=<?php echo '"'.urlArticle($article['id'].'"'); ?>>

      <img class="blog_img"src= <?php echo '"'.urlPhotoCouverture($article['photo_couverture'].'"'); ?>>
      <strong class="blog_title">
        <?php echo $article['theme']; ?>
      </strong>
      <button class=" btn-lecteur btn btn-primary btn-xs"> <span class="badge text-success"><?php echo $article['nbre_lecteur']; ?></span><span class="label-lecteur"><?php if ($article['nbre_lecteur']==0 ||$article['nbre_lecteur']==1) {
        echo " Lecteur ";
      } 
      else echo" Lecteurs ";?></span></button>
    </a>
 
 </div>
 <?php
  }
  ?>
</section>
<?php
}
  ?>
<footer class="row">
  <?php
   include ("./../../view/footer.php");

   ?>
</footer> 
</div>
</body>
<script type="text/javascript" src=<?php echo '"'.urlJqueryScript().'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"'.urlBootstrapScript().'"'; ?>></script>
<script type="text/javascript" src=<?php echo '"'.urlIndexScript().'"'; ?>></script>

</html>
