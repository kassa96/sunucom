<?php
$root="http://localhost/micro_blog_economie/";
?>
<!DOCTYPE html>
<html>
<head>
  <title>micro blog pour l'economie et la finance</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlBootstrapStyle().'"'; ?>>
  <link rel="stylesheet" type="text/css" href=<?php echo '"'.urlConnexionStyle().'"'; ?>/>
</head>
<body>
<div class=" container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top">
   <?php
   include ("./../../view/nav.php");
   ?>
  </nav>
  <section class="div_row row">
    <div id="panel-inscription" class="col-lg-offset-3 col-md-offset-3 col-sm-offset-1 col-xs-12 col-sm-10 col-md-6 col-lg-6">

     <div id="panel-info">
        <h4>Bienvenu au réseau social de micro blog en économie et en finance</h4>
      </div>
    <form id="form-connexion"method="POST">
    <fieldset>
  <legend>Connexion </legend>
   <div id="panel-error">
     
      <div id="erreur-connexion" class="alert alert-block alert-info" style=" <?php if ($user['message']=="") {echo "display:none";}
      ?>">
     <?php echo $user['message']; ?>
    </div>
    </div>
    <div id="panel-error">
     
      <div id="erreur-connexion" class="alert alert-block alert-danger" style=" <?php if ($user['erreur']=="") {echo "display:none";}
      ?>">
     <?php echo $user['erreur']; ?>
    </div>
    </div>
   
    <div id="panel-email" class="form-group ">
      <label for="email">Email : </label>
      <input name="email"id="email" type="text" class="form-control" value="<?php echo$user['email'] ?>">
             <span id="error-email"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <div id="panel-password" class="form-group">
      <label >Mot de passe : </label>
      <input id="password" name="password"type="password" class="form-control" value="">
            <span id="error-password"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <a class="pull-right" href=<?php echo '"'.urlForget().'"'; ?>>mot de passe oublié</a><br>
    <button  id="connexione-btn" class="btn btn-primary btn-md">connexion</button>
    </fieldset>
</form>
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
<script type="text/javascript" src=<?php echo '"'.urlConnexionScript().'"'; ?>></script>

</html>
