<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<meta charset="UTF-8">
<style type="text/css">
body {
background: #adbc0a;
margin:0;
padding:0;
}

* {
margin:0;
padding:0;
}

#kontainer {
width:900px;
margin:0 auto;
}
.ui-autocomplete { height: 200px; overflow-y: scroll; overflow-x: hidden;}

.fratil {
position: absolute;
background: #fff;
padding:10px;
width:340px;
margin-left:300px;
box-shadow: 2px 2px 1px #7d8807;
}

.fratil input {
width:300px;
outline: none;
border:none;
}

.fratil #clickme {
position: absolute;
margin-top:-5px;
margin-left:10px;
}

#kortAbout {
margin-top:300px;
position: absolute;
font-family:Helvetica;
font-size:12px;
margin-left:240px;
}

#kortAbout ul {
list-style: none;
}

#kortAbout li {
display: inline;
margin-right:50px;
}

#kortAbout a {
color:purple;
text-decoration: none;
}

#kortAbout a:hover {
text-decoration: underline;
}

#toppen {
margin-left:240px;
margin-top:40px;
}
</style>

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
<img id="toppen" src="topp.png"/>
<div class="ui-widget">

	<div id="fraPlass" class="fratil">
	<input id="from" placeholder="Kor henne e du?">
	<a id="clickme" href="#"><img src="off.png"></a>
	</div>
	
	
	<div style="display:none"id="tilPlass" class="fratil">
	<input id="to" placeholder=".. å kor vil du hen?">
	<a id="clickme" href="#"><img src="off.png"></a>
	</div>

</div>



<script>
$('#clickme').click(function() {
        $('#fraPlass').fadeOut();
        $('#tilPlass').show("slide", { direction: "right" }, 300);

    });
</script>

<div id="kortAbout">
<ul>
<li><a href="#">XML API</a></li>
<li><a href="#">JSON API</a></li>
<li><a href="#">Retningslinjer</a></li>
<li><a href="http://www.twitter.com/kverdagshelt">Twitter</a></li>
<li><a href="#">Om meg</a></li>
</ul>
</div>

</div>
</body>
</html>