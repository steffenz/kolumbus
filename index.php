<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<meta charset="UTF-8">
</head>
<body>

<script>
	$(function() {
		var availableTags = [
		<?php
		include('mysql-config.php');
		
	$result = mysql_query("SELECT DISTINCT stop_name AS holdeplass FROM stops");
	while($row = mysql_fetch_array($result)) {
	echo '"' . $row['holdeplass'] .'",'; 
	}

		?>
		];
		$( "#from" ).autocomplete({
			source: availableTags
		});
		
		$( "#to" ).autocomplete({
			source: availableTags
		});
	});
	</script>


	
<div id="kontainer">
<div class="ui-widget">

	<div id="fraPlass" class="fratil">
	
	<label for="from">Fra:</label>
	<input id="from" placeholder="Fra holdeplass">
	
<br/><br/>
	
	<label for="to">Til:</label>
	<input id="to" placeholder="Fra holdeplass">
	
<br/><br/>
	</div>

</div>

</div>

</body>
</html>