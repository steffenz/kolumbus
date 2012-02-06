<?php

// Path to MYSQL
include('mysql-config.php');

// Find routes - requires SQL version of tables

function findRoutes($fromStop, $toStop, $departureTime) {

$result = mysql_query("SELECT * FROM stops WHERE stop_name = '$fra'");
while($row = mysql_fetch_array($result)) {
$fromStop_ID = $row['stop_id'];
}

$result = mysql_query("SELECT * FROM stops WHERE stop_name = '$til'");
while($row = mysql_fetch_array($result)) {
$toStop_ID = $row['stop_id'];
}

return "Hello World";

}



?>