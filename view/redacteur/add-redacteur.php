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
        <h4>Bienvenu au réseau social de micro blog en économie et en finance !<br/> Veuillez remplir cette formulaire pour devenir rédacteur</h4>
      </div>
    <form  method="POST">
    <fieldset>
  <legend>Nouveau Rédacteur </legend>
    <div id="panel-error">
     
      <div id="erreur-redacteur" class="alert alert-block alert-danger" style="display:none">
      Erreur Veuillez corriger les champs coloré en rouge ! 
    </div>
    </div>
    <div id="panel-profession" class="form-group ">
      <label for="profession">Je suis : </label>
      <select name="type-profession"id="type-profession" class="form-control">
        <option value="etudiant">etudiant</option>
        <option value="diplome">diplomé</option>
        <option value="professeur">profésseur</option>
        <option value="amateur">amateur en éconmie</option>
        <option value="salarie">salarié</option>
      </select>
             <span id="error-profession"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <div id="panel-metier" class="form-group">
      <label id="label-metier"for="metier">Vous étez dans quelle filiére ou faculté ? </label>
            <input name="metier"id="metier" type="text" class="form-control"value="">

             <span id="error-metier"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <div id="panel-lieu" class="form-group">
      <label id="label-lieu"for="lieu">Dans quelle université vous avez étudié ? </label>
            <input name="lieu"id="lieu" type="text" class="form-control"value="">

             <span id="error-lieu"class="help-block"style="display:none">Il y a un problème dans la saisie</span>

    </div>
    <div id="panel-portrait" class="form-group">
      <label for="portrait" >Vos parcours en finance: </label>
      <textarea id="portrait" name="portrait" rows="7"class="form-control">exemple de parcours
        De nos jours : je suis professeur en finance à l'UCAD
        2019-2017 : professeur en doctorat
        2017-2015 : etudiant master en sécurité financiaire et stagiaire à la sénélec
        2017-2014 : étudiant en comptablité
        NB : ce champs est facultative vous pouvez l'ignorer</textarea>
            <span id="error-portrait"class="help-block"style="display:none">Veuillez remplir votre bibliographie pour enrichir votre profil !</span>

    </div>
    <button  id="redacteur-btn" class="btn btn-primary btn-md">Enregistrer</button>
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
<script type="text/javascript" src=<?php echo '"'.urlAddRedacteurScript().'"'; ?>></script>

</html>
