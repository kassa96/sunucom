<?php
function duration($date2)
{
$date1= date('d-m-Y h:i:s');
$date1 = date_create();
$date2 = date_create($date2);
//echo "date 1 : ".$date1->format("d-m-Y h:i:s")."<br/>";
//echo "date 2 : ".$date2->format("d-m-Y h:i:s")."<br/>";
$date_interval = date_diff( $date1, $date2 );
//echo $date_interval->format('%d% jours, %h% heures, %i% minutes, %s% secondes <br/>');

$seconde=(int)$date_interval->format('%s');
$minute=(int)$date_interval->format('%i');
$heure=(int)$date_interval->format('%h');
$jour=(int)$date_interval->format('%d');
if($jour>7){
	return ' le '.$date2->format("d-m-Y ");
}
else if ($jour==7) {
	return "il y'a environ une semaine ";
}
else if ($jour>1) {
	return "il y'a environ ".$jour." jours ";
}
else if ($jour==1) {
	return "il y'a environ une journée ";
}
else if ($heure>1) {
	return "il y'a environ ".$heure." heures ";
}
else if ($heure==1) {
	return "il y'a environ une heure ";
}
else if ($minute>1) {
	return "il y'a environ ".$minute." minutes ";
}
else if ($minute==1) {
	return "il y'a environ une minute ";
}
else return "il y'a quelques instants";
}
?>