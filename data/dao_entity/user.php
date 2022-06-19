<?php
function addUser($user,$db)
{
$req = $db->prepare('INSERT INTO 
	                 user(name, email, password ,genre,profil,jeton, etat_user) 
	                 VALUES(:name, :email, :password,:genre,:profil, :jeton, :etat_user)');
$req->execute(array(
'name' => $user['name'],
'email' => $user['email'],
'password' => $user['password'],
'genre' => $user['genre'],
'profil' => $user['profil'],
'jeton' => $user['jeton'],
'etat_user' => $user['etat_user']
));	
}
function updateUser($user,$db)
{
$req = $db->prepare('UPDATE user SET 
	                  name = :name,
	                  email = :email,
	                  password = :password,
	                  genre = :genre,
	                  profil = :profil,
	                  date_inscription = :date_inscription,
	                  jeton = :jeton,
	                  etat_user = :etat_user
                     WHERE id = :id');
$req->execute(array(
'id' => $user['id'],
'name' => $user['name'],
'email' => $user['email'],
'password' => $user['password'],
'genre' => $user['genre'],
'profil' => $user['profil'],
'date_inscription' => $user['date_inscription'],
'jeton' => $user['jeton'],
'etat_user' => $user['etat_user']
));	
	
}
function removeUser($user,$db)
{
$req = $db->prepare('DELETE FROM user
                     WHERE id = :id');
$req->execute(array(
'id' => $user['id']
));		
}
function findUser($id,$db)
{
$req = $db->prepare('SELECT 
	                  id,name, email, password, genre,profil, date_inscription, jeton, etat_user FROM user
	                   WHERE id = :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findUserByEmail($email,$db)
{
$req = $db->prepare('SELECT 
	                  id,name, email, password, genre,profil, date_inscription, jeton, etat_user FROM user
	                   WHERE email = :email');
$req->execute(array('email' => $email));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;
}
function findUserState($id,$state,$db)
{
$req = $db->prepare('SELECT 
	                  id,name, email, password,genre, profil, date_inscription, jeton, etat_user FROM user
	                   WHERE id = :id AND etat_user = :etat_user');
$req->execute(array('id' => $id,'etat_user' => $state));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;	
}
function findUserJeton($jeton,$db)
{
$req = $db->prepare('SELECT 
	                 id, name, email, password,genre, profil, date_inscription, jeton, etat_user FROM user
	                   WHERE jeton = :jeton ');
$req->execute(array('jeton' => $jeton));
$donnees = $req->fetch();
$req->closeCursor();
return $donnees;	
}
?>