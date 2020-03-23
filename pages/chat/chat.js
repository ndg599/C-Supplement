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

// Send receiverid (already in url) and text via AJAX
function sendMsg() {
	var msg = document.getElementById("msgBox").value; // Get message
	document.getElementById("msgBox").value = ""; // Clear message box
	var request = new XMLHttpRequest();
	var sendData = window.location.search.substr(1) + "&text=" + msg;
	request.open("GET", "sendMsg.php?" + sendData);
	request.setRequestHeader("Content-Type", "text/plain;chatset=UTF-8");
	request.send();
}
