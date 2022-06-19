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
        <h4>Bienvenu <?php echo $redacteur['name']; ?> !<br/> Veuillez modifier vos informations personnelles </h4>
      </div>
    <form  method="POST">
    <fieldset>
  <legend>Modification information personnelle Rédacteur</legend>
  <div id="panel-name" class="form-group">
      <label >Prénom et Nom : </label>
      <input name="name"id="name" type="text" class="form-control"value="<?php echo$redacteur['name'] ?>">
      <span id="error-name"class="help-block"style="display:none">Il y a un problème dans la saisie</span>
    </div>
    <div id="panel-email" class="form-group ">
      <label for="email">Email : </label>
      <input name="email"id="email" type="text" class="form-control" value="<?php echo$redacteur['email'] ?>">
             <span id="error-email"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <div id="panel-genre"class="form-group">
      <label > genre : </label>
      <span class="genre">
        <input name="genre"id="masculin" type="radio" value="m" <?php if ($redacteur['genre']=="m") {
          echo "checked";
        }?>>
      <label for="masculin" > masculin </label>
      </span>
      <span> 
        <input name="genre"id="feminin" type="radio" value="f" <?php if ($redacteur['genre']=="f") {
          echo "checked";
        }?>>
      <label for="feminin" > féminin </label>
      </span>
            <span id="error-genre"class="help-block"style="display:none">Veuillez séléctionner votre genre</span>

    </div>
    <div id="panel-error">
     
      <div id="erreur-redacteur" class="alert alert-block alert-danger" style="display:none">
      Erreur Veuillez corriger les champs coloré en rouge ! 
    </div>
    </div>
    <div id="panel-metier" class="form-group">
      <label id="label-metier"for="metier">Modifier votre formation et profession</label>
            <input name="metier"id="metier" type="text" class="form-control"value="<?php echo $redacteur['profession']; ?>">

             <span id="error-metier"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <div id="panel-portrait" class="form-group">
      <label for="portrait" >Modifier vos parcours en finance: </label>
      <textarea id="portrait" name="portrait" rows="7"class="form-control">
       <?php echo $redacteur['bibliographie']; ?> 
      </textarea>
            <span id="error-portrait"class="help-block"style="display:none">Veuillez remplir votre bibliographie pour enrichir votre profil !</span>

    </div>
    <button  id="redacteur-btn" class="btn btn-primary btn-md">Enregistrer les modifications</button>
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
<script type="text/javascript" src=<?php echo '"'.urlEditRedacteurScript().'"'; ?>></script>

</html>
