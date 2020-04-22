<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["articleTitle"])) {
	class Image
	{
		public int $position;
		public string $filename;
		public string $caption;
		public string $alt;
	}

	function getImageJSON($sect)
	{
		$img = array();
		$i = 1;
		echo $sect . "ImgPos" . $i . "\n";
		while (isset($_POST[$sect . "ImgPos" . $i])) {
			$img[$i-1] = new Image();
			$img[$i-1]->position = $_POST[$sect . "ImgPos" . $i];
			$img[$i-1]->filename = $_POST[$sect . "ImgFile" . $i];
			$img[$i-1]->caption = $_POST[$sect . "ImgCap" . $i];
			$img[$i-1]->alt = $_POST[$sect . "ImgAlt" . $i];
			$i++;
			echo $sect . "ImgPos" . $i . "\n";
		}
		return JSON_encode($img);
	}

    require_once('../pdoconfig.php');

	$title = nl2br(htmlspecialchars($_POST["articleTitle"]));
	$body = nl2br(htmlspecialchars($_POST["articleBody"]));
	$imgJSON = getImageJSON("article");

    // Setup link to database
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

	echo "INSERT INTO Article VALUES (NULL,$title,$body,NULL,NULL,$imgJSON)";
	return;
/*
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, "INSERT INTO Article VALUES (NULL,?,?,NULL,NULL)");
	mysqli_stmt_bind_param($stmt, "ss", $title, $body);
	$result = mysqli_stmt_execute($stmt);

	if (!$result) {
		die("Query failed: " .  mysqli_error($conn));
	}
*/	
	$query = "SELECT Max(TopicID) FROM Article";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Query failed: " .  mysqli_error($conn));
	}

	$articleID = mysqli_fetch_assoc($result)["Max(TopicID)"];

	$i = 1;
	while (isset($_POST["subTitle" . $i])) {
		$title = htmlspecialchars($_POST["subTitle" . $i]);
		$body = htmlspecialchars($_POST["subBody" . $i]);
		$code = "";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, "INSERT INTO Subtopics VALUES (?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, "iisss", $articleID, $i, $title, $code, $body);
		$result = mysqli_stmt_execute($stmt);

		if (!$result) {
			die("Query failed: " .  mysqli_error($conn));
		}

		$i++;
	}
}
require_once('../inc/header.inc.php');
?>
<div class="content">
 <div class="container">
  <div class="row">
   <div class="col-12">
	<form action="makeArticle.php" method="post">
		<br>
		<?php 
		if (isset($articleID)) {
			echo "<p>Article #$articleID submitted successfully</p>";
		}
		?>
		<div id="sections">
			<div id="article">
				<p>Article Title:</p>
				<input type="text" name="articleTitle"><br><br>
				<p>Article Body:</p>
				<textarea name="articleBody" cols="70" rows="5"></textarea><br>
			</div>
		</div>
		<br><button type="button" id="addSub">Add SubSection</button>
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
