<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kent C++ Supplement</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/index_CSS.css">
	<link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet"/> 
	<link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">

</head>
<body>
	<?php
	include 'authLogin.php';

	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$attempt = authLogin($_POST["username"], $_POST["password"]);
		switch ($attempt) {
		case -1: 
			$errorMsg = "<br>Invalid username. Try again.<br>";
			break;
		case 0:
			$errorMsg = "<br>Wrong password. Try again.<br>";
			break;
		case 1:
			echo "<br>Login successful. Redirecting....<br>";
			session_start();
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $_POST["username"];
			header("Location: https://www.kentcpp.com"); // Redirect to main page
			break;
		}
	}
	?>
	<form action="login.php" method="post">
		<label for="username">Username</label><br>
		<!-- Keep username if just bad password -->
		<input type="text" name="username" 
		<?php if ($attempt == 0) echo "value=\"" . $_POST["username"] . "\""; ?> required><br>
		<label for="password">Password</label><br>
		<input type="password" name="password" required><br>
		<input type="submit" value="Submit">
	</form>
	<?php if (isset($errorMsg)) echo $errorMsg; // Error message from attempt ?>
</body>
