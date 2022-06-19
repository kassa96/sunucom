
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlStyle("liste-article").'"'; ?>/>

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
  <section class="row">
  <div class="col-lg-12">
  <ul class="liste_article">
     <?php foreach ($articles as $key =>$article) {
    ?>
    <li class="article_item">
    <a class="article_link" href=<?php echo '"'.urlArticle($article['id'].'"'); ?>>
        <div class="article_img">
        <img src=<?php echo '"'.urlPhotoCouverture($article['photo_couverture'].'"'); ?>>   
        </div>
        <div  class="article">
        <span class="secteur">
          <?php echo $article['secteur']; ?>
        </span> 
        <div class="contenu">
           <?php echo $article['theme']; ?>
        </div>
          <div class="nbre-lecteur pull-right">
            <?php 
if($article['nbre_article']==1 ||$article['nbre_article']==0 ){
echo $article['nbre_article']." article";
}
else{
echo $article['nbre_article']." articles";

}
?>
        </div>
        </div>
    </a>
    </li>
  <?php } ?>
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

</html>
