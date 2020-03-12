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
		
		$_randomID=mt_rand();
		$sql1="select ID from Login";
		$results= mysqli_query($conn,$sql1);
		if (!$results) {
    			printf("Error: %s\n", mysqli_error($conn));
   			 exit();
		}
		$resultarr=array();
		while($row=mysqli_fetch_array($results)){
			$resultarr[]=$row;
		}
		$bool=0;
		echo $_randomID;
		while($bool==0){
			$bool=1;
			foreach($resultarr as $row){
				if($_randomID==$row){
					
					$_randomID=mt_rand();
					$bool=0;
				}
			}
		}
	 	
		$_type="student";
		$error="";
		if(validateEmail($_email)===false){
			$error='<br><p class="white-text">Your email is invalid. Please try again.</p>';
		}

		if(validatePassW($_password)===false){
			$error= $error . '<br><p class="white-text">Your Password is invalid. Must be 8 characters or more.</p>'; 
		}

		if($error!=""){
			echo '<p class="white-text">'.$error.'</p>';
		}else{

	    	$_hash=password_hash($_password,PASSWORD_BCRYPT);
   
           	$sql =$conn->prepare("INSERT INTO Login ".
            "(Username, Password,ID,Email, Type ) "."VALUES ".
            "(?,?,?,?,?)");
	
			$sql->bind_param("ssiss",$_username,$_hash,$_randomID,$_email,$_type);
			$retval=$sql->execute();
 
	    	if(false===$retval){
				printf("error:%s\n", mysqli_error($conn));
			}

          	if(! $retval ) {
               	die('This account cannot be created. Please try again later.');
           	}
           	mysqli_close($conn);
	   		//header("location: index.php");		
		}
	}	
	
	require_once('../inc/header.inc.php'); 
?>
	<!--Form for user to sign up-->
	<div class="content text-white">
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
	
<?php require_once('./inc/footer.inc.php'); ?>