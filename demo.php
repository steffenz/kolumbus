<meta charset="UTF-8">
<?php
include('GTFS_class.php');

$fromStop = $_GET['from'];
$toStop = $_GET['to'];
$travelDate = $_GET['dato'];
$travelTime = $_GET['tid'];


// Creates an array of travel data
$travel = setTravel($fromStop, $toStop,$travelDate, $travelTime);



// Find next departures of travel object - and a limit of results
$departures = findNextDeparture($travel, 5);


?>