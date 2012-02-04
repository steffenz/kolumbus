<meta charset="UTF-8">
<?php

$fra = $_GET['from'];
$til = $_GET['to'];
$dato = $_GET['dato'];
$tid = $_GET['tid'];
include('mysql-config.php');


// Finne ID på FRA-STOPP
$result = mysql_query("SELECT * FROM stops WHERE stop_name = '$fra'");
while($row = mysql_fetch_array($result)) {
$fraStoppID = $row['stop_id'];
}

// Finne ID på TIL-STOPP
$result = mysql_query("SELECT * FROM stops WHERE stop_name = '$til'");
while($row = mysql_fetch_array($result)) {
$tilStoppID = $row['stop_id'];
}




$result = mysql_query("SELECT 
stops.stop_id, stops.stop_name, stops.stop_desc, stops.stop_lat, stops.stop_lon,

stop_times.trip_id, stop_times.arrival_time, stop_times.departure_time, stop_times.stop_sequence

FROM stops

JOIN stop_times ON stops.stop_id = stop_times.stop_id WHERE stops.stop_id = '$fraStoppID' ORDER BY arrival_time
 LIMIT 5");

echo "<table>
<tr>
<td>Fra holdeplass:</td>
<td>Avgang:</td>
<td>Ankomst:</td>
</tr>
";
while($row = mysql_fetch_array($result)) {
$trip_id = $row['trip_id'];
echo "<tr>
<td>$row[stop_name]<td>
<td>$row[arrival_time]</td>
<td>$trip_id</td>
</tr>";
}
echo "</table>";
?>