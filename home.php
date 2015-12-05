<html>
	<head>
		<title>Home</title>
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
	<Welcome>
		<p>Hello <?php Print "$student"?>!</p> <!--displays username-->
		<a href="delete.php">Delete ME!!!</a><br/><br/>
		<a href="company.php">Companies</a><br/>
		<a href="api.php">Where YOU can BE</a><br/>
			<h2 align="center">General List</h2>
        
            <form action="delete.php" method="post">
			<table border ="1px" width="100%">
			<tr>
				<th>Company</th>
				<th>Rating</th>
				<th>Listing</th>
			</tr>
			<?php
				$connection = mysql_connect("localhost", "root","") or die(mysql_error()); //connect
				mysql_select_db("csinternship") or die("Cannot connect to database"); //connect
				$query = mysql_query("SELECT * FROM favorites", $connection); //sql query
				while($row = mysql_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['website'] . "</td>";
						Print '<td align="center">'. $row['rating'] . "</td>";
						Print '<td align="center">'. $row['listing'] . "</td>";
                    Print "</tr>";
				}
            

			?>
			</table>	
            </form>

		</body>
</html>
		