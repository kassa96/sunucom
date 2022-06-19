
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
  <section class="div_row row">

    <div class="article_div col-xs-12 col-sm-6 col-md-8 col-lg-8">
      <img  class=" article_img"src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture']).'"'; ?>>
      <h2 class="titre_article"><?php echo $article['theme']; ?></h2>
      <p class="contenu">
       <?php echo $article['contenu']; ?>
      </p>
      <div>
<button type="button" title="Partager sur Facebook" class="btn btn-primary">Facebook</button>
<button type="button" title="Partager sur Twitter"class="btn btn-success">Twitter</button>
<button id="btn-lecture" type="button" title="Partager sur Linkedln"class="btn btn-warning">Linkedln</button>
<button type="button" title="double clique pour aimer cette page"class="btn btn-primary pull-right">15 Likes</button>
<button id="nbre_lecteur" type="button" title=<?php echo '"'.$article["nbre_lecteur"].' personnes ont lue cette article"';?> class="pull-right btn btn-info"><?php 
if($article['nbre_lecteur']==1 ||$article['nbre_lecteur']==0 ){
echo $article['nbre_lecteur']." lecteur";
}
else{
echo $article['nbre_lecteur']." lecteurs";

}
?></button>
<input id="lecteur_input" type="hidden" name="lecteur_input"
value=<?php echo '"'.$article["nbre_lecteur"].'"';?>>

    <div class="media thumbnail">
              <a class="pull-left" href=<?php  echo '"'.urlProfil($redacteur['id']).'"';  ?>>
                <img width="50"height="50"class="media-object" src=<?php echo '"'.urlPhotoProfil($redacteur['profil']).'"'; ?>>
              </a>
              <div class="media-body">
                <h4 class="media-heading">Auteur <?php echo $redacteur['name']; ?></h4>
                <small class="pull-right">article publié <?php echo duration($article['date_publication']); ?></small>
                <p><?php echo $redacteur['profession']; ?></p>
              </div>
            </div>
      </div>
       <ul id="liste-comment" class="comment media-list col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 id="nbre_comment">
          <input id="nbre_comment_input" type="hidden"value=<?php  echo '"'.$nbre_comment.'"';?>/>
          <?php if($nbre_comment==1)
                echo $nbre_comment." commentaire ";
                else if($nbre_comment>1)
                 echo $nbre_comment." commentaires ";

           ?>
         </h4>
         <li class="media thumbnail">
          
           <div id="error-profil"class="alert alert-block alert-danger" style="display:none">
      Vous devez vous connecter  <a href=<?php echo urlConnexion(); ?>>ici</a> pour envoyer votre commentaire ! 
    </div>
    <div id="success-comment"class="alert  alert-success"style="display:none">
      <button id="close-comment" type="button" class="close">&times;</button>
    <strong>Votre commentaire a été envoyée !</strong>
</div>
          <?php if (isset($current_user['id'])){ ?>

      <a class="pull-left" href=<?php  echo '"'.urlProfil($current_user['id']).'"';  ?>>
        <img class="image_user_comment media-object"src=<?php echo '"'.urlPhotoProfil($current_user['profil']).'"';?>>
      </a>
       <?php } else{ ?>
        <img id="default-photo"class="no-profil pull-left image_user_comment media-object"src=<?php echo '"'.urlPhotoProfil($current_user['profil']).'"';?>>
      <?php }  ?>
      <div class="media-body">
    <input name="contenu"id="add-comment" type="text" class="form-control" placeholder="Votre commentaire"/>
  <input name="article" id="number" type="hidden" value=<?php echo $article['id']; ?>/>

      </div>
     
    </li>
    <?php foreach ($comments as $key => $comment) {
    ?>
    <li  class="commentaire media thumbnail">
      <a class="pull-left" href="#">
        <img class="image_user_comment media-object" src=<?php echo '"'.urlPhotoProfil($comment['profil']).'"'; ?>>
      </a>
      <div class="media-body">
        <h4 class="media-heading name_user_comment"><?php echo $comment['name']; ?></h4>
        <p><?php echo $comment['texte']; ?></p>
        <a href=""class="reponse-link pull-left">Répondre</a><br/>
         <div class="error-reponse alert alert-block alert-danger" style="display:none">
      Vous devez vous connecter  <a href=<?php echo urlConnexion(); ?>>ici</a> pour envoyer votre réponse ! 
    </div>
    <div class="success-reponse alert  alert-success"style="display:none">
      <button type="button" class="close close-reponse">&times;</button>
    <strong>Votre réponse a été envoyée !</strong>
</div> <input type="hidden" class="reponse-name"name="name-reponse"value=<?php echo '"'.$comment['name'].'"'; ?>/>
<input name="article" class="number" type="hidden" value=<?php echo $article['id']; ?>/>
        <input name="reponse" type="text" class="reponse-input form-control"style="display:none;" placeholder=<?php echo ('"Donnez une réponse à '.$comment['name'].'"'); ?>/>
        <?php
         if ($comment['reponse']!=null) {
            ?>
             <small class="pull-right"><?php echo ("Réponse à ".$comment['reponse']); ?></small>

             <?php
          } ?>
      </div>
     
    </li>
  <?php } ?>

  </ul>
    </div>

    <div class=" liste_div col-xs-12 col-sm-6 col-md-4 col-lg-4">
      <ul class="list-group list-unstyled">
        <?php
        foreach ($liste_article as $key => $article) {
         ?>
        <li>
           <a href=<?php echo '"'.urlArticle($article['id'].'"'); ?> class="row list-group-item  item_article">
            <img  class="col-xs-6 liste_img"src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture']).'"'; ?>>
            <strong class="col-xs-6 list-group-item-text  item_text"><?php echo $article['theme']; ?></strong>

           </a>
        </li>
      <?php }?>
        
</ul>
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
<script type="text/javascript" src=<?php echo '"'.urlCommentScript().'"'; ?>></script>

</html>
