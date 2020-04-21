var subIndex = 0;
var imgIndex = 0;
var articleDiv = document.getElementById("article");

var lastElId = 0;
var lastElPos = 0;

window.onload = init;

function init()
{
	document.addEventListener("keyup", function(event) { setLastEl(); });
	document.addEventListener("click", function(event) { setLastEl(); });

	var addSubBtn = document.getElementById("addSub");
	addSubBtn.onclick = addSub;

	var addImgBtn = document.getElementById("addImg");
	addImgBtn.onclick = addImg;
	
	var addCodeBtn = document.getElementById("addCode");
	addCodeBtn.onclick = addCode;
	
	var addVidBtn = document.getElementById("addVid");
	addVidBtn.onclick = addVid;
}

function setLastEl()
{
	var elName = document.activeElement.name;
	if (elName && (elName == "body" || elName.includes("subBody"))) {
		lastElId = document.activeElement.id;
		if (document.activeElement.selectionStart) {
			lastElPos = document.activeElement.selectionStart;
		}
		else {
			lastElPos = 0;
		}
		console.log(lastElId);
		console.log(lastElPos);
	}
}

function addSub()
{
	subIndex++;
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
	ta.id = subIndex;
	ta.name = "subBody" + subIndex;
	ta.cols = 70;
	ta.rows = 5;
	div.appendChild(ta);
	
	articleDiv.appendChild(div);
}

function addImg()
{
	console.log("benis :DDD");
	console.log(lastElId);
	var subSect = document.getElementById(lastElId);
	if (subSect) {
		imgIndex++;
		var div = document.createElement("div");
		div.id = "img" + imgIndex;

		var p = document.createElement("p");
		p.innerHTML = "<br>Image " + imgIndex;
		div.appendChild(p);

		var label = document.createElement("label");
		label.for = "imgSub" + imgIndex;
		label.innerHTML = "SubSection:-";
		div.appendChild(label);
		var input = document.createElement("input");
		input.type = "text";
		input.name = "imgSub" + imgIndex;
		input.size = 3;
		input.value = subSect.id;
		div.appendChild(input);
		div.appendChild(document.createElement("br"));
	
		label = document.createElement("label");
		label.for = "imgPos" + imgIndex;
		label.innerHTML = "Position:---";
		div.appendChild(label);
		input = document.createElement("input");
		input.type = "text";
		input.name = "imgPos" + imgIndex;
		input.size = 6;
		input.value = lastElPos;
		div.appendChild(input);	
		div.appendChild(document.createElement("br"));

		label = document.createElement("label");
		label.for = "imgFilename" + imgIndex;
		label.innerHTML = "Filename:---";
		div.appendChild(label);
		input = document.createElement("input");
		input.type = "text";
		input.name = "imgFilename" + imgIndex;
		div.appendChild(input);
		div.appendChild(document.createElement("br"));
			
		label = document.createElement("label");
		label.for = "imgFigcaption" + imgIndex;
		label.innerHTML = "Caption:----";
		div.appendChild(label);
		input = document.createElement("input");
		input.type = "text";
		input.name = "imgFigcaption" + imgIndex;
		div.appendChild(input);	
		div.appendChild(document.createElement("br"));
		
		label = document.createElement("label");
		label.for = "imgAlt" + imgIndex;
		label.innerHTML = "Alt:--------";
		div.appendChild(label);
		input = document.createElement("input");
		input.type = "text";
		input.name = "imgAlt" + imgIndex;
		div.appendChild(input);	
		div.appendChild(document.createElement("br"));

		articleDiv.appendChild(div);
	}	
}

function addCode()
{

}

function addVid()
{

}
