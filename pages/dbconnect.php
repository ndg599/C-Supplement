<?--Used to open database-->
<?php
require_once('../pdoconfig.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
         
 if(! $conn ){
               die('Could not connect: ' . mysqli_error($conn));
  }
  else
	  echo "Database Connection was successful";
?>