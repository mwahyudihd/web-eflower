<?php
session_start();
include 'functions/data-connect.php';
if (isset($_SESSION["user_mail"]) == NULL) {
	header('location: form.php');
	exit;
	
}elseif ($_SESSION["role"] == 'admin') {
	header("location: admin/index.php");
	exit;
}

$id_sesi = $_SESSION['id'];
include 'functions/data-connect.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
	<head>
		<script src="assets/libs/bootstrap/js/color-modes.js"></script>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />

		<title>Orders - Eflower</title>

		<link
			rel="canonical"
			href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

		<link
			href="assets/libs/bootstrap/css/bootstrap.min.css"
			rel="stylesheet" />

		<!-- fontawesome CSS -->
		<link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css" />

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="assets/css-native/app.css" />
		<style>
			.send {
			position: relative;
			width: 32.5px; /* reduced to 50% */
			height: 25px; /* reduced to 50% */
			background-repeat: no-repeat;
			background-image: linear-gradient(#0277bd, #0277bd),
			linear-gradient(#29b6f6, #4fc3f7), linear-gradient(#29b6f6, #4fc3f7);
			background-size: 20px 17.5px, 7.5px 12.5px, 7.5px 7.5px; /* reduced to 50% */
			background-position: 0 0, 20px 5px, 25px 10px; /* reduced to 50% */
			}

			.send:after {
			content: "";
			position: absolute;
			bottom: 2.5px; /* reduced to 50% */
			left: 3px; /* reduced to 50% */
			width: 2.5px; /* reduced to 50% */
			height: 2.5px; /* reduced to 50% */
			background: #fff;
			border-radius: 50%;
			box-sizing: content-box;
			border: 2.5px solid #000; /* reduced to 50% */
			box-shadow: 19.5px 0 0 -2.5px #fff, 19.5px 0 #000; /* reduced to 50% */
			animation: wheelSk 0.75s ease-in infinite alternate;
			}

			.send:before {
			content: "";
			position: absolute;
			right: 100%;
			top: 0px;
			height: 17.5px; /* reduced to 50% */
			width: 17.5px; /* reduced to 50% */
			background-image: linear-gradient(#fff 11.25px, transparent 0),
				linear-gradient(#fff 11.25px, transparent 0),
				linear-gradient(#fff 11.25px, transparent 0); /* reduced to 50% */
			background-repeat: no-repeat;
			background-size: 7.5px 1px; /* reduced to 50% */
			background-position: 0px 2.75px, 2px 8.75px, 0px 15px; /* reduced to 50% */
			animation: lineDropping 0.75s linear infinite;
			}

			@keyframes wheelSk {
			0%, 50%, 100% { transform: translatey(0) }
			30%, 90% { transform: translatey(-0.75px) } /* reduced to 50% */
			}

			@keyframes lineDropping {
			0% {
				background-position: 25px 2.75px, 28.75px 8.75px, 26.25px 15px; /* reduced to 50% */
				opacity: 1;
			}
			50% { background-position: 0px 2.75px, 5px 8.75px, 1.25px 15px } /* reduced to 50% */
			60% { background-position: -7.5px 2.75px, 0px 8.75px, -2.5px 15px } /* reduced to 50% */
			75%, 100% {
				background-position: -7.5px 2.75px, -7.5px 8.75px, -7.5px 15px; /* reduced to 50% */
				opacity: 0;
			}
			}


			.progress {
				position: relative;
				width: 20px;
				height: 20px;
				border-radius: 50%;
				border: 1px solid #95d900;
				box-sizing: content-box;
			}

			.progress:before,
			.progress:after {
				content: "";
				position: absolute;
				width: 1px;
				background: #95d900;
				border-radius: 1px;
				transform-origin: 0.5px 0;
			}

			.progress:before {
				height: 8px;
				top: 10.2px;
				left: 9.1px;
				animation: progress-t59zy9 2.8s linear infinite;
			}

			.progress:after {
				height: 5.3px;
				top: 10.3px;
				left: 9.1px;
				animation: progress-t59zy9 16.8s linear infinite;
			}

			@keyframes progress-t59zy9 {
				0% {
					tranform: rotate(0deg);
				}

				100% {
					transform: rotate(360deg);
				}
			}

			.loader {
			transform: translateZ(1px);
			}
			.loader:after {
			content: '$';
			display: inline-block;
			width: 25px;
			height: 25px;
			border-radius: 50%;
			text-align: center;
			line-height:15px;
			font-size: 15px;
			font-weight: bold;
			background: #FFD700;
			color: #DAA520;
			border: 4px double ;
			box-sizing: border-box;
			box-shadow:  2px 2px 2px 1px rgba(0, 0, 0, .1);
			animation: coin-flip 4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
			}
			@keyframes coin-flip {
			0%, 100% {
				animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
			}
			0% {
				transform: rotateY(0deg);
			}
			50% {
				transform: rotateY(1800deg);
				animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
			}
			100% {
				transform: rotateY(3600deg);
			}
			}
				
			.loader-confirm {
				box-sizing: border-box;
				display: inline-block;
				width: 16px;  
				height: 20px;  
				border-top: 2.5px solid #fff;  
				border-bottom: 2.5px solid #fff;  
				position: relative;
				background: linear-gradient(#FF3D00 15px, transparent 0) no-repeat;  
				background-size: 1px 20px;  
				background-position: 50% 0px;
				animation: spinx 5s linear infinite;
			}
			.loader-confirm:before, .loader-confirm:after {
				content: "";
				width: 18px;
				left: 50%;
				height: 8.3px; 
				position: absolute;
				top: 0;
				transform: translatex(-50%);
				background: rgba(255, 255, 255, 0.4);
				border-radius: 0 0 10px 10px; 
				background-size: 100% auto;
				background-repeat: no-repeat;
				background-position: 0 0px;
				animation: lqt 5s linear infinite;
			}
			.loader-confirm:after {
				top: auto;
				bottom: 0;
				border-radius: 10px 10px 0 0; 
				animation: lqb 5s linear infinite;
			}

			@keyframes lqt {
			0%, 100% {
				background-image: linear-gradient(#FF3D00 40px, transparent 0);
				background-position: 0% 0px;
			}
			50% {
				background-image: linear-gradient(#FF3D00 40px, transparent 0);
				background-position: 0% 40px;
			}
			50.1% {
				background-image: linear-gradient(#FF3D00 40px, transparent 0);
				background-position: 0% -40px;
			}
			}
			@keyframes lqb {
			0% {
				background-image: linear-gradient(#FF3D00 40px, transparent 0);
				background-position: 0 40px;
			}
			100% {
				background-image: linear-gradient(#FF3D00 40px, transparent 0);
				background-position: 0 -40px;
			}
			}
			@keyframes spinx {
			0%, 49% {
				transform: rotate(0deg);
				background-position: 50% 36px;
			}
			51%, 98% {
				transform: rotate(180deg);
				background-position: 50% 4px;
			}
			100% {
				transform: rotate(360deg);
				background-position: 50% 36px;
			}
			}
    
			.box {
			width: 24px; /* reduced to 50% */
			height: 24px; /* reduced to 50% */
			display: inline-block;
			position: relative;
			}
			.box::before {
			content: '';  
			box-sizing: border-box;
			width: 12px; /* reduced to 50% */
			height: 12px; /* reduced to 50% */
			position: absolute;
			left: 0;
			top: -12px; /* reduced to 50% */
			animation: animloader1 2s linear infinite alternate;
			}
			.box::after {
			content: '';
			position: absolute;
			left: 0;
			top: 0;
			width: 12px; /* reduced to 50% */
			height: 12px; /* reduced to 50% */
			background: rgba(255, 255, 255, 0.85);
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.15); /* reduced to 50% */
			box-sizing: border-box;
			animation: animloader2 2s linear infinite alternate;
			}

			@keyframes animloader1 {
			0%, 32% {
				box-shadow: 0 12px white, 12px 12px rgba(255, 255, 255, 0), 12px 24px rgba(255, 255, 255, 0), 0px 24px rgba(255, 255, 255, 0); /* reduced to 50% */
			}
			33%, 65% {
				box-shadow: 0 12px white, 12px 12px white, 12px 24px rgba(255, 255, 255, 0), 0px 24px rgba(255, 255, 255, 0); /* reduced to 50% */
			}
			66%, 99% {
				box-shadow: 0 12px white, 12px 12px white, 12px 24px white, 0px 24px rgba(255, 255, 255, 0); /* reduced to 50% */
			}
			100% {
				box-shadow: 0 12px white, 12px 12px white, 12px 24px white, 0px 24px white; /* reduced to 50% */
			}
			}

			@keyframes animloader2 {
			0% {
				transform: translate(0, 0) rotateX(0) rotateY(0);
			}
			33% {
				transform: translate(50%, 0) rotateX(0) rotateY(180deg); /* reduced to 50% */
			}
			66% {
				transform: translate(50%, 50%) rotateX(-180deg) rotateY(180deg); /* reduced to 50% */
			}
			100% {
				transform: translate(50%, 50%) rotateX(-180deg) rotateY(360deg); /* reduced to 50% */
			}
			}

				
		</style>
	</head>
	<body>
		<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
			<symbol id="check2" viewBox="0 0 16 16">
				<path
					d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
			</symbol>
			<symbol id="circle-half" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
			</symbol>
			<symbol id="moon-stars-fill" viewBox="0 0 16 16">
				<path
					d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
				<path
					d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
			</symbol>
			<symbol id="sun-fill" viewBox="0 0 16 16">
				<path
					d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
			</symbol>
		</svg>

		<div
			class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
			<button
				class="btn btn-success py-2 dropdown-toggle d-flex align-items-center"
				id="bd-theme"
				type="button"
				aria-expanded="false"
				data-bs-toggle="dropdown"
				aria-label="Toggle theme (auto)">
				<svg class="bi my-1 theme-icon-active" width="1em" height="1em">
					<use href="#circle-half"></use>
				</svg>
				<span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
			</button>
			<ul
				class="dropdown-menu dropdown-menu-end shadow"
				aria-labelledby="bd-theme-text">
				<li>
					<button
						type="button"
						class="dropdown-item d-flex align-items-center"
						data-bs-theme-value="light"
						aria-pressed="false">
						<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
							<use href="#sun-fill"></use>
						</svg>
						Light
						<svg class="bi ms-auto d-none" width="1em" height="1em">
							<use href="#check2"></use>
						</svg>
					</button>
				</li>
				<li>
					<button
						type="button"
						class="dropdown-item d-flex align-items-center"
						data-bs-theme-value="dark"
						aria-pressed="false">
						<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
							<use href="#moon-stars-fill"></use>
						</svg>
						Dark
						<svg class="bi ms-auto d-none" width="1em" height="1em">
							<use href="#check2"></use>
						</svg>
					</button>
				</li>
				<li>
					<button
						type="button"
						class="dropdown-item d-flex align-items-center active"
						data-bs-theme-value="auto"
						aria-pressed="true">
						<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
							<use href="#circle-half"></use>
						</svg>
						Auto
						<svg class="bi ms-auto d-none" width="1em" height="1em">
							<use href="#check2"></use>
						</svg>
					</button>
				</li>
			</ul>
		</div>

		<nav class="navbar navbar-expand-md fixed-top bg-leaf">
			<div class="container-fluid container">
				<a class="navbar-brand text-leaf fw-bolder" href="#"
					>E<span class="text-white">flower</span></a
				>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarCollapse"
					aria-controls="navbarCollapse"
					aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href=".">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a
								href="#"
								class="nav-link dropdown-toggle"
								id="dropdown-1"
								data-bs-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
								>Manage</a
							>
							<div href="#" class="dropdown-menu" aria-labelledby="dropdown-1">
								<a href="/admin-category.html" class="dropdown-item"
									>Kategori</a
								>
								<a href="manage.php" class="dropdown-item">Toko</a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav">
						<?php include 'functions/cart-num.php'; ?>
						<li class="nav-item">
							<a href="cart.php" class="nav-link"
								><i class="fas fa-shopping-cart"></i>Cart (<span><?= $jml_array; ?></span>)</a
							>
						</li>
						<li class="nav-item dropdown">
							<a
								href="#"
								class="nav-link dropdown-toggle active"
								id="dropdown-2"
								data-bs-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
								>User</a
							>
							<div href="#" class="dropdown-menu" aria-labelledby="dropdown-2">
								<a href="/profile.html" class="dropdown-item">Profile</a>
								<a href="/orders.html" class="dropdown-item active">Orders</a>
								<a href="#" class="dropdown-item">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main role="main" class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card mb-3">
						<div class="card-header bg-leaf">Menu</div>
						<div class="list-group list-group-flush">
							<li class="list-group-item">
								<a href="profile.php" class="non-deco">Profile</a>
							</li>
							<li class="list-group-item">
								<a href="orders.php" class="non-deco">Order</a>
							</li>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-header bg-leaf">Daftar Orders</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Tanggal Pesan</th>
										<th>Total Tagihan</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = mysqli_query($connection, "SELECT * FROM pembayaran JOIN cart ON pembayaran.no_pembayaran = cart.orderid WHERE cart.id_user = '$id_sesi'");
									$row = mysqli_num_rows($query);
									if($row){
										while($data = mysqli_fetch_array($query)) {
									?>
									<tr>
										<td>
											<a class="non-deco" href="orders-detail.php?order=<?= $data['orderid']; ?>"
												>#<?= $data['orderid']; ?></a
											>
										</td>
										<td><?= $data['time_info']; ?></td>
										<td>Rp<?= $data['total_tagihan'] + $data['ongkir']; ?>,-</td>
										<td>
											<span class="badge <?php
												if($data['status'] == 'menunggu pembayaran'){
														echo 'bg-warning text-dark';
													}else if($data['status'] == 'menunggu konfirmasi'){
														echo 'bg-secondary text-white';
													}else if($data['status'] == 'dikonfirmasi'){
														echo 'bg-primary text-white';
													}else if($data['status'] == 'dalam pengiriman'){
														echo 'bg-info text-dark';
													}else if($data['status'] == 'selesai'){
														echo 'bg-success text-white';
													}else if($data['status'] == 'dibatalkan' || $data['status'] == 'dibatalkan admin' || $data['status'] == 'dibatalkan penjual'){
														echo 'bg-danger text-white';
													}else{
														echo 'bg-light text-dark';
													}
													?>

											 rounded-pill text-dark"
												><?= $data['status']; ?></span
											>
										</td>
										<td>
											<?php if($data['ongkir'] == NULL){ ?>
												<div class="progress"></div>
											<?php } elseif ($data['ongkir'] != NULL && $data['status'] == 'menunggu pembayaran'){ ?>
												<div class="loader"></div>
											<?php } elseif ($data['status'] == 'menunggu konfirmasi') { ?>
												<div class="loader-confirm"></div>
											<?php } elseif ($data['status'] == 'dikirim') { ?>
												<div class="send"></div>
											<?php } elseif ($data['status'] == 'dikemas') { ?>
												<div class="box"></div>
											<?php } ?>
										</td>
									</tr>
									<?php	}}else{ 
										echo '<td colspan="4" class="text-center">Belum ada Order yang dibuat!</td>';
									 }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($_GET['success'])): ?>
				<script>
					alert('Permintaan anda berhasil dikirim Mohon tunggu konfirmasi dari Penjual...!');
				</script>
			<?php endif ?>
		</main>
		<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
	</body>
</html>
