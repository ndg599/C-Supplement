var subIndex = 0; // Number of subTopics
var imgIndex = [0]; // Number of images per section. First element is article, element 1+ is respective subTopic
var sections = document.getElementById("sections");

var lastCurSec = "article"; // Id of the section (article/subtopic) cursor was last at
var lastCurPos = 0; // Position in textarea cursor was last at

window.onload = init;

function init()
{
	document.addEventListener("keyup", function(event) { setLastCur(); });
	document.addEventListener("click", function(event) { setLastCur(); });

	var addSubBtn = document.getElementById("addSub");
	addSubBtn.onclick = addSub;

	var addImgBtn = document.getElementById("addImg");
	addImgBtn.onclick = addImg;
	
	var addCodeBtn = document.getElementById("addCode");
	addCodeBtn.onclick = addCode;
	
	var addVidBtn = document.getElementById("addVid");
	addVidBtn.onclick = addVid;
}

function setLastCur()
{
	var activeEl = document.activeElement;
	if (activeEl.type == "textarea") { // Only insert images in textareas
		lastCurSec = activeEl.parentElement.id;
		if (document.activeElement.selectionStart) {
			lastCurPos = document.activeElement.selectionStart;
		}
		else {
			lastCurPos = 0;
		}
		console.log(lastCurSec);
		console.log(lastCurPos);
	}
}

function addSub()
{
	subIndex++;
	imgIndex[subIndex] = 0;
	var div = document.createElement("div");
	div.id = "sub" + subIndex;

	var p = document.createElement("p");
	p.innerHTML = "<br>SubSection " + subIndex + " Title";
	div.appendChild(p);
	var input = document.createElement("input");
	input.type = "text";
	input.name = div.id + "Title";
	div.appendChild(input);

	p = document.createElement("p");
	p.innerHTML = "<br>SubSection " + subIndex + " Body";
	div.appendChild(p);
	var ta = document.createElement("textarea");
	ta.id = subIndex;
	ta.name = div.id + "Body";
	ta.cols = 70;
	ta.rows = 5;
	div.appendChild(ta);
	
	sections.appendChild(div);
}

// Might be better to store section's index in class instead of doing this
function getSectIndex(sect)
{

	if (sect.id == "article") {
		return 0;
	}
	else { // SubTopics
		return sect.id[3];
	}
}

function addImg()
{
	console.log("beniss:DDD");
	console.log(lastCurSec);
	var sect = document.getElementById(lastCurSec);
	if (sect) {
		var index = ++imgIndex[getSectIndex(sect)];
		var div = document.createElement("div");
		div.id = sect.id + "img" + index;

		var p = document.createElement("p");
		p.innerHTML = "<br>Image " + index;
		div.appendChild(p);

		var label = document.createElement("label");
		label.for = sect.id + "imgPos" + index;
		label.innerHTML = "Position:---";
		div.appendChild(label);
		var input = document.createElement("input");
		input.type = "text";
		input.name = sect.id + "imgPos" + index;
		input.size = 6;
		input.value = lastCurPos;
		div.appendChild(input);	
		div.appendChild(document.createElement("br"));

		label = document.createElement("label");
		label.for = sect.id + "imgFilename" + index;
		label.innerHTML = "Filename:---";
		div.appendChild(label);
		input = document.createElement("input");
		input.type = "text";
		input.name = sect.id + "imgFilename" + index;
		div.appendChild(input);
		div.appendChild(document.createElement("br"));
			
		label = document.createElement("label");
		label.for = sect.id + "imgFigcaption" + imgIndex;
		label.innerHTML = "Caption:----";
		div.appendChild(label);
		input = document.createElement("input");
		input.type = "text";
		input.name = sect.id + "imgFigcaption" + imgIndex;
		div.appendChild(input);	
		div.appendChild(document.createElement("br"));
		
		label = document.createElement("label");
		label.for = sect.id + "imgAlt" + imgIndex;
		label.innerHTML = "Alt:--------";
		div.appendChild(label);
		input = document.createElement("input");
		input.type = "text";
		input.name = sect.id + "imgAlt" + imgIndex;
		div.appendChild(input);	
		div.appendChild(document.createElement("br"));

		sect.appendChild(div);
	}	
}

function addCode()
{

}

function addVid()
{

}
