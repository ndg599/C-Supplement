window.onload = init;

function init()
{
	var sendButton = document.getElementById("send");
	sendButton.onclick = sendMsg;
}

function sendMsg() {
	var msg = document.getElementById("msgBox").value;
	//var msgJSON = JSON.stringify(msg);
	var request = new XMLHttpRequest();
	//console.log(msgJSON);
	var URL = "sendMsg.php?data=" + msg;//encodeURI(msgJSON);
	request.open("GET", URL);
	request.setRequestHeader("Content-Type", "text/plain;chatset=UTF-8");
	request.send();
}
