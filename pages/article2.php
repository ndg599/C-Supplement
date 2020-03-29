<?php 
	require_once('../inc/header.inc.php'); 
    require_once('../inc/code.inc.php');
	require_once('../inc/topicText.inc.php');
	require_once("dbconnect.php");

	/* Page must have an ID and be valid to execute page*/
	if (isset($_GET['ID'])) {
		/* Main topic information pull */
		try {
			if(!($sql_article = $conn->prepare("SELECT * FROM article WHERE TopicID = ?;"))) {
				echo '<p class="kentYellow errorBelowNav">Database prepare failure</p>';
				mysqli_close($conn);
				exit();
			}
			
			$sql_article->bind_param("i", $_GET['ID']);
			$sql_article->execute();
			$res_article = $sql_article->get_result();
			
			if(!($row_article = $res_article->fetch_assoc())) {
				echo '<p class="kentYellow errorBelowNav">Database fetch failure. ID may be invalid.</p>';
				mysqli_close($conn);
				exit();
			}
			
			$articleName = $row_article['TopicName'];
			$videoLink   = $row_article['VideoLink'];
		}
		catch(Exception $e) {
			echo '<p class="kentYellow errorBelowNav">Database failure for article</p>';
		}
	}
	else {
		echo '<p class="kentYellow errorBelowNav">No Article ID in URL</p>';
		mysqli_close($conn);
		exit();
	}

	function displayImages($imgTable, $subnum = NULL) 
	{
		/* Image pull */
		try {
			global $conn;
			
			/* Main area may have multiple images */
			if ($imgTable == "images") {			
				$stmt = "SELECT * FROM " . $imgTable . " WHERE TopicID = ?;";
				if(!($sql_img = $conn->prepare($stmt))) {
					echo '<p class="kentYellow" style="font-size: 1.3rem">Database prepare failure</p>';
					return;
				}
				$sql_img->bind_param("i", $_GET['ID']);
			}
			/* So far, each subtopic may have one image */
			else if ($imgTable == "subimages") {				
				$stmt = "SELECT * FROM " . $imgTable . " WHERE TopicID = ? AND SubNum = ?;";
				if(!($sql_img = $conn->prepare($stmt))) {
					echo '<p class="kentYellow" style="font-size: 1.3rem">Database prepare failure</p>';
					return;
				}				
				$sql_img->bind_param("ii", $_GET['ID'], $subnum);
			}
			else {
				echo '<p class="kentYellow" style="font-size: 1.3rem">Image retrieval failure</p>';
				return;
			}
			
			$sql_img->execute();
			$res_img = $sql_img->get_result();
			
			while($row_img = $res_img->fetch_assoc()) {
				echo	'<figure>
							<img src="../img/' . $row_img['Filename'] . '" class="figOpts" alt="Responsive image">
							<figcaption class="justify-center kentYellow">';
				if ($row_img['Figcaption'] != NULL)
					echo	$row_img['Figcaption'];
				else
					echo	"";
				echo 	'</figcaption>
						 </figure>';
			}
				
		}
		catch(Exception $e) {
			echo '<p class="kentYellow">Database failure for ' . $imgTable. '</p>';
		}
	}

	function displaySubtopics() 
	{
		/* Image pull */
		try {
			global $conn;
			global $code;
			global $raw;
			global $topicText;
			if(!($sql_sub = $conn->prepare("SELECT * FROM subtopics WHERE TopicID = ? ORDER BY SubNum ASC;"))) {
				echo '<p class="kentYellow" style="font-size: 1.3rem">Database prepare failure</p>';
				return;
			}
			
			$sql_sub->bind_param("i", $_GET['ID']);
			$sql_sub->execute();
			$res_sub = $sql_sub->get_result();
			
			while($row_sub = $res_sub->fetch_assoc()) {
				echo 	'<div class="container-fluid mt-5">
						    <h3 class="intro">' . $row_sub['SubName'] . '</h3>
							<hr>
						 </div>';
				echo    '<div class="container-fluid">
							<div class="row ml-5 mr-5">
								<div class="col-12 section">';
								
				echo $topicText['Pointers'];
				/*displayMainText(); */
				displayImages("subimages", $row_sub['SubNum']);
				
				if($row_sub['CodeID'] != NULL) {
					echo	'<p class="kentBlue">Example Code:</p>
						     <div class="row">
								<div class="col-12 col-lg-9 Code_Ex ml-1 mb-1">'
									. $code[$row_sub['CodeID']] .
							   '</div>
							    <div class="col-11 mt-1 mb-2">
									<button class="btn btn-success" id="' . $row_sub['CodeID'] . '" 
									        onclick="copyStringToClipboard(\'' . $raw[$row_sub['CodeID']] . '\', \'' . $row_sub['CodeID'] . '\')" 
									        type="button">Copy Code</button>
									<span>*iOS users, manually copy</span>
								</div>
							 </div>';
				}
				
				/* Ending 3 divs from second echo of while loop */
				echo	'</div>
				         </div>
						 </div>';
			}
				
		}
		catch(Exception $e) {
			echo '<p class="kentYellow">Database failure for subtopic(s)</p>';
		}
	}
	
	function displayQuiz() 
	{
		/* Quiz information pull */
		try {
			global $conn;
			global $code;
			if(!($sql_quiz = $conn->prepare("SELECT * FROM questions WHERE TopicID = ?;"))) {
				echo '<p class="kentYellow" style="font-size: 1.3rem">Database prepare failure</p>';
				return;
			}
			
			$sql_quiz->bind_param("i", $_GET['ID']);
			$sql_quiz->execute();
			$res_quiz = $sql_quiz->get_result();
			
			/* choices is an aid for the output of question options*/
			$choices = array('A', 'B', 'C', 'D', 'E');
			for ($i = 0; ($row_quiz = $res_quiz->fetch_assoc()); ++$i) {
				/* Question */
				echo 	'<label class="mt-4 mb-4 qSize">' 
							. ($i + 1) . ') ' . $row_quiz['Question'] .
						'</label>
						 <br>';
				/* Code (if any) */
				if ($row_quiz['CodeID'] != NULL) {
					echo 	'<div class="col-12 col-lg-9 Code_Ex ml-1 mb-1">'
								. $code[$row_quiz['CodeID']] .
							'</div>
							 <br>';
				}
				/* Options / Choices */
				for($j = 0; $j < count($choices); ++$j) {
					if($row_quiz[$choices[$j]] == NULL)
						continue;
					echo	'<label class="qBox kentYellow">' 
								. $row_quiz[$choices[$j]] .
							'<input type="radio" name="'
								. $row_quiz['QNum'] . 
							'" value = "'
								. $choices[$j] .
							'">
							 <span class="checkmark"></span>
							 </label>';
				}
			}
						
			if ($i === 0) {
				echo '<p class="kentYellow" style="font-size: 1.3rem">Database fetch failure or no present quiz questions</p>';
				return;
			}
		}
		catch(Exception $e) {
			echo '<p class="kentYellow">Database failure for quiz</p>';
		}
	}
/*
//code to post a new comment
//Still currently incomplete
//Will complete once article database is setup
	
	
	if(isset($_POST['comment'])) {
	if($_SESSION["loggedin"]==true){
		$_comment=$_POST['comment'];
		//$_articleNum=  THE ARTICLE NUMBER WILL GO HERE!!!!!! - $_GET['ID']
		$_date=date('Y-m-d H:i:s');
		$sql1="Select MAX(EntryNum) from comments";
		$maxEN=mysqli_query($conn,$sql1);
		if (!$maxEN){
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		$max=mysqli_fetch_array($maxEN);
		$sql=$conn->prepare("INSERT INTO comments". "(Text,ID,Time,EntryNum,TopicID)"."VALUES".
		"(?,?,?,?,?)");
		$sql->bind_param("s,i,i,i,i"),$_comment,$_SESSION['UserID'],$_date,$max+1,$_articleNum);
		$result=$sql->execute();
		if(false===$result){
			printf("error:%s\n",mysqli_error($conn));
		}
		if(!$result){
			die('Your cannot post your comment. Please try again later.');
		}	
		mysqli_close($conn);
	}else{
		echo '<p class="red">You must sign in to add a comment.</p>';}
*/



?>
	<div class="content">
			<!-- Main Section - Maybe just a summary? -->
			<div class="container-fluid mt-3">
				<h1 class="intro"><?php echo $articleName ?></h1>
				<hr>
			</div>
			<div class="container-fluid">
				<div class="row ml-5 mr-5">
					<div class="col-12 section">
						<?php 
							echo $topicText['Pointers'];
							/* displayMainText(); */
							displayImages("images"); 
						?>				
					</div>
				</div>
			</div>
			
			<!-- Subtopic Section -->
			<?php
				displaySubtopics();
			?>
			
			<!-- Video Section -->
			<div class="container-fluid mt-5">
				<h3 class="intro kentYellow">Video</h3>
				<hr>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-9">
					<div class="embed-responsive embed-responsive-16by9">
						<?php   if($videoLink != NULL) {
									echo '<iframe class="embed-responsive-item" src="'. $videoLink . '" allowfullscreen>
									      </iframe>';
						        } else
									echo '<p class="kentYellow text-center" id="noVid">No video for topic available</p>';
						?>					
					</div>
					</div>
				</div>
			</div>
			
			<!-- Quiz Section -->
			<div class="container-fluid mt-5">
				<h3 class="intro kentBlue">Quiz</h3>
				<hr>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<form name="FORM" action="../quizProcess.???" method="post"> 
							<?php displayQuiz(); ?>
						</form>
					</div>
				</div>
			</div>
			
			<!-- Comments Section -->
			<div class="container-fluid mt-5">
				<h3 class="text-white intro">Comments</h3>
				<hr>
			</div>
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-8 col-12">
						<form action="" method="post">
							<div class="input-group">
								<textarea type="text" rows="10" name="comment" value="comment" placeholder="Enter Comment..." class="form-control"></textarea>
							</div>
							<button type="submit" class="btn btn-primary mt-2">Submit</button>
						</form>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-12 section">
						<!-- PHP Function would be good here, maybe -->
					<?php   //REMOVE ABOVE DIV CLASS LINE!!
					/*
						require_once("dbconnent.php");
						$sql2="Select * from Comments";
						$results=mysqli_query($conn,$sql2);
						if(!results){
							printf("Error: %s\n", mysqli_error($conn));
							exit();
						}
						$resultarr=array();
						while($row=mysqli_fetch_array($results)){
							$sql3="Select username from Login where ID= $row[ID]";
							$res=mysqli_query($conn,$sql3);
							if (!$res) {
								printf("Error: %s\n", mysqli_error($conn));
								 exit();
							}
							$usern=mysqli_fetch_array($res);
							echo '<div class="col-12 section">';
							echo "<p>$usern</p>";
							echo "<p>".$row['Text']."</p>";
							echo '<button class="fas fa-reply"> Reply</button>';
							echo "<span> | </span>";
							echo '<button class="fas fa-check"> Good Comment</button></div>';
							
							//replies post here for each comment
							$rEntNum=$row['EntryNum'];
							$sql4= "Select * from Replies where EntryNum = $rEntNum";
							$res1=mysqli_query($conn,$sql2);
							if(!$res1){
								printf("Error: %s\n", mysqli_error($conn));
								exit();
							}
							while($row1=mysqli_fetch_array($res1)){
								$sql4="Select username from Login where ID= $row[ID]";
								$res1=mysqli_query($conn,$sql4);
								if (!$res1) {
									printf("Error: %s\n", mysqli_error($conn));
									exit();
								}
								$usern1=mysqli_fetch_array($res1);
								echo '<div class="mt-3 col-11 section ml-auto">';
								echo "<p>$usern1</p>";	
								echo '<button class="fa fa-reply"> Reply</button>';
								echo '<span> | </span>';
								echo '<button class="fas fa-check"> Good Comment</button>';	
							}
									
						}
						

						*/
						?>
						<p>User Comment</p>
						<button onclick="openForm()" class="fa fa-reply" > Reply</button>
						<span> | </span>
						<i class="fas fa-check"> Good Comment</i>
					</div>
					
					<div class="mt-3 col-11 section ml-auto">
						<p>Reply Comment (By another user/tutor/admin)</p>
						<i class="fa fa-reply"> Reply</i>
						<span> | </span>
						<i class="fas fa-check"> Good Comment</i>					
					</div>
			        <div class="mt-3 col-12 section">
						<!-- PHP Function would be good here, maybe -->
						<p>User Comment</p>
						<i class="fa fa-reply"> Reply</i>
						<span> | </span>
						<i class="fas fa-check"> Good Comment</i>
					</div>
				</div>
			</div>
	</div>

	<script src="../inc/article.js"></script>
<?php require_once('../inc/footer.inc.php'); ?>
