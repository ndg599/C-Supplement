<?php
require_once("../../pdoconfig.php");

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

// Query messages
session_start();
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT IMText FROM IM WHERE SenderID=? && ReceiverID=?");
mysqli_stmt_bind_param($stmt, "ii", $_SESSION["userid"], $_GET["receiverid"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!doctype html>
<html>  
<head>  
	<title>Chat Prototype</title>
	<meta charset="utf-8">
	<script src="chat.js"></script> 
</head>
<body>
	<h3>Messages</h3>
	<div id="msgList">
<?php
while($row = mysqli_fetch_assoc($result)) {
	echo $row["IMText"] . "<br>";
}
?>
	</div><br>
	<div id="msgInput">
		<textarea id="msgBox" cols="70" rows="2"></textarea>
		<input type="button" id="send" value="Send">
	</div>
</body>
</html>
