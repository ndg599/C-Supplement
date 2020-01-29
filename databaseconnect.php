<html>
<body style="background-color: #2b2a27; color: white; font-size: 26px;">

<?php
	require_once 'pdoconfig.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname",
		                $username, $password);
		                
		$sql = "INSERT INTO Results
		(Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, Q11, Q12, Q13, Q14, Q15)
		VALUES
		('$_POST[Q1_selection]','$_POST[Q2_selection]','$_POST[Q3_selection]',
		 '$_POST[Q4_selection]','$_POST[Q5_selection]','$_POST[Q6_selection]',
		 '$_POST[Q7_selection]','$_POST[Q8_selection]','$_POST[Q9_selection]',
		 '$_POST[Q10_selection]','$_POST[Q11_selection]','$_POST[Q12_selection]',
		 '$_POST[Q13_selection]','$_POST[Q14_selection]','$_POST[Q15_selection]')";
		
		if($conn->exec($sql))
		    echo "Entry was successful. Thank you! -Landen";
		else
		    echo "Entry was NOT successful. I messed up somewhere.";

		echo "<br><br><br>";
		
		echo "Answer to Q13: <br>&emsp;It is important to take note that literals 
		such as <span style=\"color:#26ed07\">0.2</span> have type <span style=\"color:#26ed07\">double</span>. There
		when you do a comparison with a 
		variable of type <span style=\"color:#26ed07\">float</span>, you may not get equality. The reason for this is 
		due to the fact that floating point numbers have a certain amount of 
		precision. A <span style=\"color:#26ed07\">float</span> has less precision than a 
		<span style=\"color:#26ed07\">double</span>. Just like in base 10,
		base 2 cannot exactly represent many real numbers, such as <span style=\"color:#26ed07\">0.2</span>. Therefore, 
		you are comparing <span style=\"color:#26ed07\">0.20000000298023223876953125</span> with 
		<span style=\"color:#26ed07\">0.200000000000000011102230246252</span>,
		which are <span style=\"color:#26ed07\">NOT_EQ</span>! To mitigate this problem, append an 
		<span style=\"color:#26ed07\">f</span> at the end of your number literal, such as 
		<span style=\"color:#26ed07\">0.2f</span>. The number literal is now a float and would 
		do a proper comparison. <br><br>";
		
		echo "Answer to Q14: <br>&emsp;<span style=\"color:#26ed07\">0.25</span> can be perfectly represented in base 2 
		and is well within the precision of both floats and doubles. Therefore, 
		the comparison will output <span style=\"color:#26ed07\">EQ</span>. <br><br>";
		
		echo "Answer to Q15: <br>&emsp;Interestingly, this code snippet is valid! 
		If you <span style=\"color:#26ed07\">cout &lt;&lt; d;</span> you will see on the 
		screen <span style=\"color:#26ed07\">NaN</span>, which stands for Not a 
		Number. To add to the already interesting code, <span style=\"color:#26ed07\">NaN</span>
		is <span style=\"color:#26ed07\">NOT_EQ</span> to itself! 
		Since it is, well, not a number, there can't be equality. There has been 
		distain in regards to IEEE making this decision, but that's too advanced 
		to get into.";
		
	} catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" .
		    $pe->getMessage());
	}
?>

</body>
</html>