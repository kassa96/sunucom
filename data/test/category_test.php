<?php
include_once ('C:/wamp64/www/micro_blog_economie/data/db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/category.php');
$db=getDBInstance();
$category= array(
	         'id' =>1,
	         'secteur' =>"Entreprenariat123",
	         'icone' =>"image/category_icone/11.png");
//newCategory($category,$db);
//updateCategory($category,$db);
//removeCategory($category,$db);
/*$data=findCategory(2,$db);
if ($data!=null) {
	echo $data["secteur"];
}
else echo "no category";
*/

$liste=findAllCategory($db,0,2);
foreach ($liste as $cat) {
	echo " secteur : ".$cat['secteur'].'<br/>';
}
/*$liste=findAllCategoryWithArticle($db);
foreach ($liste as $cat) {
	echo "<br/>secteur : ".$cat["secteur"].'<br/>';
	foreach ($cat['article'] as $article) {
	//	print_r($article);
		echo "<br/>     theme  article : ".$article['theme'];
	}
}*/
 ?>