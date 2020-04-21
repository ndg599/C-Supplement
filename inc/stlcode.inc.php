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

	$code[2] =  $includeLine . '#include &lt;iostream&gt;										' . $endOfLine
			   .$bodyLine . '#include &lt;map&gt;												' . $endOfLine
			   .$bodyLine . '#include &lt;iterator&gt;											' . $endOfLine
			   .$emptyLine
			   .$bodyLine . $type . 'int ' . $endSpan . 'main(){								' . $endOfLine
			   .$bodyLine . '	map <int, int> myMap;											' . $endOfLine
			   .$bodyLine . '	// inserting elements into map									' . $endOfLine
			   .$bodyLine . '	myMap.insert (pair<int, int>(1, 5);								' . $endOfLine
			   .$bodyLine . '	myMap.insert (pair<int, int>(2, 4);								' . $endOfLine
			   .$bodyLine . '	myMap.insert (pair<int, int>(3, 3);								' . $endOfLine
			   .$bodyLine . '	myMap.insert (pair<int, int>(4, 2);								' . $endOfLine
			   .$bodyLine . '	myMap.insert (pair<int, int>(5, 1);								' . $endOfLine
			   .$emptyLine
			   .$bodyLine . '	// printing myMap: 5, 4, 3, 2, 1								' . $endOfLine
			   .$bodyLine . '	myMap<int, int>::iterator itr;									' . $endOfLine
			   .$bodyLine . '	std::cout << "My map contains: ";								' . $endOfLine
			   .$emptyLine
			   .$bodyLine . '   for(itr = myMap.begin(); itr != myMap.end(); ++itr){			' . $endOfLine
			   .$bodyLine . '		std::cout << \t << itr->first << \t itr->second <<		    ' . $endOfLine
			   .$bodyLine . '	}															    ' . $endOfLine
			   .$bodyLine . '	std::cout << endl;												' . $endOfLine 
			   .$bodyLine . $keyword . '    return ' . $endSpan . $literal . '0' . $endSpan . ';' . $endOfLine
			   .$bodyLine . '}																	' . $endOfLine;
	
	$raw[2] =   '#include <iostream>											 \\n'
			   .'#include <map>													 \\n'
			   .'#include <iterator>										  \\n\\n'
			   .'int main(){													 \\n'
			   .'    map <int, int> myMap;									  \\n\\n'
			   .'	 // inserting elements into map								 \\n'
			   .'    myMap.insert (pair<int, int>(1, 5);						 \\n'
			   .'    myMap.insert (pair<int, int>(2, 4);						 \\n'
			   .'    myMap.insert (pair<int, int>(3, 3);						 \\n'
			   .'    myMap.insert (pair<int, int>(4, 2);						 \\n'
			   .'    myMap.insert (pair<int, int>(5, 1);					  \\n\\n'
			   .'	 // printing myMap: 5, 4, 3, 2, 1							 \\n'
			   .'	 myMap<int, int>::iterator itr;								 \\n'
			   .'    std::cout << "My map contains: "							 \\n'
			   .' 	 for(itr = myMap.begin(); itr != myMap.end(); ++itr){		 \\n'
			   .'	 	std::cout << \t << itr->first << \t itr->second << \n;   \\n'
			   .'	 }'
			   .'	 std::cout << endl;\\n'
			   .'    return 0;\\n'
	           .'}\\n';