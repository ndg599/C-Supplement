<?php

if (isset($_POST["desc"])) {
    require_once('../pdoconfig.php');

	$desc = htmlspecialchars($_POST["desc"]);

	$input = htmlspecialchars($_POST["input1"]);

	$i = 1;
	$output = Array();
	while (isset($_POST["output" . $i])) {
		$output[$i] = htmlspecialchars($_POST["output" . $i]);
		$i++;
	}

	$output = json_encode($output);

    // Setup link to database
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, "INSERT INTO ProgQuiz VALUES (NULL,?,?,?)");
	mysqli_stmt_bind_param($stmt, "sss", $desc, $input, $output);
	$result = mysqli_stmt_execute($stmt);

	if (!$result) {
		die("Query failed: " .  mysqli_error($conn));
	}

}
 
require_once('../inc/header.inc.php');
?>
<div class="content">
 <div class="container">
  <div class="row">
   <div class="col-12">
	<form action="makePrgQuiz.php" method="post">
		<br>
		<?php 
		if ($result) {
			echo "<p>Quiz submitted successfully</p>";
		}
		?>
		<p>Program Description:</p>
		<textarea name="desc" cols="70" rows="5"></textarea>
		<p><br>Enter each input to be received by the program's standard input (optional)</p>
		<p>Input 1:</p>
		<input type="text" name="input1">
		<p><br>Enter each output of the program and what feedback it should receive (leave the feedback blank for correct output)</p>
		<div id="output">
			<p>Output 1:</p>
			<textarea name="output1" cols="50" rows="10"></textarea><br>
		</div>
		<button type="button" id="addOutput">Add Acceptable Output</button><br>
		<br><input type="submit" id="submit" value="Submit Quiz">
	</form>
   </div>
  </div>
 </div>
</div>
<script src="makePrgQuiz.js"></script>
<?php require_once('../inc/footer.inc.php');?>
