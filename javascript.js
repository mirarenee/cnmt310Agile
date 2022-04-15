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
	
	function validate() {
		titleSelection = false;
		const email = document.getElementById("title");
		if (email.value.length > 0) {
			titleSelection = true;
		}

		artistSelection = false;
		const year = document.getElementById("artist");
		if (year.value.length > 0) {
			artistSelection = true;
		}
		
		if (titleSelection === false || artistSelection === false) {
			console.log("Something is not selected");
			return true;
		} else {
			console.log("Form is valid");
			return false;
		}
	};
});