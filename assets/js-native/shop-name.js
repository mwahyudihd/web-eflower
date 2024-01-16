function toggleEditForm() {
	var editForm = document.getElementById("edit-form");
	var namaTokoInput = document.getElementById("id-nama-toko");
    var kotaTokoInput = document.getElementById("kota-toko");
    var alamatTokoInput = document.getElementById("alamat-toko");

	if (editForm.style.display === "none") {
		// Tampilkan formulir pengeditan
		editForm.style.display = "block";
		// Sembunyikan input nama-toko yang tidak bisa diedit
		namaTokoInput.style.display = "none";
        kotaTokoInput.style.display = "none";
        alamatTokoInput.style.display = "none";
	} else {
		// Sembunyikan formulir pengeditan
		editForm.style.display = "none";
		// Tampilkan kembali input nama-toko yang readonly
		namaTokoInput.style.display = "block";
        kotaTokoInput.style.display = "block";
        alamatTokoInput.style.display = "block";
	}
}