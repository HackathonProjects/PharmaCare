<!--Find the nearest shops with available medicine using Haversine fromula (returns table) -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/search_style2.css">
</head>
<body>
<div class="container" >
		<h1>PharmaCare	</h1>
		<div id="menu">
			<a href="index.php" id="index">Home</a>
			<a href="#" id="about">About</a>
			<a href="#" id="contact">Contact</a>
			</div>
<div id="header_1" class="container">

<?php
$opt=$_POST['column'];
$name=$_POST['search'];
$lat=$_POST['access'];
$long=$_POST['access2'];
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn,"hackathon") or die("not found");
function getDistance($latitude1,$longitude1,$latitude2,$longitude2)
{
	$earthRadius=6371;
	$latFrom= deg2rad($latitude1);
	$lonFrom= deg2rad($longitude1);
	$latTo= deg2rad($latitude2);
	$lonTo= deg2rad($longitude2);
	$latDelta=$latTo -$latFrom;
	$lonDelta=$lonTo -$lonFrom;
	$angle=2*asin(sqrt(pow(sin($latDelta/2),2)+ cos($latFrom)*cos($latTo)*pow(sin($lonDelta/2),2)));
	return $angle*$earthRadius;
}
if($name!="")
{
if($opt=="GENERIC")
{
	gen($conn,$name,$lat,$long);
}
else if($opt=="NON_GENERIC")
{
 	nongen($conn,$name,$lat,$long);
 	geninnon($conn,$name,$lat,$long);
 	alt($conn,$name,$lat,$long);
}
}
else{
	include('index.php');
}
function geninnon($conn,$name,$lat,$long)
{
$sql="select * from shop_location where sid in(select sid from  gs_rel where stock>0 and gid in (select gid from mg_rel where mid in(select mid from medicine where mname like('%$name%'))));";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
$i=0;
$distance[$i]=getDistance($row['latitude'],$row['longitude'],$lat,$long);
$try=$distance[$i];
$sql2="Insert into dist(sid,distance) values($row[sid],$try);";
mysqli_query($conn, $sql2); 
$i++;
}
}

$k=5.0000; //KM
$flag=0;

do{
$sql3="select * from shopowner where sid in(select sid from dist where distance<=$k);";
$result3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result3)>0){
echo "<h3>Generic alternatives</h3>";	
while($row2=mysqli_fetch_assoc($result3))
{
echo "<table border='1'>
				<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Pin Code</th>
			<th>Contact No.</th>
			<th>Email ID</th>
			<th>Reg No.</th>
			</tr>";	 
		echo "<tr>";
		echo'<td>'.$row2['name'].'</td>';
		echo'<td>'.$row2['address'].'</td>';
		echo'<td>'.$row2['pincode'].'</td>';
		echo'<td>'.$row2['contact_no'].'</td>';
		echo'<td>'.$row2['emailid'].'</td>';
		echo'<td>'.$row2['reg_no'].'</td>';
		echo "</<tr>";
		echo "</table>";
		echo'<br/><br/> <hr/>';
$flag=1;
}
break;
}
else
{
	$k++;
}
}while($k<=15.000);

if($flag==0){
	echo "<h3>Generic not found</h3>";
}
$sql="delete from dist;";
mysqli_query($conn,$sql);
}

function nongen($conn,$name,$lat,$long)
{
		$sql="select * from shop_location where sid in(select sid from  ms_rel where stock>0 and mid in(select mid from medicine where mname like('%$name%')));";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck>0)
		{
		while($row=mysqli_fetch_assoc($result))
		{
		$i=0;
		$distance[$i]=getDistance($row['latitude'],$row['longitude'],$lat,$long);
		$try=$distance[$i];
		$sql2="Insert into dist(sid,distance) values($row[sid],$try);";
		mysqli_query($conn, $sql2);
		$i++;
		}
		}
		$k=5.0000;
		$flag=0;

		do{
		$sql3="select  *from shopowner where sid in(select sid from dist where distance<=$k);";
		$result3=mysqli_query($conn,$sql3);
		if(mysqli_num_rows($result3)>0){
			echo "<h3>Non-generic medicines</h3>";
		while($row2=mysqli_fetch_assoc($result3))
		{
		echo "<table border='1'>
				<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Pin Code</th>
			<th>Contact No.</th>
			<th>Email ID</th>
			<th>Reg No.</th>
			</tr>";	
		echo "<tr>";
		echo'<td>'.$row2['name'].'</td>';
		echo'<td>'.$row2['address'].'</td>';
		echo'<td>'.$row2['pincode'].'</td>';
		echo'<td>'.$row2['contact_no'].'</td>';
		echo'<td>'.$row2['emailid'].'</td>';
		echo'<td>'.$row2['reg_no'].'</td>';
		echo "</<tr>";
		echo "</table>";
		echo'<br/><br/> <hr/>';
		$flag=1;
		}
		break;
		}
		else
		{
			$k++;
		}
		}while($k<=15.000 );
		
		if($flag==0){
			echo "<h3>Medicine not found</h3>";
		}
		$sql="delete from dist;";
		mysqli_query($conn,$sql);
		
}

function gen($conn,$name,$lat,$long){
		$sql="select * from shop_location where sid in(select sid from  gs_rel where stock>0 and gid in(select gid from genmedicine where gname like('%$name%')));";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck>0)
		{
		echo "<h3>Generic medicines</h3>";
		while($row=mysqli_fetch_assoc($result))
		{
		$i=0;
		$distance[$i]=getDistance($row['latitude'],$row['longitude'],$lat,$long);
		$try=$distance[$i];
		$sql2="Insert into dist(sid,distance) values($row[sid],$try);";
		mysqli_query($conn, $sql2);
		$i++;
		}
		}
		else
		{
		echo 'error';
		}
		$k=5.0000;
		$flag=0;
		do{
		$sql3="select  *from shopowner where sid in(select sid from dist where distance<=$k);";
		$result3=mysqli_query($conn,$sql3);
		if(mysqli_num_rows($result3)>0){
		while($row2=mysqli_fetch_assoc($result3))
		{
		echo "<table border='1'>
				<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Pin Code</th>
			<th>Contact No.</th>
			<th>Email ID</th>
			<th>Reg No.</th>
			</tr>";	 
		echo "<tr>";

		echo'<td>'.$row2['name'].'</td>';
		echo'<td>'.$row2['address'].'</td>';
		echo'<td>'.$row2['pincode'].'</td>';
		echo'<td>'.$row2['contact_no'].'</td>';
		echo'<td>'.$row2['emailid'].'</td>';
		echo'<td>'.$row2['reg_no'].'</td>';
		echo "</<tr>";
		echo "</table>";		
		echo'<br/><br/> <hr/>';
		$flag=1;
		}
		break;
		}
		else
		{
			$k++;
		}
		}while($k<=15.000 );
		
		if($flag==0){
			echo "<h3>Generic not found</h3>";
		}
		$sql="delete from dist;";
		mysqli_query($conn,$sql);
}
function alt($conn,$name,$lat,$long)
{
$sql="select * from shop_location where sid in(select sid from  ms_rel where stock>0 and mid in (select aid from ma_rel where mid in(select mid from medicine where mname like('%$name%'))));";

$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0)
{
	echo "<h3>Alternative medicines</h3>";
	while($row=mysqli_fetch_assoc($result))
{
$i=0;
$distance[$i]=getDistance($row['latitude'],$row['longitude'],$lat,$long);
$try=$distance[$i];
$sql2="Insert into dist(sid,distance) values($row[sid],$try);";
mysqli_query($conn, $sql2);
$i++;
}
}
$k=5.0000;
$flag=0;

do{
$sql3="select * from shopowner where sid in(select sid from dist where distance<=$k);";
$result3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result3)>0){
while($row2=mysqli_fetch_assoc($result3))
{
echo "<table border='1'>
				<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Pin Code</th>
			<th>Contact No.</th>
			<th>Email ID</th>
			<th>Reg No.</th>
			</tr>";	 
		echo "<tr>";
		echo'<td>'.$row2['name'].'</td>';
		echo'<td>'.$row2['address'].'</td>';
		echo'<td>'.$row2['pincode'].'</td>';
		echo'<td>'.$row2['contact_no'].'</td>';
		echo'<td>'.$row2['emailid'].'</td>';
		echo'<td>'.$row2['reg_no'].'</td>';
		echo "</<tr>";
		echo "</table>";
		echo'<br/><br/> <hr/>';
$flag=1;
}
break;
}
else
{
	$k++;
}
}while($k<=615.000 );
if($flag==0){
echo "<h3>Alternatives not found!</h3>";
}
$sql="delete from dist;";
mysqli_query($conn,$sql);
}
?>
</div>
</div>
</body>
</html>
