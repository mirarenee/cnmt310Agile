/*
window.addEventListener("load",function() {
	const form = document.getElementById("songform");
	
	form.addEventListener('submit',function(e) {
		let result = validate();
		if (result === true) {
			e.preventDefault();
			let errorDiv = document.getElementById("errorDiv");
			errorDiv.innerHTML = "Error, please check title and artist are both filled.";
		} 
		if (result === false) {
			e.preventDefault();
			let successDiv = document.getElementById("successDiv");
			successDiv.innerHTML = "Song added successfully.";
		} else {
			return true;
		}
	});
	*/
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
	};
//});