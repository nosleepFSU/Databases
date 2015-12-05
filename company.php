<html>
	<head>
		<title>Companies</title>
	</head>
	<?php
	session_start();					//starts the session
	if($_SESSION['user']){	//checks if the user is logged in
	}
	else{
			header("location: index.php");	//redirects to homepage
	}
	$student = $_SESSION['user']; //assings student value
	?>
		<body>
			<h2>Home Page</h2>
		<p>Hello <?php Print "$student"?>!</p> <!--displays username-->
		<a href="logout.php">Don't leave PLEASE!!</a><br/><br/>
		<a href="home.php">Home</a><br/>
		<a href="api.php">Where YOU can BE</a><br/>
            <form action="company.php" method="POST">
                Enter company name to search for: <input type="text" name="cName">
                <input type="submit" name="submit">
            </form>
            
			<h2 align="center">Companies</h2>
			<table border ="1px" width="100%">
			<tr>
				<th>Website</th>
				<th>Rating</th>
				<th>Listing</th>
			</tr><br/>

			<?php    
                $compName = $_POST['cName'];
				$connection = mysql_connect("localhost", "root","") or die(mysql_error()); //connect
				mysql_select_db("csinternship") or die("Cannot connect to database"); //connect
				$query = mysql_query("SELECT * FROM favorites WHERE website LIKE '%".$_POST['cName']."%'", $connection) or die($query."<br/><br/>".mysql_error()); //sql query
				while($row = mysql_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['website'] . "</td>";
						Print '<td align="center">'. $row['rating'] . "</td>";
						Print '<td align="center">'. $row['listing'] . "</td>";
					Print "</tr>";
				}

			?>
                
<!--
			<table border ="1px" width="100%">
			<tr>
				<th>Location</th>
				<th>Listing</th>
				<th>Duration</th>
			</tr>
           -->     
                
                
			</table>	
        </body>
</html>