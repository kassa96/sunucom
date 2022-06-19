<?php 
include_once ('C:/wamp64/www/micro_blog_economie/data/db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/article.php');
setcookie('abc', '2.3.4.5', 
          time() + 365*24*3600, 
          null, null, false,false); 
$tab_id_cat=array();
if (isset($_COOKIE['abc'])) {
	$tab_id_cat=explode(".",$_COOKIE['abc']);
	print_r($tab_id_cat);
}
 ?>