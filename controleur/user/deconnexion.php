<?php
include_once ('./../../util/routage_url.php');
session_start();
$_SESSION['user']=null;
session_destroy();
$index=urlMessageIndex("1");  
     header("Location: ".$index); 
?>