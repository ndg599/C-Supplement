<?php
$servername = "kentcpp.com";
$username = "u664461894_group2";
$password = "group2kentcpp";
$database = "u664461894";
// Setup link to database
$link = mysqli_connect($servername, $username, $password, $database);

if ($link) {
	die("Connection failed: " . mysqli_connect_error());
	exit();
}

echo "Link established\n";
?>
