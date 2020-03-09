<?php
include 'index.html';

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




require_once("dbconnect2.php");
		session_start();

	 if(isset($_POST['create'])) {
	       $_email = $_POST['_email'];
               $_username = $_POST['_username'];
               $_password = $_POST['_password'];
	 	$_intt=300;
		$error="";
		if(validateEmail($_email)===false){
		$_username="broken";
		  $error="<br>Your email is invalid. Please try again. ";
		}
		if(validatePassW($_password)===false){
		  $error= $error . "<br>Your Password is invalid. Must be 8 characters or more. "; 
		}

		if($error!=""){
			echo $error;
		}else{

	       	$_hash=password_hash($_password,PASSWORD_BCRYPT);
   
            	$sql =$conn->prepare("INSERT INTO user ".
               	"(username, email, password,numbe ) "."VALUES ".
              	"(?,?,?,?)");
	
		$sql->bind_param("sssi",$_username,$_email,$_hash,$_intt);
		$retval=$sql->execute();
            
			
            	//$retval = mysqli_query($conn, $sql->execute());
	    	if(false===$retval){
			printf("error:%s\n", mysqli_error($conn));
		}
         
            	if(! $retval ) {
               		die('This account cannot be created. Please try again later.');
           	}
	   		//header("location: account.php");		
            		mysqli_close($conn);
          	}
	}
		
      ?>


<?--Form for user to sign up-->
	  <br><br>
<main class="container">
<p> Sign Up</p><hr width="1700">
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
               </td></tr>		
         </table> 
</main>