<?php require_once('../inc/header.inc.php'); ?>

	<div class="content">
		<div class="container">
			<div class="row">
				<?php
					if (isset($_SESSION["loggedin"])) {
						echo "Logging out...<br>";
						session_destroy();
						//header("Location: https://www.kentcpp.com");
					}
					else {
						echo "User is already logged out.<br>";
						//header("Location: https://www.kentcpp.com");
					}
				?>
				<meta http-equiv="Refresh" content="0; url=https://www.kentcpp.com" />
			</div>
		</div>
	</div>
		
<?php require_once('../inc/footer.inc.php'); ?>

