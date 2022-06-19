
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlStyle().'"'; ?>/>

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
    <h2>Demande d'initialisation du mot de passe envoyée</h2>
   <div class="col-sm-6">
      <form id="form-inscription"method="POST">
    <fieldset>
  <legend>Inscription </legend>
    <div id="panel-error">
     
      <div id="erreur-inscription" class="alert alert-block alert-danger" style=" <?php if ($user['erreur']=="") {echo "display:none";}
      ?>">
     <?php echo $user['erreur']; ?>
    </div>
    </div>
   
    </div>
    <div id="panel-password1" class="form-group">
      <label >Mot de passe : </label>
      <input id="password1" name="password1"type="password" class="form-control" value="">
            <span id="error-password1"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <div id="panel-password2"class="form-group">
      <label >confirmer votre mot de passe : </label>
      <input id="password2" type="password" name="password2"class="form-control"value="">
            <span id="error-password2"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <button  id="inscrire-btn" class="btn btn-primary btn-md">Changer</button>
    </fieldset>
</form>
   </div>
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
<script type="text/javascript" src=<?php echo '"'.urlInitialisationScript().'"'; ?>></script>
</html>
