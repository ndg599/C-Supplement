/*
function ProgQuiz(desc, ans)
{
	this.desc = desc;
	this.ans = ans;
}
*/
var outputIndex = 1;
var outputDiv = document.getElementById("output");

window.onload = init;

function init()
{
	var addOutputDiv = document.getElementById("addOutput");
	addOutputDiv.onclick = addOutput;
	//var sendButton = document.getElementById("submit");
	//sendButton.onclick = sendQuiz;
}

function addOutput()
{
	outputIndex++;
	var p = document.createElement("p");
	p.innerHTML = "Acceptable Output " + outputIndex;
	var ta = document.createElement("textarea");
	ta.name = "output" + outputIndex;
	ta.cols = 50;
	ta.rows = 10;
	outputDiv.appendChild(p);
	outputDiv.appendChild(ta);
}
/*
function sendQuiz()
{
	var outputs = new Array();
	for (var i = 1; i <= outputIndex; i++) {
		outputs[i-1] = document.getElementById("output" + i).value;
	}

	var desc = document.getElementById("desc").value;
	var newQuiz = new ProgQuiz(desc, outputs);
	console.log(newQuiz);

	// Send AJAX request to compile program, print result
	var text = encodeURIComponent(document.getElementById("textBox").value);
	var request = new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			result.innerHTML = this.responseText;
		}
	};
	request.open("GET", "sendPrgQuiz.php?desc=" + desc);
	request.setRequestHeader("Content-Type", "text/plain;chatset=UTF-8");
	request.send();

}
*/
