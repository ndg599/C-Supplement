Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@bjacob12 
Learn Git and GitHub without any code!
Using the Hello World guide, you’ll start a branch, write comments, and open a pull request.


Code Issues 0 Pull requests 0 Projects 0 Actions Wiki Security Pulse Community
C-Supplement/pages/signin.php / 
@Tutlegoss Tutlegoss Updated signin.php and dbconnect.php
972bfcb 1 minute ago
@Tutlegoss@bjacob12
Executable File  198 lines (173 sloc)  6.79 KB
  
You're using code navigation to jump to definitions or references.
Learn more or give us feedback
<?php
	function validateEmail($email) {
	   $pattern = '/^[\-0-9a-zA-Z\.\+_]+@[\-0-9a-zA-Z\.\+_]+\.[a-zA-Z\.]{2,5}$/';
	   if ( preg_match($pattern, $email) ) {
		 return true;
	   }
	   return false;
	}

	function validatePassW($password) {
	   $pattern = "/^.{8,30}$/";
	   if ( preg_match($pattern, $password) ) {
		 return true;
	   }
	   return false;
	}

/*	DEBUGGING ONLY: /*
/*	error_reporting(E_ALL);
	echo "<pre>";
	ini_set('display_errors',1);
	ini_set('error_log', 'sign_error'); */
	require_once("dbconnect.php");
			session_start();

	 if(isset($_POST['create'])) {
	       $_email = $_POST['_email'];
               $_username = $_POST['_username'];
               $_password = $_POST['_password'];
		$_type="Student";
		$_randomID=rand(100,99999999999);
		$sql1="select ID from login";
		$results= $conn->query($sql1);
		if(!$sql1){
			printf("Error: %s\n",mysqli_error($conn))
			exit();
		}
		$resultarr=array();
		while($row=mysqli_fetch_array($results)){
			$resultarr[]=$row;
		}
		$bool=0;
		while($bool==0){
		$bool=1;
		foreach($resultarr as $row){
			echo "results";
			if($_randomID==$row['ID']){
				$_randomID=$_randomID=rand(100,99999999999);
				$bool=0;
			}
		}
		}
	 	
		$_type="student";
		$error="";
		if(validateEmail($_email)===false){
		
		  $error="<br>Your email is invalid. Please try again. ";
		}
		if(validatePassW($_password)===false){
		  $error= $error . "<br>Your Password is invalid. Must be 8 characters or more. "; 
		}

		if($error!=""){
			echo $error;
		}else{

	       	$_hash=password_hash($_password,PASSWORD_BCRYPT);
   
            	$sql =$conn->prepare("INSERT INTO Login ".
               	"(Username, Password,ID,Email, Type ) "."VALUES ".
              	"(?,?,?,?,?)");
	
		$sql->bind_param("ssiss",$_username,$_hash,$_randomID,$_email,$_type);
		$retval=$sql->execute();
            
			
            	//$retval = mysqli_query($conn, $sql->execute());
	    	if(false===$retval){
			printf("error:%s\n", mysqli_error($conn));
		}
         
            	if(! $retval ) {
               		die('This account cannot be created. Please try again later.');
           	}
	   		//header("location: index.php");		
            		mysqli_close($conn);
          	}
	}	
?>

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

	<!--Form for user to sign up-->
	<div class="content">
		<div class="container text-white mt-5">
			<div class="row">
				<div class="col-12">
					<p> Sign Up</p>
					<hr>
					<p> Please enter your email address, your username, and password </p>
					<form method = "post">
						<table width = "400" border = "0" cellspacing = "1" cellpadding = "2">
							<tr>
							   <td width = "250">Username</td>
							   <td>
								  <input name = "_username" type = "text" id = "_username">
							   </td></tr>
						 
							<tr>
							   <td width = "200">Email Address</td>
							   <td>
								  <input name = "_email" type = "text" id = "_email">
							   </td></tr>
						 
							<tr>
							   <td width = "200">Password</td>
							   <td>
								  <input name = "_password" type = "text" id = "_password">
							   </td></tr>

							<tr>
							   <td width = "200"> </td>
							   <td>
								  <input name = "create" type = "submit" id = "create"  value = "Create account">
							   </td>
							</tr>		
						</table> 
					</form>
				</div>
			</div>
		</div>
	</div>
	
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
