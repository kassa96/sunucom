
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlStyle("style").'"'; ?>/>

</head>
<body>
<div class=" container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top">
   <?php
   include ("./../../view/nav.php");
   ?>
  </nav>
  <section class="div_row row">
  	<div class="col-lg-12" >
    <div id="validation-panel"class="jumbotron">
  <div  class="container">
    <h2>Merci d'étre inscris au réseau social de micro blog en économie</h2>
    <p>Pour pouvoir activer votre compte , veuilez vous connecter à votre compte mail que vous avez saisi et cliquer sur le lien qui vous a été envoyé !</p>
    <p><a href=<?php echo '"'.urlIndex().'"'; ?> class="btn btn-info btn-lg" role="button">Retourez à l'acceuil  <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
  </div>
</div>
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
<script type="text/javascript" src=<?php echo '"'.urlValidationScript().'"'; ?>></script>
</html>
