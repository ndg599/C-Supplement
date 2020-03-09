<?php
/* Authenticates login given a username and password (returning bool)
 * NOTE: args must start in caps or they will overlap with variables from pdoconfig
 */
function authLogin($Username, $Password)
{
	require_once('../pdoconfig.php');

	// Setup link to database
	$conn = mysqli_connect($servername, $username, $password, $database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Query the username and password
	$query = "SELECT Username FROM Login WHERE Username=\"" .
	$Username . "\" && password=\"" . $Password . "\"";
	$result = mysqli_query($conn, $query);
	#echo $query . "<br>";

	// Should only have one match for unique username and password
	if (mysqli_num_rows($result) == 1) {
		return true;
	}

	return false;
}
?>
