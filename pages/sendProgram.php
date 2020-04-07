 <?php
$myfile = fopen("testProgram/input.c", "w") or die("Unable to open file!");
$txt = $_GET["text"];
fwrite($myfile, $txt);
fclose($myfile);
?> 
