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
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, "SELECT Password FROM Login WHERE Username=?");
	mysqli_stmt_bind_param($stmt, "s", $Username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	// Should only have one match for unique username
	if (mysqli_num_rows($result) == 1) {
		$obj = mysqli_fetch_object($result);
		$hash = $obj->Password;
		return (int)password_verify($Password, $hash);
	}

	return -1; // Bad username
}
?>
