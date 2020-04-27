<?php 
	require_once("dbconnect.php");

	function dispAns()
	{
		global $conn;
		try {
			/*
			else {
				if(!($sql_images = $conn->prepare("SELECT Title, Path, travelimagedetails.ImageID as ImageID
				                                   FROM   (geocountries JOIN travelimagedetails) JOIN travelimage
												   WHERE  Continent = ? AND ISO = ?
													 AND ISO = CountryCodeISO AND travelimagedetails.ImageID = travelimage.ImageID"))) {
					echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
					return;
				}
				$sql_images->bind_param("ss",  $_GET['continent'], $_GET['country'],);
			}

			$sql_images->execute();
			$sql_image = $sql_images->get_result();
			$rowArray = array();
			while ($row = $sql_image->fetch_assoc())
				$rowArray[] = $row; */
			$rowArray[] = {"One", "two", "Three"};
			echo json_encode($rowArray);
		} catch (Exception $e) {
			die("ImageFilter.php: " . $e);
		}
	}		
	
	exit(dispAns());
