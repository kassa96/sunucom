
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlStyle("index").'"'; ?>/>

</head>
<body
<?php if (isset($_SESSION['user'])) {?>
  style="margin-top: 20px;"
  <?php } ?>
>
 <div class=" container-fluid">
   <?php
   include ("./../../view/nav.php");
   ?>
  <section style="margin: 0;" class="row">
    <div style="padding: 0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
    else{
      ?>
     <div id="message" style="margin-top: 10px;" class="alert alert-info">
    <button id="close-connexion" type="button" class="close">&times;</button>
    <h3>Au revoir!</h3>
   J'espere qu'on vous reverra bientot
</div>  
      <?php
    }  
    }         
  ?>
  <?php
  if (isset($_GET['message'])&&$_GET['message']=="2") {
  if(isset($_SESSION['redacteur'])){
   ?>
   <div id="message"style="margin-top: 10px;"class="alert alert-info">
        <button id="close-connexion" type="button" class="close">&times;</button>

    <h3>Merci d'étre inscrit en tand que rédacteur!</h3>
   Vous pouvez maintenant rédiger des articles sur l'économie et la finance, publier vos articles et consulter celles que vous avez redigé.
</div>
   <?php
    }
  else if (isset($_SESSION['user'])) {
   ?>
   <div id="message" style="margin-top: 10px;" class="alert alert-info">
    <button id="close-connexion" type="button" class="close">&times;</button>
    <h3>Merci d'étre inscrit!</h3>
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

 
  <section style="margin: 0;"class="row">
  <div  style="padding: 0px;" class="col-lg-12">
  <div class=" secteur_panel">
    <span class="secteur"><?php echo $rubrique['secteur']; ?></span>
  <a title=<?php echo '"tous les articles du rubrique '.$rubrique['secteur'].'"'; ?> class="pull-right autre_secteur" href=<?php echo '"'.urlRubriques($rubrique['id']).'"'; ?>>autre article</a> 
  </div>
  </div>  
  </section">
  <div style="padding: 0px;" class="col-lg-12">
  <ul class="liste_article">
     <?php foreach ($rubrique['article'] as $key =>$article) {
    ?>
    <li class="article_item">
    <a class="article_link" href=<?php echo '"'.urlArticle($article['id'].'"'); ?>>
      <div class="article_presentation">
        <img class="article_img"src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture'].'"'); ?>>  
        <div  class="article_titre">
         <?php echo $article['theme']; ?>
        </div>
        <div class="lecteur-panel">
          <div class="nbre-lecteur pull-right"><?php echo $article['nbre_lecteur']; ?>
           <?php if ($article['nbre_lecteur']==0 ||$article['nbre_lecteur']==1) {
        echo " Lecteur ";
      } 
      else echo" Lecteurs ";?></div>
        </div>
        <div class="lecture">
          Lire cette aticle
        </div>

      </div>
      <div style="display: none;" class="article_contenu">
      <h1>
      <?php echo $article['theme']; ?>
      </h1>
      <p>
        <?php echo substr($article['contenu'], 0, 250)." ... "; ?>
        <br>
      <span class="pull-right suite">Lire la suite</span>

      </p>  
      </div>
    </a>
    </li>
    <?php
  }
  ?>
  </ul>
  </div>
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
<script type="text/javascript" src=<?php echo '"'.urlScript("script-index").'"'; ?>></script>
<script type="text/javascript">
     $("#newsletter-submit").click(function(e){
        e.preventDefault();
        if ((/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($("#newsletter-mail").val()))) {

        $.post(
            'newletter', // Un script PHP que l'on va créer juste après
            {
                email : $("#newsletter-mail").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                secteur : $("#newsletter-secteur").val()
            },
 
            function(data){
  alert(data);
                if(data == 'success'){
                   $('#success-newletter').show();
              
                }
                else if(data == 'no-secteur'){
                   $('"#erreur-newletter').text("Vous devez choisir une secteur d'activité pour recevoir des newsletters ! ").show(); 
                   $('"#erreur-newletter').hide();
                }
                else if(data == 'mail-incorrecte'){
                   $('#erreur-newletter').text("Votre email est incorecte ! ").show();  
                   $('#success-newletter').hide(); 
                }
         
            },
            'text'
         );    
}
else{
  $('#erreur-newletter').text("Votre email est incorecte ! ").show();  
                   $('#success-newletter').hide();  
}
    });
</script>
</html>
