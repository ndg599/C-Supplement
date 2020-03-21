function Msg(msg) {
	var d = new Date();
	this.date = d.toDateString();
	this.time = d.toTimeString();
	this.text = msg;
}

var msgList = new Array();

window.onload = init;

function init()
{
	var sendButton = document.getElementById("send");
	sendButton.onclick = getFormData;
	getMsgHist();
	//while (1) {
	//	getMsgHist();
	//	await new Promise(r => setTimeout(r, 1000));
	//}
}

function getMsgHist()
{
	var request = new XMLHttpRequest();
	request.open("GET", "msgHist.json");
	request.onreadystatechange = function() {
		//var div = document.getElementById("msgList");
		if (this.readyState == this.DONE && this.status == 200) {
			if (this.responseText) {
				//div.innerHTML = this.responseText;
				parseMsgHist(this.responseText);
				addMsgListToPage();
			}
		}
	};
	request.send();
}

function parseMsgHist(msgHistJSON)
{
	var msgHist = JSON.parse(msgHistJSON);
	for (var i = 0; i < msgHist.length; i++) {
		var msg = msgHist[i];
		msgList.push(msg);
	}
	console.log("Message array: ");
	console.log(msgList);
}

function addMsgListToPage()
{
	var div = document.getElementById("msgList");
	for (var i = 0; i < msgList.length; i++) {
		var msg = msgList[i];
		div.innerHTML += msg.date + " " + msg.time + "<br>" + msg.text + "<br>";
	}
}

function getFormData() {
	var msgBox = document.getElementById("msgBox").value;
	var msg = new Msg(msgBox);
	console.log(msg);
	msgList.push(msg);
	addMsgToPage(msg);
	saveMsg(msg);
}

function addMsgToPage(msg) {
	var div = document.getElementById("msgList");
	div.innerHTML += msg.date + " " + msg.time + "<br>" + msg.text + "<br>";
	document.forms[0].reset();
}

function saveMsg(msg) {
	var msgJSON = JSON.stringify(msg);
	var request = new XMLHttpRequest();
	console.log(msgJSON);
	var URL = "sendMsg.php?data=" + encodeURI(msgJSON);
	request.open("GET", URL);
	request.setRequestHeader("Content-Type", "text/plain;chatset=UTF-8");
	request.send();
}
