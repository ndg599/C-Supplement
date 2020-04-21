<?php
/*
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
*/ 
require_once('../inc/header.inc.php');
?>
<div class="content">
 <div class="container">
  <div class="row">
   <div class="col-12">
	<form action="makeArticle.php" method="post">
		<br>
		<?php 
		if ($result) {
			echo "<p>Article submitted successfully</p>";
		}
		?>
		<div id="article">
			<p>Article Title:</p>
			<input type="text" name="title"><br><br>
			<p>Article Body:</p>
			<textarea id="body" name="body" cols="70" rows="5"></textarea><br>
		</div>
		<button type="button" id="addSub">Add SubSection</button>
		<button type="button" id="addImg">Add Image</button>
		<button type="button" id="addCode">Add Code Snippet</button>
		<button type="button" id="addVid">Add Video</button><br><br>
		<input type="submit" id="submit" value="Submit Article">
	</form>
   </div>
  </div>
 </div>
</div>
<script src="makeArticle.js"></script>
<?php require_once('../inc/footer.inc.php');?>
