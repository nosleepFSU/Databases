<?php
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$connection = mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	$db = mysql_select_db("csinternship") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("SELECT * FROM students WHERE email='$username'", $connection);
	$rows = mysql_num_rows($query); //Checks if username exists
	$table_users = "";
	$table_password = "";
	if($rows == 1) //IF there are no returning rows or no existing username
	{
		while($row = mysql_fetch_assoc($query)) //display all rows from query
		{   
			$table_users = $row['email']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
		}
        
		if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
					header("Location: home.php"); // redirects the user to the authenticated home page
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}
?>