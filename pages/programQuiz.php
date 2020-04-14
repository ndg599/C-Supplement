<?php 
require_once("../pdoconfig.php");

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT * FROM ProgQuiz WHERE ID=?");
mysqli_stmt_bind_param($stmt, "i", $_GET["ID"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
	die("Query failed: " .  mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

require_once('../inc/header.inc.php');
?>
<div class="content">
 <div class="container">
  <div class="row">
	<div class="col-12">
		<p><?php echo $row["Desc"]; ?></p>
		<textarea id="textBox" cols="100" rows="20"></textarea>
		<input type="button" id="send" value="Send">
		<p id="result"></p>
	</div>
  </div>
 </div>
</div>
<script src="programQuiz.js"></script>
<?php require_once('../inc/footer.inc.php');?>
