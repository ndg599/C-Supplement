<?php
	$code[1] = 					
				'<div><pre><span></span><code class="magenta">#include &lt;iostream&gt;</code></pre></div>
				 <div><pre><span></span><code class="magenta">#include &lt;string&gt;</code></pre></div>
				 <div><pre><span></span><code> </code></pre></div>
				 <div><pre><span></span><code class="green"><span class="cyan">int</span> main()</code></pre></div>
				 <div><pre><span></span><code class="green">{</code></pre></div>
				 <div><pre><span></span><code class="green"><span class="cyan">    int</span> x = <span class="magenta">100</span>;</code></pre></div>
				 <div><pre><span></span><code class="green"><span class="red">    return</span><span class="magenta"> 0</span>;</code></pre></div>
				 <div><pre><span></span><code class="green">}</code></pre></div>';
	$raw[1] = 
	            '#include <A>\n\\'
			   .'#include <B>\n\n\\'
			   .'int main()\n\\'
			   .'{\n\\'
			   .'    int x = 100;\n\\'
			   .'    return 0;\n\\'
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
				 
	$raw[2] = 
	            '#include <iostream>\n\\'
			   .'#include <string>\n\n\\'
			   .'int main()\n\\'
			   .'{\n\\'
			   .'    int x = 100;\n\\'
			   .'    return 0;\n\\'
			   .'}\n';