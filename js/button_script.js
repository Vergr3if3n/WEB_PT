var count = 0;

document.getElementById("button1").onclick = function () {
	if (count == 0) { 
		var img = document.createElement("img");
		img.src = "/home/nil/pt/WEB_PT/image/promocode.png"
		document.getElementById("demo").appendChild(img) 
	} else {
		document.getElemetnById("demo").innerHTML = "";
		count = 0;
	}
}