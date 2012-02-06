<meta charset="UTF-8">
<?php

$fra = $_GET['from'];
$til = $_GET['to'];
$dato = $_GET['dato'];
$tid = $_GET['tid'];

include('makeRoute.php');

findRoutes($fra, $fra, $tid);



?>