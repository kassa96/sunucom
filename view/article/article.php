
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlStyle("article").'"'; ?>/>

</head>
<body
<?php if (isset($_SESSION['user'])) {?>
  style="margin-top: 20px;"
  <?php } ?>>
  <div class=" container-fluid">
   <?php
   include ("./../../view/nav.php");
   ?>
<section style="margin: 0;"class="row">
    <div style="padding: 0px;" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
      <section id="contenu">
        <?php 
        if($article['video']!=null){
        ?>
        <video style="width: 100%;"preload="metadata"  poster = <?php echo '"'.urlPhotoCouverture($article['photo_couverture']).'"'; ?> controls >
         <source src=<?php echo '"'.urlPhotoCouverture($article['video']).'"'; ?>/>
        
          </video>
        <?php
      }
      else
      {
        ?>
        <img  class="img_couverture"src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture']).'"'; ?>>
         <?php
      }
        ?>
        <h1 id="titre_article"><?php echo $article['theme']; ?></h1>
      <p id="texte">
        <?php echo $article['contenu']; ?>
        <br><small class="auteur pull-right"> <a href="">source wikipédia</a></small>
      </p>
      <aside id="partage" >
        <div>
          Partager sur 
        </div>
 
  
        <button type="button" title="J'aime cette article"class="like btn btn-primary pull-right">15 Likes</button>
        <div id="nbre_lecteur"class="nbre-lecteur pull-right"title=<?php echo '"'.$article["nbre_lecteur"].' personnes ont lue cette article"';?>><?php 
if($article['nbre_lecteur']==1 ||$article['nbre_lecteur']==0 ){
echo $article['nbre_lecteur']." lecteur";
}
else{
echo $article['nbre_lecteur']." lecteurs";

}
?>
  <input id="lecteur_input" type="hidden" name="lecteur_input"
value=<?php echo '"'.$article["nbre_lecteur"].'"';?>>
</div>
        

      </aside>
      <aside class="media thumbnail" id="auteur">
             <a class="pull-left" href=<?php  echo '"'.urlProfil($redacteur['id']).'"';  ?>>
                <img width="50"height="50"class="media-object" src=<?php echo '"'.urlPhotoProfil($redacteur['profil']).'"'; ?>>
              </a>
              <div class="media-body">
                <h4 class="media-heading">Auteur <?php echo $redacteur['name']; ?></h4>
                <small class="pull-right">article publié <?php echo duration($article['date_publication']); ?></small>
                <p><?php echo $redacteur['profession']; ?></p>
              </div>
      </aside>
      <aside class="media thumbnail" >
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
        <img width="50"height="50" class="image_user_comment media-object"src=<?php echo '"'.urlPhotoProfil($current_user['profil']).'"';?>>
      </a>
       <?php } else{ ?>
        <img width="50"height="50" id="default-photo"class="no-profil pull-left image_user_comment media-object"src=<?php echo '"'.urlPhotoProfil($current_user['profil']).'"';?>>
      <?php }  ?>
      <div class="media-body">
    <input name="contenu"id="add-comment" type="text" class="form-control" placeholder="Votre commentaire"/>
  <input name="article" id="number" type="hidden" value=<?php echo $article['id']; ?>/>

      </div>
     
    </li>
    <?php foreach ($comments as $key => $comment) {
    ?>
    <li  class="commentaire media thumbnail">
      <a class="pull-left" href=<?php echo '"'.urlProfil($comment['id_user']).'"'; ?>>
        <img width="60"height="60" class="image_user_comment media-object" src=<?php echo '"'.urlPhotoProfil($comment['profil']).'"'; ?>>
      </a>
      <div class="media-body">
        <h4 class="media-heading name_user_comment"><?php echo $comment['name']; ?></h4>
        <p class="text-comment"><?php echo $comment['texte']; ?></p>
        <a href=""class="reponse-link pull-left">Répondre</a>
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
      </aside>
      </section>
  </div>  
    <div style="padding: 0px;" class="panel_nav col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <aside id="navigation">
    <ul class="liste_article">
    <?php
        foreach ($liste_article as $key => $article) {
         ?>
    <li class="article_item">
    <a class="article_link" href=<?php echo '"'.urlArticle($article['id'].'"'); ?>>
        <div class="article_img">
        <img src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture']).'"'; ?>>   
        </div>
        <div class="contenu">
<?php echo substr($article['theme'], 0, 50)." ... "; ?>
<span style="color: #4285f4;" class="suite"> Lire la suite</span>
        </div>
    </a>
    </li>
  <?php
          } ?>
  </ul> 
    </aside>
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
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e7a5b7cb4fb830012007813&product=inline-share-buttons" async="async"></script>
</html>
