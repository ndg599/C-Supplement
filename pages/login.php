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
		<div class="container d-flex h-100">
			<div class="row justify-content-center align-self-center mx-auto">
				<div class="col-9">
					<h3>Sign In</h3>
					<hr>
				</div>
				<form id="forms" action="login.php" method="post">
					<label class="kentYellow" for="username">Username</label>
					<!-- Keep username if just bad password -->
					<input type="text" name="username" 
					<?php if ($attempt == 0) echo "value=\"" . $_POST["username"] . "\""; ?> required><br>
					<label class="kentBlue mt-2" for="password">Password</label>
					<input type="password" name="password" required><br>
					<input class="btn btnKent mt-2" id="btnMv" type="submit" value="Sign In">
					<a href="./signup.php" class="btn btnKent" id="suMv">Sign Up</a>
				</form>
				<?php if (isset($errorMsg)) echo $errorMsg; // Error message from attempt ?>
			</div>
		</div>
	</div>
	
<?php require_once('../inc/footer.inc.php'); ?>
