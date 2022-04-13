// Javascript Document

//Song Title, Artist, Album, Category.
//Builds a string that says what to input based off of what text boxes are empty
function validateInput(){
	var alertString = "";
	var aler = false;
	if (document.getElementById("title").value == "")
	{
		alertString = "Please enter a title\n";
		aler = true;
	}
	if (document.getElementById("artist").value == "")
	{
		alertString += "Please enter an artist\n";
		aler = true;
	}
	
	if (aler)
	{
		alert(alertString);
		return false;
	}
	
	return true;
}
