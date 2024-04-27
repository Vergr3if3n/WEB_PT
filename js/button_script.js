var count = 0;

document.getElementById("button_main").onclick = function () {
	if (count == 0) { 
		var img = document.createElement("img");
		img.src = "../image/promocode.png"
		document.getElementById("demo").appendChild(img) 
	} else {
		document.getElemetnById("demo").innerHTML = "";
		count = 0;
	}
}