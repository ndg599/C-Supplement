<?php
	/* Syntax for $raw[]:
		+--------------------+-----------------+
		|Wrap all strings:   |       ' '       |
		|--------------------------------------|
		|newlines:           |       \\n       |
		|--------------------------------------|
		|display newline:    |      \\\n       |
		|--------------------------------------|
		|display apostrophe  |     . "\'" .    |
		|--------------------------------------|
		|display quote       |        "        |
		+--------------------+-----------------+
	*/
	
	/* Code display variables $_<VAR> are solely a portion of an overall styling variable */
	$_span        = '<span class="';
	$_code        = '<code class="';
	$_startOfLine = '<div><pre><span></span>';
	$endOfLine    = '</code></pre></div>'; //Use in step 3, but defined here due to use in $emptyLine
	/* 1) Choose an overall line style first */
	$emptyLine    = $_startOfLine . '<code> ' . $endOfLine;
	$includeLine  = $_startOfLine . $_code . 'magenta">';
	$commentLine  = $_startOfLine . $_code . 'text-white">';
	$bodyLine     = $_startOfLine . $_code . 'green">';
	/* 2-repeat) Choose color of the next code, write the code, and end with $endSpan always */
	$keyword   = $_span . 'red">';
	$type      = $_span . 'cyan">';
	$comment   = $_span . 'text-white">';
	$escape    = $_span . 'yellow">';
	$literal   = $_span . 'magenta">';
	$nonPrim   = $_span . 'turquoise">';
	$endSpan   = '</span>';
	/* 3) End with $endOfLine always */

	$code[2] =  $includeLine . '#include &lt;iostream&gt;										   ' . $endOfLine
			   .$emptyLine
			   .$bodyLine 	 . $type . 'int ' . $endSpan . 'main(){								   ' . $endOfLine
			   .$bodyLine 	 . '	int SIZE = 5;												   ' . $endOfLine
			   .$bodyLine 	 . '	int myArray[SIZE] = {1, 2, 3, 4, 5};						   ' . $endOfLine
			   .$emptyLine
			   .$bodyLine 	 . '	// printing myArray: 1, 2, 3, 4, 5							   ' . $endOfLine
			   .$bodyLine 	 . '	std::cout << "My array contains: ";							   ' . $endOfLine
			   .$emptyLine
			   .$bodyLine 	 . '   for(int i = 0; itr != SIZE - 1; ++i){ 						   ' . $endOfLine
			   .$bodyLine 	 . '		std::cout <<  i << ", ";  								   ' . $endOfLine
			   .$bodyLine 	 . '	}															   ' . $endOfLine
			   .$bodyLine 	 . '	std::cout << std::endl;										   ' . $endOfLine 
			   .$bodyLine 	 . $keyword . '    return ' . $endSpan . $literal . '0' . $endSpan . ';' . $endOfLine
			   .$bodyLine 	 . '}																   ' . $endOfLine;
	
	$raw[2] =   '#include <iostream>				     \\n\\n'
			   .'int main(){								\\n'
			   .'    int SIZE = 5;					     \\n\\n'
			   .'    int myArray[SIZE] = {1, 2, 3, 4, 5};   \\n'
			   .'	 // Printing myArray: 1, 2, 3, 4, 5     \\n'
			   .'    std::cout << "My array contains: "; 	\\n'
			   .'    for (int i = 0; i < SIZE - 1; ++i){ 	\\n'
			   .'    	std::cout << i << ", ";			 	\\n'
			   .'    }									 	\\n'
			   .'    std::cout << std::endl;			 	\\n'
			   .'    return 0;						     	\\n'
	           .'}										 	\\n';