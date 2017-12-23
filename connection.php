<?php
function connect(){ 
	$servername = "localhost";
	$user_name = "root";
	$password_ = "";
	$dbname = "socialnetwork";

// Create connection
	$conn = new mysqli($servername, $user_name, $password_, $dbname);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;  
}
?>