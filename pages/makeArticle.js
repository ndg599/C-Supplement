function Article(title, desc, subsec, img, code, vid)
{
	this.title = title;
	this.desc = desc;
	this.subsec
}

var subIndex = 0;
var articleDiv = document.getElementById("article");

var lastElName = "";
var lastElPos = 0;

window.onload = init;

function init()
{
	document.addEventListener("keyup", function(event) { setCursorPos(); });
	document.addEventListener("click", function(event) { setCursorPos(); });

	var addSubBtn = document.getElementById("addSub");
	addSubBtn.onclick = addSub;

	var addImgBtn = document.getElementById("addImg");
	addImgBtn.onclick = addImg;
	
	var addCodeBtn = document.getElementById("addCode");
	addCodeBtn.onclick = addCode;
	
	var addVidBtn = document.getElementById("addVid");
	addVidBtn.onclick = addVid;
}

function setCursorPos()
{
	if (document.activeElement.name && document.activeElement.selectionStart) {
		lastElName = document.activeElement.name;
		lastElPos = document.activeElement.selectionStart;
		console.log(lastElName);
		console.log(lastElPos);
	}
}

function addSub()
{
	subIndex++;
	const curSubIndex = subIndex;
	var div = document.createElement("div");
	div.id = "sub" + subIndex;
	var p = document.createElement("p");
	p.innerHTML = "<br>SubSection " + subIndex + " Title";
	div.appendChild(p);
	var input = document.createElement("input");
	input.type = "text";
	input.name = "subTitle" + subIndex;
	div.appendChild(input);
	p = document.createElement("p");
	p.innerHTML = "<br>SubSection " + subIndex + " Body";
	div.appendChild(p);
	var ta = document.createElement("textarea");
	ta.name = "subBody" + subIndex;
	ta.cols = 70;
	ta.rows = 5;
	div.appendChild(ta);
	articleDiv.appendChild(div);
}

function addImg()
{
	
}

function addCode()
{

}

function addVid()
{

}
