<?php
require_once('../pdoconfig.php');
// Setup link to database
$link = mysqli_connect($servername, $username, $password, $database);

if ($link) {
	die("Connection failed: " . mysqli_connect_error());
	exit();
}

echo "Link established\n";
?>
