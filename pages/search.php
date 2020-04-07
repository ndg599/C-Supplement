
<?-- Prototype for search page-->


<!DOCTYPE html>

<?php

//error_reporting(-1);
//ini_set("display_errors","0");
//ini_set("log_errors",0);
//require_once('../inc/header.inc.php'); 
//require_once("dbconnect.php");
//$search="";
//echo "<div class='container d-flex h-100'>";
//echo '<div class="row justify-content-center align-self-center mx-auto">';

/*
if(isset($_GET['search'])){
		
$s="%{$_GET['search']}%";

$sql=$conn->prepare("Select * from Article Join Subtopics where Article.TopicName LIKE ? OR Article.Text LIKE ? OR Subtopics.SubName LIKE ? OR Subtopics.Text LIKE ?");
$sql->bind_param("ssss",$s,$s,$s,$s);
$sql->execute();
$results=$sql->get_result();
if(!$results){
	printf("Error1: %s\n",mysqli_error($conn));
	exit();
}

$received=0;
	while($row=mysqli_fetch_array($results)){
		$received=1;
		$x="";
		if(stripos($row['SubName'],$_GET['search'])!==false){
			
			$x=$row['SubName'];
		}else{$x=$row['TopicName'];}
		$r=$row['TopicID'];
		echo "<li style='text-align:left'><a href='article2.php?ID=$r'>".$x."<br></a></li>";
		$str=$row['Text'];
		echo "<li>".substr($str,0,120)."...<br></li>";
		
	}
	echo "</ul>";
if($received==0){
	echo "<p>There were no results. Please try again.</p>";
}
mysqli_close($conn);

}else{header("Location: https://www.kentcpp.com");}
echo "</div></div>";




*/
//require_once('../inc/footer.inc.php'); 


?>






	
    
