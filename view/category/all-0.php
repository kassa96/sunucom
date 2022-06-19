
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
<section class="div_row row">
  <?php foreach ($rubriques as $key => $rubrique) {
    ?>
<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
    <a class="rubrique" href="">
      <h1><?php echo $rubrique["secteur"] ?></h1>
      <blockquote class="badge"><?php echo $rubrique["nbre_article"] ?></blockquote> 
    </a>
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
<script type="text/javascript" src=<?php echo '"'.urlIndexScript().'"'; ?>></script>

</html>
