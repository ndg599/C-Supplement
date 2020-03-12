<?php require_once('../inc/header.inc.php'); ?>
	
	<div class="content">
		<article>
			<div class="container-fluid mt-3">
				<h1 class="text-white intro">Article Title</h1>
				<hr>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 section">
						<p>Overview of topic if there are subtopics</p>
						<br>
						<p>If there are no subtopics, this is the where the lesson goes. Colors and design may change
						 as this is a prototype<p>
						<br>
						<p>
						<figure>
							<img src="../img/insert.png" alt="for loop flow" class="mb-5 ml-2">
							<figcaption>Example figure caption</figcaption>
						</figure>
						Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text 
						Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text 
						Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text 
						</p>
					</div>
				</div>
			</div>
			
			<div class="container-fluid mt-5">
				<h3 class="text-white intro">Subtopic</h3>
				<hr>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 section mb-5">
						<p>Subtopic, a focus on one aspect of the overall article</p>
						<br>
						<p>
						<figure>
							<img src="../img/forLoop3.png" alt="for loop flow" class="mb-5 ml-2">
							<figcaption>Example visual for a FOR LOOP</figcaption>
						</figure>
						An example of a subtopic would be the FOR LOOP topic. Another subtopic would be the DO WHILE LOOP 
						as well as the WHILE loop, There would be three subtopics for the Looping article.
						</p>
						<p>Here is example code:</p>
						<div class="row">
							<div class="col-6 Code_Ex ml-1 mb-1">
								<!-- Empty span is where the line number is displayed - check CSS file -->
								<pre><span></span><code class="magenta">#include &lt;iostream&gt;</code></pre>
								<pre><span></span><code class="magenta">#include &lt;string&gt;</code></pre>
								<pre><span></span><code></code></pre>
								<pre><span></span><code class="green"><span class="cyan">int</span> main()</code></pre>
								<pre><span></span><code class="green">{</code></span></pre>
								<pre><span></span><code class="green"><span class="cyan">    int</span> x = <span class="magenta">100</span>;</code></pre>
								<pre><span></span><code class="green"><span class="red">    return</span><span class="magenta"> 0</span>;</code></pre>
								<pre><span></span><code class="green">}</code></span></pre>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="container-fluid mt-5">
				<h3 class="text-white intro">Video</h3>
				<hr>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 text-white">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/Rub-JsjMhWY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
					</div>
				</div>
			</div>
			
			<div class="container-fluid mt-5">
				<h3 class="text-white intro">Quiz</h3>
				<hr>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 text-white">
						<form name="FORM" action="../databaseconnect.php" method="post"> 
							<label class="mt-4 mb-4">1) How often do you (will you) use a C++ supplement for your Computer Science I - III courses in general
									(i.e. websites, such as stackoverflow.com and cplusplus.com)?</label>
								<br><br>
								<label class="qBox">(Very) often
									<input type="radio" name="Q1_selection" value="1" required>
									<span class="checkmark"></span>
								</label>
								<label class="qBox">At times
									<input type="radio" name="Q1_selection" value="2">
									<span class="checkmark"></span>
								</label>					
								<label class="qBox">Never
									<input type="radio" name="Q1_selection" value="3">
									<span class="checkmark"></span>
								</label>
								
							<label class="mt-4 mb-4">2) Would you like a C++ supplement tailored to the class itself versus having to sift through articles that
									may contain information not yet understood (e.g. while in CSI, you look up arrays as function 
									arguments and come across the statement "an array decays to a pointer when passed to a function")?</label>
								<br><br>
								<label class="qBox">Yes
									<input type="radio" name="Q2_selection" value="1" required>
									<span class="checkmark"></span>
								</label>
								<label class="qBox">No
									<input type="radio" name="Q2_selection" value="2">
									<span class="checkmark"></span>
								</label>		

							<label class="mt-4 mb-4">3) Would you be interested in learning about C++ topics not discussed in class?</label>
								<br><br>
								<label class="qBox">Yes
									<input type="radio" name="Q3_selection" value="1" required>
									<span class="checkmark"></span>
								</label>
								<label class="qBox">No
									<input type="radio" name="Q3_selection" value="2">
									<span class="checkmark"></span>
								</label>				
							
							<label class="mt-4">15) What is the output of the following code snippet (assume using std::cout;)?</label>
							<div class="code mb-4">
										&emsp;&emsp;double d = 0.0/0.0;
									<br>
										&emsp;&emsp;if (d == d)
									<br>
										&emsp;&emsp;&emsp;cout &lt;&lt; <q>EQ</q>;
									<br>
										&emsp;&emsp;else
									<br>
										&emsp;&emsp;&emsp;cout &lt;&lt; <q>NOT_EQ</q>;
							</div>
								<label class="qBox">EQ
									<input type="radio" name="Q15_selection" value="1" required>
									<span class="checkmark"></span>
								</label>
								<label class="qBox">NOT_EQ
									<input type="radio" name="Q15_selection" value="2">
									<span class="checkmark"></span>
								</label>
								<label class="qBox">Compilation error: Floating Point Error (SIGFPE)
									<input type="radio" name="Q15_selection" value="2">
									<span class="checkmark"></span>
								</label>
							<br><br>
						</form>
					</div>
				</div>
			</div>
			
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
						<p>User Comment</p>
						<i class="fa fa-reply"> Reply</i>
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
		</article>
	</div>

<?php require_once('../inc/footer.inc.php'); ?>
