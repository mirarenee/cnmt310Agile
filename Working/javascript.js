function validate() {	
	var title = document.getElementById("title");
	if (title.value == ""){
		alert("Please enter a title");
		return false;
	}
	var artist = document.getElementById("artist");
	if (artist.value == "") {
		alert("Please enter an artist");
		return false;
	}
	var albmum = document.getElementById("album");
	var artist = document.getElementById("category");
	
};