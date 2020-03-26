
const evtSource = new EventSource("receiveMsg.php");

evtSource.onmessage = function(event)
{
	var newEl = document.createElement("p");
	var msgList = document.getElementById("rcvdMsgList");
	newEl.innerHTML = event.data;
	msgList.appendChild(newEl);
}

evtSource.onerror = function(err)
{
	console.error("EventSource failed:", err);
}

window.onload = init;

function init()
{
	var sendButton = document.getElementById("send");
	sendButton.onclick = sendMsg;

	document.getElementById("msgBox")
		.addEventListener("keyup", function(event) {
		event.preventDefault();
		if (event.keyCode === 13) {
			document.getElementById("send").click();
		}
	});
}

function sendMsg() {
	// Send message to server via AJAX request
	var msg = document.getElementById("msgBox").value; // Get message
	document.getElementById("msgBox").value = ""; // Clear message box
	var request = new XMLHttpRequest();
	request.open("GET", "sendMsg.php?text=" + msg);
	request.setRequestHeader("Content-Type", "text/plain;chatset=UTF-8");
	request.send();

	// Load sent message in document
	var newEl = document.createElement("p");
	var msgList = document.getElementById("sentMsgList");
	newEl.innerHTML = msg;
	msgList.appendChild(newEl);
}

function update()
{
	var request = new XMLHttpRequest();
	var requestData = window.location.search.substr(1);
	request.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var newEl = document.createElement("p");
			var msgList = document.getElementById("rcvdMsgList");
			newEl.innerHTML = this.responseText;
			msgList.appendChild(newEl);
		}
	};
	request.open("GET", "receiveMsg.php?" + requestData);
	request.send();
}
