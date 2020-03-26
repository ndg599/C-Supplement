<?php
require_once("../pdoconfig.php");

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

session_start();
$_SESSION["chatpartner"] = $_GET["receiverid"];

// Query sent messages
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT IMText FROM IM WHERE SenderID=? && ReceiverID=?");
mysqli_stmt_bind_param($stmt, "ii", $_SESSION["userid"], $_GET["receiverid"]);
mysqli_stmt_execute($stmt);
$sentResult = mysqli_stmt_get_result($stmt);

// Query received messages
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT IMNum,IMText FROM IM WHERE ReceiverID=? && SenderID=?");
mysqli_stmt_bind_param($stmt, "ii", $_SESSION["userid"], $_GET["receiverid"]);
mysqli_stmt_execute($stmt);
$rcvdResult = mysqli_stmt_get_result($stmt);

require_once('../inc/header.inc.php');
?>
<head>
	<meta charset="utf-8">
	<script src="chat.js"></script>
</head>
<div class="content">
 <div class="container">
  <div class="row">
	<div class="col-6" id="sentMsgList">
		<?php
		while($row = mysqli_fetch_assoc($sentResult)) {
			echo "<p>" . $row["IMText"] . "</p>";
		}
		?>
	</div><br>
	<div class="col-6" id="rcvdMsgList">
		<?php
		while($row = mysqli_fetch_assoc($rcvdResult)) {
			echo "<p>" . $row["IMText"] . "</p>";
			$_SESSION["lastim"] = $row["IMNum"];
		}
		?>
	</div><br>
	<div class="col-12" id="msgInput">
		<textarea id="msgBox" cols="70" rows="2"></textarea>
		<input type="button" id="send" value="Send">
	</div>
  </div>
 </div>
</div>
<?php require_once('../inc/footer.inc.php');?>
