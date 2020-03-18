<?php
	if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] === "")
		$dir = "./";
	else
		$dir = "../";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php session_start(); ?> <!-- Start php session so session variables are available -->
	<title>Kent C++ Supplement</title>
	<meta charset="utf-8">
	<meta name="description" content="C++ Supplement for Kent State - Stark">
	<meta name="keywords" content="meta description, c++, Kent, State, Stark">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php ob_start(); echo $dir; ?>css/site.css">
	<link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet"/> 
	<link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet"> <!-- VT323 (experimental font) -->
	<link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet"> <!-- Courier Prime (monospace) IN USE -->

</head>

<body class="text-white">
	<div class="container-fluid border rounded-0 banner-sm" style="margin-top: 61px;">
		<span>Please keep browser &gt; 575px</span>
	</div>
	
	<nav class="navbar navbar-dark navbar-expand-834">
		<a class="navbar-brand" href="#"><img src="<?php echo $dir; ?>img/K++_2.png" alt="Kent C++ Logo"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
		        aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle naviation"       >
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav nav nav-pills mr-auto mt-2 mt-md-0">	
				<li class="nav-item">
					<a class="nav-link mr-2 csI" href="#">CS I</span></a>
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
	<?php if (isset($_SESSION["loggedin"])) echo "<!--"; // Probably a better way to do this, like including, but it works for now ?>
			<form action="http://localhost/pages/login.php">
				<button class="btn btn-outline-primary mr-2 btn_mgn" type="submit">Login</button>
			</form>
	<?php if (isset($_SESSION["loggedin"])) echo "-->"; else echo "<!--"; ?>
			<div class="nav-item dropdown">
				<a class="nav-link dropdown-toggle nav-item text-white" href="#"
				id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
				<div class="dropdown-menu dropdownPos" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">Edit</a>
					<a class="dropdown-item" href="#">This</a>
					<a class="dropdown-item" href="#">...</a> 						
				</div>
			</div>
	<?php if (!isset($_SESSION["loggedin"])) echo "-->"; ?>
		</div>  
	</nav>
