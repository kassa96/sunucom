
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlStyle("secteur").'"'; ?>/>

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
    <div class=" col-lg-12">
    <h4 class="theme">
      Liste des secteurs d'activité du micro blog de l'économie et la dépense
    </h4>
  </div>
  </section>
<section class="row">
  <div style="padding: 0px;" class="col-lg-12">
  <ul class="liste_secteur">
  <?php foreach ($rubriques as $key => $rubrique) {
    ?>
<li class="secteur_item">
    <a class="secteur_link" href=<?php echo '"'.urlRubriques($rubrique['id']).'"'; ?>>
    <div class="secteur_name"><?php echo $rubrique["secteur"] ?></div>
    <div class=" nbre_article">
      <?php if($rubrique["nbre_article"]==0||$rubrique["nbre_article"]==1) echo $rubrique["nbre_article"]." article publiée";
      else echo $rubrique["nbre_article"]." articles publiées"; ?>
    </div>
    <div class=" voir_div">
      <span class="voir">Voir les articles</span>
    </div>
    </a>
    </li> 
 
 <?php
  }
  ?>
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
<script type="text/javascript" src=<?php echo '"'.urlIndexScript().'"'; ?>></script>

</html>
