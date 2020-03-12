<?php
/* Authenticates login given a username and password
 * Return values: -1 = bad username, 0 = bad password, 1 = match
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

	// Query username
	$query = "SELECT Username FROM Login WHERE Username=\"" . $Username . "\"";
	$result = mysqli_query($conn, $query);

	// Should only have one match for unique username
	if (mysqli_num_rows($result) == 1) {
		// Query username + password
		$query = "SELECT Username FROM Login WHERE Username=\"" .
		$Username . "\" && Password=\"" . $Password . "\"";
		$result = mysqli_query($conn, $query);
		// echo $query . "<br>";

		if (mysqli_num_rows($result) == 1) {
			return 1; // Match
		}

		return 0; // Bad password
	}

	return -1; // Bad username
}
?>
