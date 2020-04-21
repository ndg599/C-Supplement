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

