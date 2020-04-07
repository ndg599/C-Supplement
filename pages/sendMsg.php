<?php
require_once('../pdoconfig.php');

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
// Insert message
session_start();
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "INSERT INTO IM (SenderID, ReceiverID, IMText) VALUES (?,?,?)");
mysqli_stmt_bind_param($stmt, "iis", $_SESSION["userid"], $_SESSION["partnerid"], $_GET["text"]);
mysqli_stmt_execute($stmt);
sleep(0.1);
// Find sent message
//$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT MAX(IMNum) FROM IM WHERE SenderID=?");
mysqli_stmt_bind_param($stmt, "i", $_SESSION["userid"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$lastMsgNum = $row["MAX(IMNum)"];
// Return sent message
//$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT IMText,Time FROM IM WHERE IMNum=?");
mysqli_stmt_bind_param($stmt, "i", $lastMsgNum);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$text = $_GET["text"];
if ($text != $row["IMText"]) {
	$text = "Failed to send message";
}
echo "<div class='sentMsgHead'>" . $_SESSION["username"] . " | " . $row["Time"] 
	. "</div><div class='sentMsgText'>" . $text . "</div>";
?>
