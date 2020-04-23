<html>
<body>
<h3>
<?php
function addImages($textArr, $imgArr) {
		$count = count($imgArr);
        for ($i=0; $i<$count; $i++) {
            $line = $imgArr[$i]->line;
            $img = $imgArr[$i]->filename;
			$textArr[$line] = $img . $textArr[$line];
        }

		return $textArr;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../pdoconfig.php');

// Setup link to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT Max(TopicID) FROM Article";
$result = mysqli_query($conn, $query);

if (!$result) {
	die("Query failed: " .  mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$articleID = $row["Max(TopicID)"];

$query = "SELECT * FROM Article WHERE TopicID=$articleID";
$result = mysqli_query($conn, $query);

if (!$result) {
	die("Query failed: " .  mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$textArr = preg_split("<<br />>", $row["Text"]);
$imgArr = JSON_decode($row["Images"]);
$textArr = addImages($textArr, $imgArr);
$text = "";
foreach ($textArr as $line) {
	$text = $text . $line . "<br>";
}
echo $text;
echo "----<br>";

$query = "SELECT * FROM Subtopics WHERE TopicID=$articleID";
$result = mysqli_query($conn, $query);

if (!$result) {
	die("Query failed: " .  mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
	$textArr = preg_split("<<br />>", $row["Text"]);
	$imgArr = JSON_decode($row["Images"]);
	$textArr = addImages($textArr, $imgArr);
	$text = "";
	foreach ($textArr as $line) {
		$text = $text . $line . "<br>";
	}
	echo $text;
	echo "----<br>";
}
?>
</h3></body></html>
