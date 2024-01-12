const inputCol = document.getElementById("passwordReg");
const inputCol2 = document.getElementById("passConfrm");
const inputPassLogin = document.getElementById("pass-login");

const titleCheckBox = document.getElementById("title-cek-log");

const chekBox = document.getElementById("cek-pass");
const chekBox2 = document.getElementById("cek-pass2");
const chekBoxLog = document.getElementById("cek-pass-log");
chekBox.addEventListener("click", function () {
	if (chekBox.checked === true) {
		inputCol.type = "text";
	} else {
		inputCol.type = "password";
	}
});

chekBox2.addEventListener("click", function () {
	if (chekBox2.checked === true) {
		inputCol2.type = "text";
	} else {
		inputCol2.type = "password";
	}
});

chekBoxLog.addEventListener("click", function () {
	if (chekBoxLog.checked === true) {
		inputPassLogin.type = "text";
	} else {
		inputPassLogin.type = "password";
	}
});

inputPassLogin.addEventListener("input", function () {
	if (inputPassLogin.value.length >= 1) {
		chekBoxLog.classList.add("show-cek");
		titleCheckBox.classList.add("show-cek");
		chekBoxLog.classList.remove("hide-cek");
		titleCheckBox.classList.remove("hide-cek");
	} else {
		chekBoxLog.classList.add("hide-cek");
		titleCheckBox.classList.add("hide-cek");
		chekBoxLog.classList.remove("show-cek");
		titleCheckBox.classList.remove("show-cek");
		inputPassLogin.type = "password";
		chekBoxLog.checked = false;
	}
});
