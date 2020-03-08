<?php
require_once('../pdoconfig.php');
// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT Username FROM Login WHERE Username=\"" .
$_POST["username"] . "\" && password=\"" . $_POST["password"] . "\"";
#echo $query; echo "\n";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
	echo "Login successful";
}
else {
	echo "Login failed";
}
?>
