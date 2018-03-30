<!--Check the credentials of the user and redirects to upload.php -->
<?php 
session_start();
	if(isset($_POST['button']))
	{	
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn,'hackathon');

		$email=$_POST["email"];
		$password=md5($_POST["pass"]);
		$_SESSION['try']=$email;

		$sql="select * from shopowner where emailid='$email' and password='$password'" or die("Failed to Query database ".mysqli_error());
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);

		if($row['emailid']!=$email and $row['password']!=$password)
		{
			echo '<script language="javascript">';
			echo 'alert("Email or password is invalid...")';
			echo '</script>';
			$flag=0;
		}
		else
		{
			echo "Login Successful. Welcome ".$email;
			$flag=1;				
		}
	}
?>

<!DOCTYPE html>
<html>
<body>
	<form><input type="hidden" name="flag" id="flag" value="<?php echo $flag;?>"></form>
	<script type="text/javascript">	
		var flag = document.getElementById('flag').value;
		if(flag==1){
			window.location="upload.php";
		}
		if(flag==0){
			window.location="login.php";
		}
	</script>
</body>
</html>
