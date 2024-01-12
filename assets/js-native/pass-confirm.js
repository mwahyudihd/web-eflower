var passwordInput = document.getElementById("passwordReg");
var confirmInput = document.getElementById("passConfrm");
var cekPass2 = document.getElementById("cek-pass2");
var txtTitle2 = document.getElementById("title-cek2");

confirmInput.addEventListener("input", function () {
	if (confirmInput.value === passwordInput.value) {
		confirmInput.classList.remove("confirm-not-matching");
		cekPass2.classList.add("hide-cek");
		txtTitle2.classList.add("hide-cek");
		cekPass2.classList.remove("show-cek");
		txtTitle2.classList.remove("show-cek");
		confirmInput.type = "password";
	} else {
		confirmInput.classList.add("confirm-not-matching");
		cekPass2.classList.add("show-cek");
		txtTitle2.classList.add("show-cek");
		cekPass2.classList.remove("hide-cek");
		txtTitle2.classList.remove("hide-cek");
		if (confirmInput.type == "password") {
			cekPass2.checked = false;
		}
	}
});
