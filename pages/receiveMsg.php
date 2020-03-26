<?php
require_once('../pdoconfig.php');
date_default_timezone_set("America/New_York");
header("Cache-Control: no-cache");
header("Content-Type: text/event-stream");

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

repeat:
// Find max IMNum
session_start();
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT MAX(IMNum) FROM IM WHERE ReceiverID=? && SenderID=?");
mysqli_stmt_bind_param($stmt, "ii", $_SESSION["userid"], $_SESSION["chatpartner"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$lastMsgNum = $row["MAX(IMNum)"];

if ($lastMsgNum > $_SESSION["lastim"]) {
	goto getLastMsg;
}
else {
	goto finish;
}

getLastMsg:
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT IMText FROM IM WHERE ReceiverID=? && SenderID=? && IMNum=?");
mysqli_stmt_bind_param($stmt, "iii", $_SESSION["userid"], $_SESSION["chatpartner"], $lastMsgNum);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$text = $row["IMText"];

$_SESSION["lastim"] = $lastMsgNum;

finish:
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

echo "retry: 500\n";
echo "data: {$text}\n\n";
ob_end_flush();
flush();
sleep(0.5);
?>
