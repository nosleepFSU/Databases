<?php

    session_start();					//starts the session
	if($_SESSION['user']){	//checks if the user is logged in
    	$student = $_SESSION['user']; //assings student value
        
        $conn = mysql_connect("localhost", "root", "", "csinternship");
        
        $sql = "DELETE FROM students WHERE email='$student'"; 
 if (mysql_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysql_error($conn);
}
    }
mysqli_close($conn);


?>