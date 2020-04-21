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

	$code[1] =  $includeLine . '#include &lt;iostream&gt;' . $endOfLine
	           .$emptyLine
			   .$bodyLine . $type . 'class' . $endSpan . ' Parent' . $endOfLine
			   .$bodyLine . '{ ' . $comment . '//Virtual keyword required in the parent class' . $endSpan . $endOfLine
			   .$bodyLine . $keyword . '    public' . $endSpan . ':' . $endOfLine
			   .$bodyLine . $type . '        virtual void ' . $endSpan . 'display() ' . $type . 'const' . $endSpan . $endOfLine
			   .$bodyLine . '        {' . $endOfLine
			   .$bodyLine . '            std::cout << ' . $literal . '"Parent Class Display' . $escape . '\n' . $endSpan . '"' . $endSpan . ';' . $endOfLine
               .$bodyLine . '        }' . $endOfLine
			   .$bodyLine . '};' . $endOfLine
			   .$emptyLine
			   .$commentLine . '/* The virtual keyword and override identifier are not required in the' . $endOfLine
			   .$commentLine . '   child classes, but it is good practice to include them where necessary */' . $endOfLine
			   .$bodyLine . $type . 'class' . $endSpan . ' Child1 : ' . $keyword . 'public ' . $endSpan . 'Parent' . $endOfLine
			   .$bodyLine . '{ ' . $endOfLine
			   .$bodyLine . $keyword . '    public' . $endSpan . ':' . $endOfLine
			   .$bodyLine . $type . '        virtual void ' . $endSpan . 'display() ' . $type . 'const override' . $endSpan . $endOfLine
			   .$bodyLine . '        {' . $endOfLine
			   .$bodyLine . '            std::cout << ' . $literal . '"Child1 Class Display' . $escape . '\n' . $endSpan . '"' . $endSpan . ';' . $endOfLine
               .$bodyLine . '        }' . $endOfLine
			   .$bodyLine . '};' . $endOfLine
	           .$emptyLine
			   .$bodyLine . $type . 'class' . $endSpan . ' Child2 : ' . $keyword . 'public ' . $endSpan . 'Parent' . $endOfLine
			   .$bodyLine . '{ ' . $endOfLine
			   .$bodyLine . $keyword . '    public' . $endSpan . ':' . $endOfLine
			   .$bodyLine . $type . '        virtual void ' . $endSpan . 'display() ' . $type . 'const override' . $endSpan . $endOfLine
			   .$bodyLine . '        {' . $endOfLine
			   .$bodyLine . '            std::cout << ' . $literal . '"Child2 Class Display' . $escape . '\n' . $endSpan . '"' . $endSpan . ';' . $endOfLine
               .$bodyLine . '        }' . $endOfLine
			   .$bodyLine . '};' . $endOfLine
	           .$emptyLine
			   .$bodyLine . $type . 'class' . $endSpan . ' Child3 : ' . $keyword . 'public ' . $endSpan . 'Parent' . $endOfLine
			   .$bodyLine . '{ ' . $endOfLine
			   .$commentLine . '    // Empty to show that the Parent class\' function is invoked' . $endOfLine
			   .$bodyLine . '};' . $endOfLine
	           .$emptyLine
			   .$bodyLine . $type . 'int ' . $endSpan . 'main()' . $endOfLine
			   .$bodyLine . '{ ' . $endOfLine
			   .$bodyLine . $nonPrim . '    Child1 ' . $endSpan . 'Obj1;' . $endOfLine
			   .$bodyLine . '    Obj1.display(); ' . $comment . '// Child1 Class Display' . $endSpan . $endOfLine
			   .$bodyLine . $nonPrim . '    Child2 ' . $endSpan . 'Obj2;' . $endOfLine
			   .$bodyLine . '    Obj2.display(); ' . $comment . '// Child2 Class Display' . $endSpan . $endOfLine
			   .$bodyLine . $nonPrim . '    Child3 ' . $endSpan . 'Obj3;' . $endOfLine
			   .$bodyLine . '    Obj3.display(); ' . $comment . '// Parent Class Display' . $endSpan . $endOfLine
			   .$bodyLine . $keyword . '    return ' . $endSpan . $literal . '0' . $endSpan . ';' . $endOfLine
			   .$bodyLine . '}' . $endOfLine;
	
	$raw[1] =   '#include <iostream>\\n\\n'
			   .'class Parent\\n'
			   .'{ //Virtual keyword required in the parent class\\n'
			   .'    public:\\n'
			   .'        virtual void display() const\\n'
			   .'        {\\n'
			   .'            std::cout << "Parent Class Display\\\n";\\n'
			   .'        }\\n'
			   .'};\\n\\n'
			   .'/* The virtual keyword and override identifier are not required in the\\n'
			   .'   child classes, but it is good practice to include them where necessary */\\n'
			   .'class Child1 : public Parent\\n'
			   .'{\\n' 
			   .'    public:\\n'
			   .'        virtual void display() const override\\n'
			   .'        {\\n'
			   .'            std::cout << "Child1 Class Display\\\n";\\n'
			   .'        }\\n'
			   .'};\\n\\n'
			   .'class Child2 : public Parent\\n'
			   .'{\\n'
			   .'    public:\\n'
			   .'        virtual void display() const override\\n'
			   .'        {\\n'
			   .'            std::cout << "Child2 Class Display\\\n";\\n'
			   .'        }\\n'
			   .'};\\n\\n'
			   .'class Child3 : public Parent\\n'
			   .'{\\n'
			   .'    // Empty to show that the Parent class' ."\'". ' function is invoked\\n'
			   .'};\\n\\n'
			   .'int main()\\n'
			   .'{\\n'
			   .'    Child1 Obj1;\\n'
			   .'    Obj1.display(); // Child1 Class Display\\n'
			   .'    Child2 Obj2;\\n'
			   .'    Obj2.display(); // Child2 Class Display\\n'
			   .'    Child3 Obj3;\\n'
			   .'    Obj3.display(); // Parent Class Display\\n'
			   .'    return 0;\\n'
	           .'}\\n';