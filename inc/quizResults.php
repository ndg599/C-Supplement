<?php 
	require_once("../pages/dbconnect.php");

	function dispAns()
	{
		$incoming = json_decode($_POST["choices"], false);
		global $conn;
		try {
			if(!($sql_results = $conn->prepare("SELECT * FROM Questions SORT BY QNum ASC"))) {
				printf("Error\n");
				return;
			}

			$sql_results->execute();
			$sql_results = $sql_results->get_result();
			$rowArray = array();
			while ($row = $sql_results->fetch_assoc())
				$rowArray[] = $row; 
printf("HH");
			echo json_encode($rowArray);
		} catch (Exception $e) {
			die("quizResults.php: " . $e);
		}
	}		
	
	exit(dispAns());
