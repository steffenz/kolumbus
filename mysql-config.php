<?php
// MySQL tilkobling

$brukernavn = "root";
$passord = "root";
$host = "localhost:8889";
$database = "kolumbusrutedata";

$tilkobling = mysql_connect($host, $brukernavn, $passord);
if (!$tilkobling) {
	die("Det oppstod en feil under tilkoblingen til databasen. Kontakt systemansvarlig!");
	break;
}

mysql_set_charset('utf8',$tilkobling);
mysql_select_db($database, $tilkobling);
// Stille hvis alt går i orden.
?>