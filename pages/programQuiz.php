<?php 
require_once("../pdoconfig.php");

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT Descr FROM ProgQuiz WHERE ID=?");
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
		<br><p><?php echo $row["Descr"]; ?></p>
		<div id="textBox" style="background-color: Black" class="lang-clike"><code></code></div>
		<input type="button" id="send" value="Send"><br><br>
		<p id="result"></p>
	</div>
  </div>
 </div>
</div>
<script src="prism.js"></script>
<link href="../css/prism.css" rel="stylesheet" />
<script src="programQuiz.js"></script>
<script type="module">
	import {CodeJar} from '../node_modules/@medv/codejar/codejar.js';
	let jar = new CodeJar(document.querySelector('#textBox'), Prism.highlightElement);
	jar.updateCode("\n\n");
</script>
<?php require_once('../inc/footer.inc.php');?>
