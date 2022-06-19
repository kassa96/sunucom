	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <h2>A propos</h2><br/>
    <p class="footer-p">Ce site est un reseau social de micro blogage sur l'economie et la finance</p>
     <a id="btn-ins"href="<?php echo urlContact(); ?>" class="btn btn-primary btn-md">Nous contacter</a>
  </div> 
  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <h2>Condtion d'utilisation</h2><br/>
    <p class="footer-p">Afin d'assurer une bonne usage du site de micro-blog en économie et en finance <br>
      Veuillez lire nos <a href="<?php echo urlConditionUtilisation(); ?>">conditions d'utilisations</a> </p>
  </div> 
  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <h2>Newsletter</h2><br/>
    <blockquote>M'informer s'il y'a de nouveaux sujets</blockquote>
    <form>
       <div id="panel-success">
     
      <div id="success-newletter" class="alert alert-block alert-success" style="display:none;">
        Merci d'étre enregistrer au newletter <br> vous recevrez des articles par mail sur les secteurs d'activivé qui vous interesse .
    </div>
    <div id="erreur-newletter" class="alert alert-block alert-danger" style="display:none;">
        
    </div>
    </div>
      <input id="newsletter-mail" class="form-control" placeholder="Entrer votre mail"type="" name="newsletter-mail"/>
      
     <br/> <label class="control-label">choisir votre theme</label>
      <select id="newsletter-secteur" name="newsletter-secteur" class="form-control" >
        <option option="0">Tous les thémes</option>
        <?php
        foreach ($topSecteur as $top) {
         ?>
          <option value="<?php echo $top['id']; ?>"><?php echo $top['secteur']; ?></option>
         <?php
        }
        ?>
      </select>
      <br/>
      <input id="newsletter-submit" class=" form-control btn btn-primary btn-md" type="submit" name="newsletter-submit"value="Envoyer">
    </form>
  </div>   
	