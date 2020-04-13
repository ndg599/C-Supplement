/*
function ProgQuiz(desc, ans)
{
	this.desc = desc;
	this.ans = ans;
}
*/
var answerIndex = 1;
var answerDiv = document.getElementById("answers");

window.onload = init;

function init()
{
	var addOutput = document.getElementById("addAnswer");
	addOutput.onclick = addAnswer;
	//var sendButton = document.getElementById("submit");
	//sendButton.onclick = sendQuiz;
}

function addAnswer()
{
	answerIndex++;
	var p = document.createElement("p");
	p.innerHTML = "Acceptable Output " + answerIndex;
	var ta = document.createElement("textarea");
	ta.name = "answer" + answerIndex;
	ta.cols = 50;
	ta.rows = 10;
	answerDiv.appendChild(p);
	answerDiv.appendChild(ta);
}
/*
function sendQuiz()
{
	var answers = new Array();
	for (var i = 1; i <= answerIndex; i++) {
		answers[i-1] = document.getElementById("answer" + i).value;
	}

	var desc = document.getElementById("desc").value;
	var newQuiz = new ProgQuiz(desc, answers);
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
