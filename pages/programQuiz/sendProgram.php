<?php
function findSuggestion($compileError)
{
	// Stub
	return NULL;
}

$file = fopen("input.cpp", "w") or die("Failed to open file");
$text = $_GET["text"];
fwrite($file, $text);
fclose($file);

$compileError = shell_exec('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/snap/bin g++ input.cpp 2>&1');
if ($compileError) {
	$suggestion = findSuggestion($compileError);
	echo "COMPILE ERROR:<br>$compileError<br><br>";
	echo $suggestion ? "Suggestion:<br>$suggestion" : "No suggestion found. If you're confused about this error, please discuss it with a tutor.";
}
else {
	$output = shell_exec('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/snap/bin ./a.out 2>&1');
	shell_exec("rm a.out");
	echo "Correct.<br><br>Your output:<br>$output"; 
}
?> 
