function myAlert(message) { 
	var alert = document.createElement("div");
	alert.id = "alert";
	var text = document.createTextNode(message);
	alert.appendChild(text);
	var button = document.createElement("input");
	button.type = "button";
	button.value= "Dismiss";
	alert.appendChild(button);
	document.body.appendChild(alert);
	button.setAttribute ("onclick","dismissAlert()") ;
	
}

function dismissAlert() {
	var parent = document.body;
	var child = document.getElementById("alert");
	parent.removeChild(child);
}

function setPage(page) {
	
    var request = new XMLHttpRequest();
    request.open("GET", "setpage.php?page="+page, false);
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.send();
//	alert('js : ' + page);
}
