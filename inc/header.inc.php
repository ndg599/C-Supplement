<?php
	if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] === "")
		$dir = "./";
	else
		$dir = "../";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php session_start(); ?> <!-- Start php session so session variables are available -->
	<title>Kent C++ Supplement</title>
	<meta charset="utf-8">
	<meta name="description" content="C++ Supplement for Kent State - Stark">
	<meta name="keywords" content="meta description, c++, Kent, State, Stark">
	<!-- Required as per Bootstrap documentation to utilize responsiveness -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap css file / Our custom css file (index_CSS) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $dir; ?>css/site.css">
	<!-- Fontawesome css file (for 'emoticons' like the search magnifying glass) / Google custom fonts -->
	<link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet"/> 
	<link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet"> <!-- VT323 (experimental font) -->
	<link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet"> <!-- Courier Prime (monospace) IN USE -->

</head>

<body class="text-white">
	<!-- Each section should be wrapped in a class called container or container-fluid. The container class has a bit of margin between itself
	     and the sizes of the webpage. The container-fluid class runs from end to end which is what I want for the navbar and header/footer.
		 Each container has 12 columns. This can be nested, so a container within a container has its own 12 columns to use. For example, if you 
		 wanted 3 photos side-by-side, you could make each span 4 columns (totalling 12) and would all be on one row (more on this below). 
		 Border class denotes a border, rounded-0 means don't round the corners of the container, banner-sm is custom and is defined in index_CSS.

		 This pops up when the browser width is <= 575px 																							-->
	<div class="container-fluid border rounded-0 banner-sm" style="margin-top: 61px;">
		<span>Please keep browser &gt; 575px</span>
	</div>
	
	<!-- The navbar already spans the width of the page so no container-fluid. Navbar class is to make this section a navigation bar. 
	     Navbar-dark is dark theme. Navbar-expand-834 is custom and is defined in index_CSS. Some of the contents here came from the 
		 documentation. Any class that begins with nav- or navbar- is a Bootstrap class and included in the documentation template.                 -->
	<nav class="navbar navbar-dark navbar-expand-834">
		<!-- navbar-brand is where your logo goes -->
		<a class="navbar-brand" href="#"><img src="<?php echo $dir; ?>img/K++_2.png" alt="Kent C++ Logo"></a>
		<!-- navbar-toggler allows for the navbar collapsing (when you shrink the browswer and the navbar "disappears" and turns into the 
		     hamburger button. This whole button is from Bootstrap documentation -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
		        aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle naviation"       >
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- Navbar content to display during a larger screen width and to collapse during a smaller screen width. Collapse allows for the 
		     shrinking of the navbar content (look at the button above data-toggle="collapse" which connects the section to shrink down). 
																																					-->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<!-- List for the navbar. nav-pills highlights the current (active) page. I chose this, because I didn't want to mess with creating a
		     different background as it made the text askew. mr-auto means margin-right automatic, so the content is left-justified in the 
			 collapse box. mt-2 is margin-top 2, and the number indicates how large you want the margin to be on the top of the element. 
			 The highest number is 5. mt-md-0 is setting the top margin to nothing as long as the browser is >= medium width (size ranges are
			 in the documentation.																													-->
			<ul class="navbar-nav nav nav-pills mr-auto mt-2 mt-md-0">	
				<!-- nav-item is a class for an item on a html list -->
				<li class="nav-item">
					<!-- csI, csII, csIII are the Kent colors shown in index_CSS. sr-only means to display that section to screen readers, and
					     will not be seen on the website itself -->
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
			<!-- form-inline is a Bootstrap class that formats the inputs to a form. Inline having the inputs on one row. ml-auto is
			     to right-justify the form (search bar). mr-2 is a margin of size 2 on the right of the search button to separate it from
				 the Account button -->
			<form class="form-inline  ml-auto mr-2">
				<!-- form-control styles the input area -->
				<input class="form-control " type="search" placeholder="Search" aria-label="Search">
				<!-- btn class is to denote a button, btn-primary is the specific color of the button (there are several options), 
				     my-sm-0 is margin top and bottom set to none as long as the browser is >= small width. far fa-search are
					 fontawesome classes where fa-search is the magnifying glass image. This <i> section is copied from the 
					 fontawesome website when selecting an image to use -->
				<button class="btn btn-primary my-sm-0" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<!-- btn-outline-primary is a color scheme that only has the outline of the element colored and the inside transparent 
			     (primary is blue for Bootstrap 4.X). btn_mgn is a custom class in index_CSS -->
			<!-- check if user is logged in with php session to set button to account/login accordingly -->
			<form action="<?php if (isset($_SESSION["loggedin"])) { echo "https://www.kentcpp.com/pages/account.php"; }
			else { echo "https://www.kentcpp.com/pages/login.php"; } ?>">
				<button class="btn btn-outline-primary mr-2 btn_mgn" type="submit">
				<?php if (isset($_SESSION["loggedin"])) echo "Account"; else echo "Login"; ?>
				</button>
			</form>
		</div>  
	</nav>
