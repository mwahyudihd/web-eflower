function checkOther(selectBox) {
	var otherValueInput = document.getElementById("otherValue");
	if (selectBox.value == "other") {
		otherValueInput.style.display = "block";
	} else {
		otherValueInput.style.display = "none";
	}
}