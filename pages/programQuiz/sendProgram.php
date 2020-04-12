<?php
function compileErrorFeedback($compileError)
{
	require_once('../../pdoconfig.php');

	// Setup link to database
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM CompileFeedback";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		if (strpos($compileError, $row["Target"])) {
			return $row["Feedback"];
		}
	}

	return NULL;
}

function outputFeedback($output)
{
	require_once('../../pdoconfig.php');

	// Setup link to database
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	return "Correct.<br><br>Your output:<br>$output"; 
}

// Write received program to cpp file and compile it
$file = fopen("input.cpp", "w") or die("Failed to open file");
$text = $_GET["text"];
fwrite($file, $text);
$compileError = shell_exec('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/snap/bin g++ input.cpp 2>&1');

// Clear file
$text = "\n";
fwrite($file, $text);
fclose($file);

// Check for compile error and try to return feedback to page
if ($compileError) {
	$feedback = compileErrorFeedback($compileError);
	echo "COMPILE ERROR:<br>$compileError<br><br>";
	echo $feedback ? "Feedback:<br>$feedback" : "No feedback found. If you're confused about this error, please discuss it with a tutor.";
}
// Check for correctness of output and return feedback
else {
	$output = shell_exec('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/snap/bin ./a.out 2>&1');
	shell_exec("rm a.out");
	echo outputFeedback($output);
}
?> 
