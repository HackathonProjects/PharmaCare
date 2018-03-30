<!--Home page(Search,login,Signin)-->
<?php
	if (isset($_POST['search'])) {
		$response = "<ul><li>No data found!</li></ul>";
		$connection = new mysqli('localhost', 'root', '', 'hackathon');
		$q = $connection->real_escape_string($_POST['q']);
        $sql2="CREATE VIEW gm_view AS SELECT mname FROM medicine UNION SELECT gname FROM genmedicine"; 
        mysqli_query($connection,$sql2);
		$sql = $connection->query("SELECT mname FROM gm_view WHERE mname LIKE '%$q%'");
		if ($sql->num_rows > 0) {
			$response = "<ul>";
			while ($data = $sql->fetch_array())
				$response .= "<li>" . $data['mname'] . "</li>";
			$response .= "</ul>";
		}
        exit($response);
	}
$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long=(isset($_GET['long']))?$_GET['long']:'';
?>

<html>
<head>
	<title>PharmaCare</title>
	  <style type="text/css">
            ul {
                float: left;
                list-style: none;
                padding: 0px;
                border: 1px solid black;
                margin-top: 0px;
            }
            input, ul {
                width: 250px;
            }
            li:hover {
                color: silver;
                background: #0088cc;
            }
        </style>
</head>
<link href="css/index_css.css" rel="stylesheet">
<body>
	<div class="container" >
        <h1>PharmaCare</h1>
        <b><a href="https://www.google.com/maps/search/?api=1&query=medical" target="_blank" id="near">View Near By Stores</a></b>
			<div id="menu" class="container">	
		    <a href="index.php" id="home">Home</a>
            <a href="#" id="about">About</a>
            <a href="#" id="contact">Contact</a>
            <a href="login.php" id="login">Login</a>
            <a href="registration1.php" id="signin">Signin</a>
			</div>
			<form action="search2.php" method="POST">
			<div id="header_1" class="container">
				<img src="media/blanktheme.jpg"></img>
				<div id="search">
        <input class="input100"  type="text" name="search" placeholder="Search Query..." id="searchBox" required>
        <div id="response"></div>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#searchBox").keyup(function () {
                    var query = $("#searchBox").val();

                    if (query.length > 2) {
                        $.ajax(
                            {
                                url: 'index2.php',
                                method: 'POST',
                                data: {
                                    search: 1,
                                    q: query
                                },
                                success: function (data) {
                                    $("#response").html(data);
                                },
                                dataType: 'text'
                            }
                        );
                    }
                });

                $(document).on('click', 'li', function () {
                    var medicine = $(this).text();
                    $("#searchBox").val(medicine);
                    $("#response").html("");
                });
            });
        </script>
</div>
				<div id="select">
					<select name="column">
            			<option value="NON_GENERIC">Search Filter</option>
            			<option value="NON_GENERIC"> NON-GENERIC </option>
						<option value="GENERIC"> GENERIC </option>
            	</select>
            	
           			 <input type="hidden" name="access" value="<?php echo $lat ;?>">
					<input type="hidden" name="access2" value="<?php echo $long ;?>">
				</div>
				<div id="searchbtn">
					<button class="login100-form-btn">Search</button>

				</div>

			</div>
			</form>
		</div>

    </body>
</html>
