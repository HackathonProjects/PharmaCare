<!--Upload CSV file of the owner-->
<?php
session_start();
include("csv.php");
$csv=new csv();
$email=$_SESSION['try'];
echo "Welcome ".$email;
if(isset($_POST['sub']))
{
	$csv->import($_FILES['file']['tmp_name']);
	$sql="select sid from shopowner where emailid='$email';";
	$result1=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result1);
	if($resultCheck>0)
	{
		while($row=mysqli_fetch_assoc($result1))
		{
			echo $row['sid'];
			$_SESSION['sid']=$row['sid'];
			echo $_SESSION['sid'];
		}
	}
$sql2="select * from temp;";
$result=mysqli_query($conn,$sql2);
echo "<br/>";
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
echo $row['medname'];
echo "<br/>";
$sql3="select mid from medicine where mname='$row[medname]';";
$result2=mysqli_query($conn,$sql3);
$resultCheck2=mysqli_num_rows($result2);
if($resultCheck2>0){
	while($row2=mysqli_fetch_assoc($result2))
	{
		echo $row2['mid'];
		echo'<br/>';
		$sql4="update ms_rel set stock=$row[stock] where sid=$_SESSION[sid] and mid=$row2[mid];";
		$result4=mysqli_query($conn,$sql4);
	}
}
}
}
else
{
echo'error';
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Phamracare/upload</title>
	<link rel="stylesheet" type="text/css" href="css/upload_style.css">
</head>
<body>
	<div class="container" >
		<h1>PharmaCare	</h1>
		<h4><a href="index.php" id="logout">Logout</a></h4>
		<div id="menu">
			<a href="index.php" id="index">Home</a>
			<a href="#" id="about">About</a>
			<a href="#" id="contact">Contact</a>
			</div>

			<form  method="post" enctype="multipart/form-data">
			<div id="header_1" class="container">
				<img src="media/blanktheme.jpg" ></img>
				<input type="file" name="file" class="input100"  id="file">
				<input type="submit" name="sub" class="input100" id="submit" value="Import Data">
			</form>
		</div>
	</div>
</body>
</html>