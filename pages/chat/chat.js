window.onload = init;

function init()
{
	var sendButton = document.getElementById("send");
	sendButton.onclick = sendMsg;
}

function Msg(msg) {
	var d = new Date();
	this.date = d.toDateString();
	this.time = d.toTimeString();
	this.text = msg;
}

function sendMsg() {
	var msgBox = document.getElementById("msgBox").value;
	var msg = new Msg(msgBox);
	var msgJSON = JSON.stringify(msg);
	var request = new XMLHttpRequest();
	console.log(msgJSON);
	var URL = "sendMsg.php?data=" + encodeURI(msgJSON);
	request.open("GET", URL);
	request.setRequestHeader("Content-Type", "text/plain;chatset=UTF-8");
	request.send();
}
