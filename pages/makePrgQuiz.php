<?php require_once('../inc/header.inc.php'); ?>
<div class="content">
 <div class="container">
  <div class="row">
   <div class="col-12">
	<p>Quiz Description:</p>
	<textarea id="desc" cols="70" rows="5"></textarea>
	<div id="answers">
		<p>Acceptable Output 1:</p>
		<textarea id="answer1" cols="50" rows="10"></textarea><br>
	</div>
	<button id="addAnswer">Add Acceptable Output</button><br>
	<button id="submit">Submit Quiz</button>
	<p id="result"></p>
   </div>
  </div>
 </div>
</div>
<script src="makePrgQuiz.js"></script>
<?php require_once('../inc/footer.inc.php');?>
