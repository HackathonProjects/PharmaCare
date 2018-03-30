<!-- Get shop owner location and redirects to registration.php-->
<script  type="text/javascript">
getLocation();
function getLocation(){
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
	   window.location='registration.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
	}
</script>
