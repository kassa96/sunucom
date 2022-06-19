
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
    <div id="contenu" style="padding: 0px;" class="col-lg-12">
<h1>Condition d'utilisation générale du site</h1>
<p>Texte</p>
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
