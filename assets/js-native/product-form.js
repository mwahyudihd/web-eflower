function checkOther(selectBox) {
	var otherValueInput = document.getElementById("otherValue");
	if (selectBox.value == "other") {
		otherValueInput.style.display = "block";
	} else {
		otherValueInput.style.display = "none";
	}
}

function toggleEditForm() {
	var editForm = document.getElementById("edit-form");
	var namaTokoInput = document.getElementById("id-nama-toko");

	if (editForm.style.display === "none") {
		// Tampilkan formulir pengeditan
		editForm.style.display = "block";
		// Sembunyikan input nama-toko yang tidak bisa diedit
		namaTokoInput.style.display = "none";
	} else {
		// Sembunyikan formulir pengeditan
		editForm.style.display = "none";
		// Tampilkan kembali input nama-toko yang readonly
		namaTokoInput.style.display = "block";
	}
}