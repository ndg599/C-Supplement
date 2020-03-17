
<?-- Prototype for search page-->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kent C++ Supplement</title>
	<meta charset="utf-8">
	<meta name="description" content="C++ Supplement for Kent State - Stark">
	<meta name="keywords" content="meta description, c++, Kent, State, Stark">
	<!-- Required as per Bootstrap documentation to utilize responsiveness -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap css file / Our custom css file (index_CSS) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/index_CSS.css">
	<!-- Fontawesome css file (for 'emoticons' like the search magnifying glass) / Google custom fonts -->
	<link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet"/> 
	<link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet"> <!-- VT323 (experimental font) -->
	<link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet"> <!-- Courier Prime (monospace) IN USE -->

</head>
<body>

	<div class="container-fluid border rounded-0 banner-sm mt-5">
		<span>Please keep browser &gt; 575px</span>
	</div>
	
	<nav class="navbar navbar-dark navbar-expand-834">
		<a class="navbar-brand" href="#"><img src="../img/K++_2.png" alt="Kent C++ Logo"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
		        aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle naviation"       >
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav nav nav-pills mr-auto mt-2 mt-md-0">	
				<li class="nav-item">
					<a class="nav-link mr-2 csI" href="#">CS I<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link mr-2 csII" href="#">CS II</a>
				</li>
				<li class="nav-item">
					<a class="nav-link csIII mr-2" href="#">CS III</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link csI" href="#">Chat</a>
				</li>  	  
			</ul>
			<form class="form-inline  ml-auto mr-2">
				<input class="form-control " type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-primary my-sm-0" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<form action="https://www.kentcpp.com/pages/login.html">
				<button class="btn btn-outline-primary mr-2 btn_mgn" type="submit">Login</button>
			</form>
		</div>  
	</nav>

	<div class="container-fluid rounded-0 banner">
		<span>Kent State's C++ Code Course</span>
	</div>


<?php
require_once("dbconnect.php");
$search="";
/*
if(isset($_POST['search'])){
	$search=$_GET['find'];	
}

$sql=$conn->prepare("Select * from Articles where title like '%"?"%' OR post like '%"?%"';
$sql->bind_param("s",$search);
$results=mysqli_query($conn,$sql);
if(!$results){
	printf("Error: %s\n",mysqli_error($conn));
	exit();
}

echo"<ul>";
if($results==0){echo "There were no matches.";}
else{echo" <p style text-align:left'>Found ".$result->num_rows."results";}
	while($row=mysqli_fetch_array($results)){
		$s=$row['title'];
		echo"li style='text-align:left'<a href='articles.php?results=$s'>".$row['title']."<br></a></li>";

	}echo"</ul>";


mysqli_close($conn);
*/

?>





<footer class="container-fluid rounded-0">
		<p>Footer Placeholder</p>
	</footer>
	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
© 2020 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About