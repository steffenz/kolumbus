<?php

/*
*
*
*	GTFS-SQL Trip planner
*	Originally created for Kolumbus GTFS
*   
*   Developed by Steffen Martinsen - @kverdagshelt
*
*
*	Please ask for permission if you intend to use
*	all, or part of this code.
*
*
*	Do you like what you see? Consider buying me a
* 	beer!
*
*
*/

include('mysql-config.php');

function setTravel($fromStop, $toStop, $departureDate, $departureTime) {

	
	// Find ID of stop-names
	$departureTime = $departureTime . ":00";
	$result = mysql_query("SELECT * FROM stops WHERE stop_name = '$fromStop'");
	while($row = mysql_fetch_array($result)) {
	$fromStop_ID = $row['stop_id'];
	}$result = mysql_query("SELECT * FROM stops WHERE stop_name = '$toStop'");
	while($row = mysql_fetch_array($result)) {
	$toStop_ID = $row['stop_id'];
	}

	
	
	// Create Travel Object
	
	$travel['from'] = $fromStop_ID;
	$travel['from_name'] = $fromStop;
	$travel['to'] = $toStop_ID;
	$travel['to_name'] = $toStop;
	$travel['time'] = $departureTime;
	$travel['date'] = $departureDate;

	
	// Returns data
	
	return $travel;

}



function findNextDeparture($travelObject, $maxDepartures) {

	$result = mysql_query("SELECT * FROM stop_times WHERE stop_id = '$travelObject[from]' AND  departure_time >= 	'$travelObject[time]' ORDER BY departure_time LIMIT $maxDepartures");
	$count = 0;
	while($row = mysql_fetch_array($result)) {
	$tripid = $row['trip_id'];
	$departure = $row['departure_time'];
	$stopSeq = $row['stop_sequence'];
	
	$departures[$count] = array("trip_id" => $tripid, "departure" => $departure, "stopNumber" => $stopSeq);
	$count++;
	}
	
	return $departures;

}



?>