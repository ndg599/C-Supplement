<?php 
	require_once("../pages/dbconnect.php");

	function dispAns()
	{
		global $conn;
		try {
			if(!($sql_results = $conn->prepare("SELECT Ans, Exp FROM Questions ORDER BY QNum ASC"))) {
				printf("Error\n" + $sql_results->error);
				return;
			}
			
			$sql_results->execute();
			$sql_results = $sql_results->get_result();
			$rowArray = array();
			while ($row = $sql_results->fetch_assoc())
				$rowArray[] = $row; 

			echo json_encode($incoming);
		} catch (Exception $e) {
			die("quizResults.php: " . $e);
		}
	}		
	
	exit(dispAns());
