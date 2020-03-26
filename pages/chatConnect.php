<?php
require_once('../pdoconfig.php');

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT ID,Username FROM Login WHERE Type='Tutor'";
$result = mysqli_query($conn, $query);

require_once('../inc/header.inc.php');
?>
        <div class="content">
                <div class="container">
			<div class="row">
			<div class="col-12">
				<br><p>Connect With a Tutor</p>
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<a href=\"https://www.kentcpp.com/pages/chat.php?receiverid=" . $row["ID"]
					. "\">" . $row["Username"] . "</a>";
				}
				?>
			</div>
			</div>
		</div>
	</div>
<?php require_once('../inc/footer.inc.php'); ?>
