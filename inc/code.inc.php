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
	
	/* Code display variables */
	$startOfLine = '<div><pre><span></span>';
	$endOfLine   = '</code></pre></div>';
	$emptyLine   = $startOfLine . '<code> ' . $endOfLine;
	$includeLine = '<code class="magenta">';
	$bodyLine    = '<code class="green">';
	$commentLine = '<code class="text-white">';
	$keyword     = '<span class="red">';
	$type        = '<span class="cyan">';
	$comment     = '<span class="text-white">';
	$escape      = '<span class="yellow">';
	$literal     = '<span class="magenta">';
	$classType   = '<span class="turquoise">';
	$endSpan     = '</span>';
	
	$raw1[2] = 
	            '#include <iostream>\n'
			   .'#include <string>\n\n'
			   .'int main()\n'
			   .'{\n'
			   .'    int x = 100;\n'
			   .'    return 0;\n'
			   .'}\n';
			   
	$code[2] = 
				'<div><pre><span></span><code class="magenta">#include &lt;iostream&gt;</code></pre></div>
				 <div><pre><span></span><code class="magenta">#include &lt;string&gt;</code></pre></div>
				 <div><pre><span></span><code> </code></pre></div>
				 <div><pre><span></span><code class="green"><span class="cyan">int</span> main()</code></pre></div>
				 <div><pre><span></span><code class="green">{</code></pre></div>
				 <div><pre><span></span><code class="green"><span class="cyan">    int</span> x = <span class="magenta">100</span>;</code></pre></div>
				 <div><pre><span></span><code class="green"><span class="red">    return</span><span class="magenta"> 0</span>;</code></pre></div>
				 <div><pre><span></span><code class="green">}</code></pre></div>';
				 	
	$code[1] =  $startOfLine . $includeLine . '#include &lt;iostream&gt;' . $endOfLine
	           .$emptyLine
			   .$startOfLine . $bodyLine . $type . 'class' . $endSpan . ' Parent' . $endOfLine
			   .$startOfLine . $bodyLine . '{ ' . $comment . '//Virtual keyword required in the parent class' . $endSpan . $endOfLine
			   .$startOfLine . $bodyLine . $keyword . '    public' . $endSpan . ':' . $endOfLine
			   .$startOfLine . $bodyLine . $type . '        virtual void ' . $endSpan . 'display() ' . $type . 'const' . $endSpan . $endOfLine
			   .$startOfLine . $bodyLine . '        {' . $endOfLine
			   .$startOfLine . $bodyLine . '            std::cout << ' . $literal . '"Parent Class Display' . $escape . '\n' . $endSpan . '"' . $endSpan . ';' . $endOfLine
               .$startOfLine . $bodyLine . '        }' . $endOfLine
			   .$startOfLine . $bodyLine . '};' . $endOfLine
			   .$emptyLine
			   .$startOfLine . $commentLine . '/* The virtual keyword and override identifier are not required in the' . $endOfLine
			   .$startOfLine . $commentLine . '   child classes, but it is good practice to include them where necessary */' . $endOfLine
			   .$startOfLine . $bodyLine . $type . 'class' . $endSpan . ' Child1 : ' . $keyword . 'public ' . $endSpan . 'Parent' . $endOfLine
			   .$startOfLine . $bodyLine . '{ ' . $endOfLine
			   .$startOfLine . $bodyLine . $keyword . '    public' . $endSpan . ':' . $endOfLine
			   .$startOfLine . $bodyLine . $type . '        virtual void ' . $endSpan . 'display() ' . $type . 'const override' . $endSpan . $endOfLine
			   .$startOfLine . $bodyLine . '        {' . $endOfLine
			   .$startOfLine . $bodyLine . '            std::cout << ' . $literal . '"Child1 Class Display' . $escape . '\n' . $endSpan . '"' . $endSpan . ';' . $endOfLine
               .$startOfLine . $bodyLine . '        }' . $endOfLine
			   .$startOfLine . $bodyLine . '};' . $endOfLine
	           .$emptyLine
			   .$startOfLine . $bodyLine . $type . 'class' . $endSpan . ' Child2 : ' . $keyword . 'public ' . $endSpan . 'Parent' . $endOfLine
			   .$startOfLine . $bodyLine . '{ ' . $endOfLine
			   .$startOfLine . $bodyLine . $keyword . '    public' . $endSpan . ':' . $endOfLine
			   .$startOfLine . $bodyLine . $type . '        virtual void ' . $endSpan . 'display() ' . $type . 'const override' . $endSpan . $endOfLine
			   .$startOfLine . $bodyLine . '        {' . $endOfLine
			   .$startOfLine . $bodyLine . '            std::cout << ' . $literal . '"Child2 Class Display' . $escape . '\n' . $endSpan . '"' . $endSpan . ';' . $endOfLine
               .$startOfLine . $bodyLine . '        }' . $endOfLine
			   .$startOfLine . $bodyLine . '};' . $endOfLine
	           .$emptyLine
			   .$startOfLine . $bodyLine . $type . 'class' . $endSpan . ' Child3 : ' . $keyword . 'public ' . $endSpan . 'Parent' . $endOfLine
			   .$startOfLine . $bodyLine . '{ ' . $endOfLine
			   .$startOfLine . $commentLine . '    // Empty to show that the Parent class\' function is invoked' . $endOfLine
			   .$startOfLine . $bodyLine . '};' . $endOfLine
	           .$emptyLine
			   .$startOfLine . $bodyLine . $type . 'int ' . $endSpan . 'main()' . $endOfLine
			   .$startOfLine . $bodyLine . '{ ' . $endOfLine
			   .$startOfLine . $bodyLine . $classType . '    Child1 ' . $endSpan . 'Obj1;' . $endOfLine
			   .$startOfLine . $bodyLine . '    Obj1.display(); ' . $comment . '// Child1 Class Display' . $endSpan . $endOfLine
			   .$startOfLine . $bodyLine . $classType . '    Child2 ' . $endSpan . 'Obj2;' . $endOfLine
			   .$startOfLine . $bodyLine . '    Obj2.display(); ' . $comment . '// Child2 Class Display' . $endSpan . $endOfLine
			   .$startOfLine . $bodyLine . $classType . '    Child3 ' . $endSpan . 'Obj3;' . $endOfLine
			   .$startOfLine . $bodyLine . '    Obj3.display(); ' . $comment . '// Parent Class Display' . $endSpan . $endOfLine
			   .$startOfLine . $bodyLine . $keyword . '    return ' . $endSpan . $literal . '0' . $endSpan . ';' . $endOfLine
			   .$startOfLine . $bodyLine . '}' . $endOfLine;
	
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
			   .'    // Empty to show that the Parent class.' ."\'". ' function is invoked\\n'
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