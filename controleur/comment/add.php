<?php
session_start();
include_once ('./../../data/db_connection.php');
include_once ('./../../data/dao_entity/user.php');
include_once ('./../../data/dao_entity/commentaire.php');
include_once ('./../../data/dao_entity/article.php');
include_once ('./../../util/routage_url.php');
$db=getDBInstance();
$comment=array();
	if (isset($_SESSION['user'])) {
		$current_user=$_SESSION['user'];
	 if (isset($_POST['article'])) {
	 	$article=findArticle($_POST['article'],$db);
	 	if($article!=null){
        	if(isset($_POST['contenu'])&&$_POST['contenu']!=""){
        		$comment['id_user']=$current_user['id'];
        		$comment['texte']=$_POST['contenu'];
        		$comment['id_article']=$article['id'];
        		if(isset($_POST['reponse'])&&$_POST['reponse']!="")
        			$comment['reponse']=$_POST['reponse'];
        		else
        			$comment['reponse']=null;
        		//addComment($comment,$db);
             ?>
             <li class="media thumbnail">
      <a class="pull-left" href="#">
        <img class="image_user_comment media-object" src=<?php echo '"'.urlPhotoProfil($current_user['profil']).'"'; ?>>
      </a>
      <div class="media-body">
        <h4 class="media-heading name_user_comment"><?php echo $current_user['name']; ?></h4>
        <p><?php echo $comment['texte']; ?></p>
        <a href=""class="pull-left">Répondre</a>
        <?php
         if ($comment['reponse']!=null) {
            ?>
             <small class="pull-right"><?php echo ("Réponse à ".$comment['reponse']); ?></small>
             <?php
          } ?>
      </div>
     
    </li>
             <?php
        	}
        	else{
        		echo "no-comment";
        	}
	 	}
	 	else{
	 		echo "no-article";
	 	}
	 }
	 else{
	 	echo "no-article";
	 }
    }
    else{
    	echo "no-user";
    }
?>