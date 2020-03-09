<?php
require_once('../pdoconfig.php');

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Query the username and password given in index.html
$query = "SELECT Username FROM Login WHERE Username=\"" .
	$_POST["username"] . "\" && password=\"" . $_POST["password"] . "\"";
$result = mysqli_query($conn, $query);

// Should only have one match for unique username and password
if (mysqli_num_rows($result) == 1) {
	echo "Login successfull"; // Temporary, for testing
	include 'login_success.php'; // Handles successful login
}
else {
	echo "Login failed"; // Temporary, should appear live on login.html
}
?>
