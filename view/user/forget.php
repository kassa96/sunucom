
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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
    <div id="validation-panel"class="jumbotron">
  <div  class="container">
    <h2>Demande d'initialisation du mot de passe</h2>
     <form id="form-inscription"method="POST">
    <fieldset>
  <legend>Demande </legend>
    <div id="panel-error">
     
      <div id="erreur-forget" class="alert alert-block alert-danger" style=" <?php if ($user['erreur']=="") {echo "display:none";}
      ?>">
     <?php echo $user['erreur']; ?>
    </div>
    </div>
    <div id="panel-email" class="form-group ">
      <label for="email">saisir votre Email : </label>
      <input name="email"id="email" type="text" class="form-control" value="<?php echo$user['email'] ?>">
             <span id="error-email"class="help-block"style="display:none">Votre email est vide ou incorrecte</span>

    </div>
    <button  id="forget-btn" class="btn btn-primary btn-md">initialier</button>
    </fieldset>
</form>
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
<script type="text/javascript" src=<?php echo '"'.urlForgetScript().'"'; ?>></script>
</html>
