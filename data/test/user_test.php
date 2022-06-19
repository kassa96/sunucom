<?php
include_once ('./../db_connection.php');
include_once ('C:/wamp64/www/micro_blog_economie/data/dao_entity/user.php');

/*foreach ($_SERVER as $key => $value) {
	echo $key." : ".$value."<br/>";
}*/
$db=getDBInstance();
$user= array(
	         'name' =>"Memadou korka diallo",
	         'email' =>"memadoukorka@gmail.sn",
	         'password' =>"diallo_korka",
	         'genre' =>"m",
	         'profil' =>"image/profil/22.png",
	         'date_inscription' =>"2020-01-03 15:20:39",
	         'jeton' =>"025698658",
	         'etat_user' =>"2" );
$data=null;
addUser($user,$db);
//updateUser($user,$db);
//RemoveUser($user,$db);
//$data=findUser(1,$db);
//$data=findUserState(1,2,$db);
$data=findUserJeton("12365215489",$db);
if ($data!=null) {
	echo $data["name"];
}
else echo "no user";

?>
<?php 
for ($i=0; $i <5 ; $i++) { 
?>
<strong>kassa</strong>	
<?php 
}
?>
 