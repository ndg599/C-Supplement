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
		<div class="container mt-5">
			<div class="row justify-content-center mx-auto">
				<div class="col-12">
					<h3>Connect with a Tutor</h3>
					<hr>
				</div>
			</div>
			<div class="row justify-content-center mx-auto">
				<div class="col-12">
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<a id='chatLink' href=\"https://www.kentcpp.com/pages/chat.php?partnerid=" . $row["ID"]
					. "\">" . $row["Username"] . "</a>";
				}
				?>
				</div>
			</div>
		</div>
	</div>

<?php require_once('../inc/footer.inc.php'); ?>
