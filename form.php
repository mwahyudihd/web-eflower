<?php
include 'data-connect.php';

session_start();
if (isset($_SESSION["user_mail"]) != NULL) {
	if ($_SESSION["role"] != 'admin') {
		header("location: ../index.php");
	}
	header('location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />

	<title>Login-Eflower</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/" />

	<!-- Bootstrap core CSS -->
	<link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>

	<!-- CSS Native Link -->
	<link rel="stylesheet" href="assets/css-native/form-login-style.css" />
	<link rel="stylesheet" href="assets/css-native/form-style.css" />
</head>

<body>
	<div class="wrapper container">
		<h4 id="title-1" class="text-center border border-2 p-3 border-danger-subtle rounded-5 text-white">
			Get Your Session for Your Plant!
		</h4>
		<div class="title-text">
			<div class="title login">Sign In</div>
			<div class="title signup">Sign Up</div>
		</div>
		<div class="form-container">
			<div class="slide-controls">
				<input type="radio" name="slide" id="login" checked />
				<input type="radio" name="slide" id="signup" />
				<label for="login" class="slide login">Login</label>
				<label for="signup" class="slide signup">Register</label>
				<div class="slider-tab"></div>
			</div>

			<div class="form-inner">
				<?php if (isset($_GET["pesan"])): ?>
					<script>
						alert('Email atau Password yang anda inputkan SALAH!');
					</script>
				<?php endif ?>
				<?php if (isset($_GET["new-login"])): ?>
					<script>
						alert('SELAMAT! Akun anda telah berhasil dibuat.');
					</script>
				<?php endif ?>
				<form action="login.php" class="login" method="post">
					<!-- input login -->
					<div class="md-2 form-floating">
						<input class="form-control" type="email" name="user_mail" placeholder="Masukan Email "
							required />
						<label for="user" class="text-dark">Email</label>
					</div>
					<div class="mt-3 form-floating pass-show">
						<input class="form-control" type="password" name="password" placeholder="password"
							id="pass-login" maxlength="32" required />
						<input type="checkbox" id="cek-pass-log" class="hide-cek mt-1" />
						<p id="title-cek-log" class="hide-cek">Show Password</p>
						<label for="password" class="text-dark">Password</label>
					</div>
					<!-- input login akhir -->

					<div class="pass-link text-center mb-4 mt-5">
						<a href="#" class="text-primary">Lupa password?</a>
					</div>

					<!-- tombol login -->
					<div class="btn btn-warning">
						<input type="submit" value="Login" name="login" href="login.php"class="btn btn-warning text-white fw-bolder">
					</div>
					<!-- tombol login akhir -->

					<div class="mt-3 text-center signup-link">
						Haven't an Account?
						<a href="" class="text-primary">Register Now</a>
					</div>
				</form>

				<form action="register.php" class="signup" method="post">
					<!-- kolom input pendaftaran -->

					<div class="mt-2 form-floating">
						<input class="form-control" type="text" placeholder="nama" name="nama" required />
						<label for="nama" class="text-dark">Nama Lengkap</label>
					</div>

					<div class="mt-2 form-floating">
						<input class="form-control" type="text" placeholder="Email" name="email" required />
						<label for="email" class="text-dark">Email Address</label>
					</div>

					<div class="mt-2 form-floating">
						<input class="form-control" type="password" placeholder="Password" id="passwordReg"
							name="passReg" pattern=".[-8]*" maxlength="30"
							title="Password must be at least 8 characters" required />
						<input type="checkbox" id="cek-pass" class="hide-cek mt-1" />
						<p id="title-cek" class="hide-cek">Show Password</p>
						<label for="passwordReg" class="text-dark">Password</label>
					</div>
					<div id="password-error-message" class="text-danger fw-lighter invalidInfo"></div>

					<div class="mt-2 form-floating">
						<input class="form-control" type="password" placeholder="Ulangi password" id="passConfrm"
						pattern="[a-zA-Z0-9]+" maxlength="30" required />
						<input type="checkbox" id="cek-pass2" class="hide-cek mt-1" />
						<p id="title-cek2" class="hide-cek">Show Password</p>
						<label for="passConfrm" class="text-dark">Confirm Password</label>
					</div>

					<div class="mt-2 form-floating">
						<input class="form-control" type="text" placeholder="Telp" name="no-telp" />
						<label for="no-telp" class="text-dark">No Telpon</label>
					</div>

					<div class="mt-2 form-floating">
						<input class="form-control" type="text" placeholder="rek" name="no-rek" maxlength="20" required />
						<label for="no-rek" class="text-dark">No Rekening</label>
					</div>

					<div class="mt-2 form-floating">
						<textarea name="address-data" id="" class="form-control"">Kota, Jl.nama jalan No.0</textarea>
						<label for="address" class="text-dark">Alamat</label>
					</div>
					<!-- input pendaftaran akhir -->

					<!-- bagian ini dalah tombol Daftar -->
					<div class="mt-4 btn btn-warning">
						<input type="submit" value="Daftar" name="register" class="btn btn-warning text-white fw-bolder"/>
					</div>
					<!-- akhir tombol login -->

					<div class="login-link mt-3 text-center">
						Have an Account? <a href="">Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- js Area -->

	<!-- bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>

	<!-- validasi persyaratan password -->
	<script type="module" src="assets/js-native/pass-reg-validation.js"></script>

	<!-- validasi ulang password -->
	<script type="module" src="assets/js-native/pass-confirm.js"></script>

	<!-- slide login dan singup -->
	<script type="module" src="assets/js-native/slide-form.js"></script>

	<!-- showing password feature -->
	<script type="module" src="assets/js-native/showing-pass.js"></script>

	<!-- End js Area -->
</body>

</html>