
<?-- Prototype for search page-->

<!DOCTYPE html>


<?php
require_once('../inc/header.inc.php'); 
require_once("dbconnect.php");
$search="";
echo "<div class='container d-flex h-100'>";
echo '<div class="row justify-content-center align-self-center mx-auto">';


if(isset($_GET['search'])){
		
$s="%{$_GET['search']}%";

$sql=$conn->prepare("Select * from article Join subtopics where article.TopicName LIKE ? OR article.Text LIKE ? OR subtopics.SubName LIKE ? OR Subtopics.Text LIKE ?");
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

}
echo "</div></div>";
require_once('../inc/footer.inc.php'); 
?>






	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
