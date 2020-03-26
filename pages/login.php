<?php
	include 'authLogin.php';

	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$attempt = authLogin($_POST["username"], $_POST["password"]);

		switch ($attempt) {
		case -1: // Bad username 
			$errorMsg = "<br>Invalid username. Try again.<br>";
			break;
		case 0: // Bad password
			$errorMsg = "<br>Wrong password. Try again.<br>";
			break;
		default: // Match, user ID was returned
			echo "<br>Login successful. Redirecting....<br>";
			session_start();
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["userid"] = $attempt;
			header("Location: https://www.kentcpp.com"); // Redirect to main page
			break;
		}
	}
	require_once('../inc/header.inc.php');
?>
	<div class="content">
		<div class="container">
			<div class="row">
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
			</div>
		</div>
	</div>
	
<?php require_once('../inc/footer.inc.php'); ?>
