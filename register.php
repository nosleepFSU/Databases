<html>
	<head>
	<title>Internship Database</title>
	</head>
	<body>
		<h2>Registration</h2>
		<a href="index.php">Main</a><br/><br/>
		<form action="register.php" method="POST">
			Enter Name:		<input type="text" name="username" required="required" /><br/>
			Enter Email:		<input type="email" name="email" required="required" /> <br/>
			Enter Password:	<input type="password" name ="password" required="required" /> <br/>
			Enter GPA: 		<input type="text" name="gpa" required="required"/><br/>
			<input type="submit" value="Register"/>
		</form>
	</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$gpa = mysql_real_escape_string($_POST['gpa']);
	$bool = true;
	
	echo "Username entered is: ". $username . "<br/>";
	echo "Email entered is: ". $email . "<br/>";
	//echo "Password entered is: ". $password . "<br/>";
	echo "GPA entered is: ". $gpa . "<br/>";
	
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("csinternship") or die("Cannot connect to database");
	$query = mysql_query("Select * from students");
	while($row = mysql_fetch_array($query))
	{
		$table_users = $row['email'];
		if($username == $table_users)
		{
			$bool = false;
			Print '<script>alert("Username is not availabe!")</script>';
			Print '<script>window.location.assign(register.php");</script>';
		}
		
	}
	
	if($bool)
	{
		mysql_query("INSERT INTO students(email, password, gpa, resume, name) VALUES('$email', '$password', '$gpa', 'null', '$username')");
		Print '<script>alert("Successfully Registered!");</script>';
		Print '<script>window.location.assign("register.php");</script>';		
	}
}
?>