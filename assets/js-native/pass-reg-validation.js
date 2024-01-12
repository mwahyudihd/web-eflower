var passwordInput = document.getElementById("passwordReg");
var cekPass = document.getElementById("cek-pass");
var txtTitle = document.getElementById("title-cek");
var errorMessage = document.getElementById("password-error-message");

passwordInput.addEventListener("input", function () {
	if (passwordInput.value.length >= 8) {
		passwordInput.classList.remove("invalid");
		cekPass.classList.add("show-cek");
		txtTitle.classList.add("show-cek");
		cekPass.classList.remove("hide-cek");
		txtTitle.classList.remove("hide-cek");
		errorMessage.textContent = "";
	} else {
		passwordInput.classList.add("invalid");
		errorMessage.textContent = "Password must be at least 8 characters";
		cekPass.classList.add("hide-cek");
		txtTitle.classList.add("hide-cek");
		cekPass.classList.remove("show-cek");
		txtTitle.classList.remove("show-cek");
		passwordInput.type = "password";
		cekPass.checked = false;
	}
});
