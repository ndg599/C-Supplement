<?php

if (isset($_POST["desc"])) {
    require_once('../pdoconfig.php');

	$desc = htmlspecialchars($_POST["desc"]);

	$i = 1;
	$answers = Array();
	while (isset($_POST["answer" . $i])) {
		$answers[$i] = htmlspecialchars($_POST["answer" . $i]);
		$i++;
	}

	$answers = json_encode($answers);

    // Setup link to database
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, "INSERT INTO ProgQuiz VALUES (NULL,?,?)");
	mysqli_stmt_bind_param($stmt, "ss", $desc, $answers);
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
	<p>Quiz Description:</p>
	<form action="makePrgQuiz.php" method="post">
		<textarea name="desc" cols="70" rows="5"></textarea>
		<div id="answers">
			<p>Acceptable Output 1:</p>
			<textarea name="answer1" cols="50" rows="10"></textarea><br>
		</div>
		<button type="button" id="addAnswer">Add Acceptable Output</button><br>
		<br><input type="submit" id="submit" value="Submit Quiz">
	</form>
   </div>
  </div>
 </div>
</div>
<script src="makePrgQuiz.js"></script>
<?php require_once('../inc/footer.inc.php');?>
