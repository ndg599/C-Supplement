<?php require_once('./inc/header.inc.php'); ?>

	<div class="content">
		<!-- banner is a custom class in index_CSS -->
		<div class="container-fluid rounded-0 banner">
			<span>Kent State's C++ Code Course</span>
		</div>
		
		<!-- pad_mar is a custom class in index_CSS -->
		<div class="container-fluid pad_mar">
			<!-- row class must be put before you start denoting column sizes, in other words you are section off a row of your webpage to 
				 section off in up to 12 parts. -->
			<div class="row">
				<!-- col-6 means to create a column of size 6 (or half of the available space). You can also put column sizes based upon the
					 size of the browser. You can have col-md-4, which means create a column of size 4 when the browser is >= medium width, but 
					 also have col-sm-6 in the same section to have the same section take up more space when the screen in smaller. It may make
					 more sence playing around with it if this isn't clear -->
				<div class="col-6"> 
					<!-- card is the Bootstrap class for each CS image, description, and button (as well as the chat one). h-100 means to have
						 the height of each card to be 100% of the row height. Sometimes one card may have more text than the adjacent making
						 one longer than the other looking weird -->
					<div class="card h-100">
						<!-- card-img-top is a custom class for the image on the top of the card to resize as the browser resizes. Any class 
							 beginning with card- is from Bootstrap. card-body is where the description and link button goes. card-title styles 
							 the title and card-text styles the text of the card. This repeats 4 times. -->
						<img src="./img/CSI.png" class="card-img-top" alt="CS_I Word Art">
						<div class="card-body">
							<h5 class="card-title">Computer Science I</h5>
							<p class="card-text">Description Placeholder</p>
							<a href="#" class="btn btn-primary">CS I Index</a>
						</div>
					</div>
				</div>
				<div class="col-6"> 
					<div class="card h-100">
						<img src="./img/CSII.png" class="card-img-top" alt="CS_II Word Art">
						<div class="card-body">
							<h5 class="card-title">Computer Science II</h5>
							<p class="card-text">Description Placeholder</p>
							<a href="#" class="btn btn-primary">CS II Index</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid pad_mar">
			<div class="row justify-content-center">
				<div class="col-6"> 
					<div class="card h-100">
						<img src="./img/CSIII.png" class="card-img-top" alt="CS_III Word Art">
						<div class="card-body">
							<h5 class="card-title">Computer Science III</h5>
							<p class="card-text">Description Placeholder</p>
							<a href="#" class="btn btn-primary">CS III Index</a>
						</div>
					</div>
				</div>
				<div class="col-6"> 
					<div class="card h-100">
						<img src="./img/IM.png" class="card-img-top" alt="Chat Word Art">
						<div class="card-body">
							<h5 class="card-title">Instant Message</h5>
							<p class="card-text">Description Placeholder</p>
							<a href="#" class="btn btn-primary">Instant Messaging Client</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php require_once('./inc/footer.inc.php'); ?>