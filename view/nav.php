<nav class=" navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">   
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
        <div class="container-fluid">
          <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"> <a href=<?php echo '"'.urlIndex().'"'; ?>>Accueil</a> </li>
             <li class="dropdown"> 
            <a data-toggle="dropdown" href="#"> Rubrique <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <?php
              foreach ($topSecteur as  $top) {
               
              ?>
                            <li><a href=<?php echo '"'.urlRubriques($top['id']).'"'; ?>><?php echo $top['secteur']; ?></a></li>

            <?php  } ?>
  
              <li class="divider"></li>
              <li><a href=<?php echo '"'.urlRubriques().'"'; ?>> Autres rubriques</a></li>
            </ul>
          </li>
           <?php
              if( isset($_SESSION['user'])){
                ?>
             <li class="dropdown"> 
            <a data-toggle="dropdown" href="#"> <?php echo $_SESSION['user']['name']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><a href=<?php echo '"'.urlProfil($_SESSION['user']['id']).'"'; ?>>Voir mon profil</a></li>
              
            </ul>
          </li>
              <?php
              }
              ?>
               <?php
              if(isset($_SESSION['redacteur'])){
                ?>
             <li class="dropdown"> 
            <a data-toggle="dropdown" href="#"> <?php echo $_SESSION['redacteur']['name']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><a href=<?php echo '"'.urlProfil($_SESSION['redacteur']['id_user']).'"'; ?>>Voir mon profil</a></li>
              
            </ul>
          </li>
              <?php
              }
              ?>
          </ul>
           <form id="search" style="width: 300px;text-align: center;" class="navbar-form navbar-left inline-form">
            <div class="form-group"style="width: 100%;">
              <input style="width: 100%;"type="search" class="input-sm form-control" placeholder="Recherche">
            </div>
          </form>
          <form class="navbar-form navbar-right inline-form">
            <div class="form-group">
              <?php
              if( isset($_SESSION['redacteur'])){
                ?>
               <a href=<?php echo '"'.urlNewArticle().'"';?> class="btn btn-success btn-sm">créer un <br/>nouveau article</a>
                <a href=<?php echo '"'.urlDeconnexion().'"';?> class="btn btn-danger btn-sm">Se 
               déconnécter</a>
                <?php
              }
              else if( isset($_SESSION['user'])){
                ?>
               <a href=<?php echo '"'.urlNewRedacteur().'"';?> class="btn btn-success btn-sm">devenir un <br/> rédacteur d'article</a>
                <a href=<?php echo '"'.urlDeconnexion().'"';?> class="btn btn-danger btn-sm">Se 
               déconnécter</a>
                <?php
              }
              else{
                ?>
                <a href=<?php echo '"'.urlConnexion().'"';?> class="btn btn-primary btn-sm">Se connécter</a>
               <a href=<?php echo '"'.urlInscription().'"';?> class="btn btn-primary btn-sm">s'inscrire</a>
                <?php
              }
              ?>
                ?>
              
            </div>
          </form>
        </div>
        </div>
      </nav>
  