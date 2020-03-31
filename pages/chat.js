const evtSource = new EventSource("receiveMsg.php");

evtSource.onmessage = function(event)
{
	// Load received message in page
	var newDiv = "<div align='right'>" + event.data + "</div>";
	var msgList = document.getElementById("msgList");
	msgList.innerHTML += newDiv;
}

window.onload = init;

function init()
{
	var sendButton = document.getElementById("send");
	sendButton.onclick = sendMsg;

	/* This will click the submit button when the user hits enter, credit to kdenney from stackoverflow:
	https://stackoverflow.com/questions/155188/trigger-a-button-click-with-javascript-on-the-enter-key-in-a-text-box */
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
	request.onreadystatechange = function() { // Get full message from server
		if (this.readyState == 4 && this.status == 200) {
			// Load sent message in page
			var newDiv = "<div align='left'>" + this.responseText + "</div>";
			var msgList = document.getElementById("msgList");
			msgList.innerHTML += newDiv;
		}
	};
	request.open("GET", "sendMsg.php?text=" + msg);
	request.setRequestHeader("Content-Type", "text/plain;chatset=UTF-8");
	request.send();
}
