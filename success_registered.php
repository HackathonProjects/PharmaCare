<!--Save the data of the shop owner from registration.php into database(shopowner,shop_location) -->
<?php
session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully <br>";
	mysqli_select_db($conn,'hackathon');
	$lat=$_SESSION['lat'];
	$long=$_SESSION['long'];
	$shopname=$_POST['shop'];
	$address=$_POST['address'];
	$contact_no=$_POST['contact_no'];
	$email=$_POST['email'];
	$reg_no=$_POST['reg_no'];
	$pin=$_POST['pincode'];
	$password=md5($_POST['pass']);

	$sql="insert into shopowner(name,address,contact_no,emailid,reg_no,pincode,password) values('$shopname','$address','$contact_no','$email','$reg_no','$pin','$password')" or die("Failed to Query database ".mysql_error());
	$res=mysqli_query($conn,$sql);
	echo "Your data have been entered into database";
	$sql="select sid from shopowner where name='$shopname'";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{
	while($row=mysqli_fetch_assoc($result))
	{
		$sql="insert into shop_location values($row[sid],$lat,$long)";
		$r=mysqli_query($conn,$sql);
	}
	}
?>
<a href="login.php">Login to continue...</a>