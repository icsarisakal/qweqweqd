function uyanikkal(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//console.log(this.responseText);
			setTimeout(uyanikkal,10000);
		}
	};
	xhttp.open("GET", 'parca/uyanikkal.php', true);
	xhttp.send();
}
setTimeout(uyanikkal,10000);
