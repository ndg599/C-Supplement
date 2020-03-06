<?php
require_once('../pdoconfig.php');
// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

echo "Link established\n";
?>
