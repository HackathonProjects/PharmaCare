<!--Shop owner login(Gather login details and rediretcs to success.php)-->
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/login_style.css">
</head>
<body>
	<div class="container" >
		<h1>PharmaCare	</h1>
			<div id="menu">	
			<a href="index.php" id="home">Home</a>
			<a href="#" id="about">About</a>
			<a href="#" id="contact">Contact</a>
			</div>
			<div id="header_1" class="container">
				<form action="success.php" method="POST">
				<input placeholder="Email-Username" type="text" name="email" class="input100"  id="email" required><br /><br />
				<input  placeholder="Password" type="password" name="pass" class="input100"  id="password" required>
				<input type="submit" name="button"  class="button1" value="Login"><br />
				</form>
				<form action="registration1.php">
				<input type="submit" name="button1"  class="button2" value="Sign Up">
				</form>
		</div>
	</div>
</body>
</html>