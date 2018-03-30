<!-- Creating a shop owner account-->
<?php
session_start();
			$lat=(isset($_GET['lat']))?$_GET['lat']:'';
			$long=(isset($_GET['long']))?$_GET['long']:'';
			$_SESSION['lat']=$lat;
			$_SESSION['long']=$long;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/registration.css">
</head>
	<body ><form action="success_registered.php" method="POST">
	<div class="container" >
		<h1>PharmaCare	</h1>
		<div id="menu">
			<a href="index.php" id="home">Home</a>
			<a href="#"  id="about">About</a>
			<a href="#" id="contact">Contact</a>
			<a href="login.php" id="login">Login</a>	
		</div>
	<div id="header_1" class="container">
			
				<input placeholder="Shop Name" class="input100"  type="text" name="shop" class="container" id="shop" required>
		
				<input placeholder="Address"   class="input100"  type="text" name="address" class="container" id="address" required>
				<input placeholder="Pin No"    class="input100"  type="text" name="pincode" class="container" id="pincode" required>
			
				<input placeholder="Contact No"    class="input100"  type="text" name="contact_no" class="container"  id="contact_no" required><br />
			
				<input placeholder="Email ID"   class="input100"  type="text" name="email"   class="container" id="email" required><br />
		
				<input placeholder="Registered No"   class="input100"  type="text" name="reg_no" class="container" id="reg_no" required><br />
				
				<input placeholder="Password"   class="input100"  type="password" name="pass"  class="container" id="pass" required><br />
				
				<button  class="button2" class="container" id="btn" type="submit" >Submit</button>
			</div>
		
	</div>
	</form>
</body>
</html>

