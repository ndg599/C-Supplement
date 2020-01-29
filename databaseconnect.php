<?php
	require_once 'pdoconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname",
		                $username, $password);
		                
		echo "Connected to $dbname at $host sucessfully $_POST[Q1_selection].";
		echo "$_POST[Q1_selection]";
		$sql = "INSERT INTO u664461894_Survey
		(Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, Q11, Q12, Q13)
		VALUES
		('$_POST[Q1_selection]','$_POST[Q2_selection]','$_POST[Q3_selection]',
		 '$_POST[Q4_selection]','$_POST[Q5_selection]','$_POST[Q6_selection]',
		 '$_POST[Q7_selection]','$_POST[Q8_selection]','$_POST[Q9_selection]',
		 '$_POST[Q10_selection]','$_POST[Q11_selection]','$_POST[Q12_selection]',
		 '$_POST[Q13_selection]')";
		 
	    if (!mysql_query($sql, $conn))
	        die('Error: ' . mysql_error());
	   
	   echo "ADDED!";
		
	} catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" .
		    $pe->getMessage());
	}
