<!-- Import CSV file of shop owner-->

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,'hackathon');

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
echo "Connected successfully";}

class csv extends mysqli
{
	private $state_csv = false;
	public function __construct()
	{
	   parent::__construct("localhost","root","","hackathon");
	   if($this->connect_error)
	   {
	   	echo "Fail to connect to database: ".$this->connect_error;
		}
	}
	public function import($file)
	{
		$file=fopen($file,'r');
		while ($row =fgetcsv($file)) {
			$value="'".implode("','",$row) ."'";
			$sql="insert into temp values (".$value.")";
			if ($this->query($sql)) {

				$this->state_csv=true;
			}
			else{
				$this->state_csv=false;
				echo $this->error;
			}
		}
		if ($this->state_csv) {
			echo '<script language="javascript">';
			echo 'alert("Successfully imported...")';
			echo '</script>';
					}
		else{
			echo '<script language="javascript">';
			echo 'alert("No File Selected...")';
			echo '</script>';
		}
	}
}
?>