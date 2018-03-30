<!-- Gets location of the user and redirects to index2.php-->
<?php
$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long=(isset($_GET['long']))?$_GET['long']:'';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PharmaCare</title>
</head>
<link href="css/index_css.css" rel="stylesheet">
<body onload="getLocation()">
	<div class="container" >
			<h1>PharmaCare</h1>
			<form action="index.php" method="POST">
			<div id="header_1" class="container">
				<img src="media/blanktheme.jpg"></img>
			</div>
			</form>
	</div>

<script  type="text/javascript">
function getLocation()
		{
			if(navigator.geolocation)
			{
				navigator.geolocation.getCurrentPosition(redirectToPosition);
			}
			else{
				x.innerHTML="Please update your browser";
			}
	}
	function redirectToPosition(position)
	{
	var x=alert("Share your location");
	window.location='index2.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
	}
</script>
</body>
</html>
