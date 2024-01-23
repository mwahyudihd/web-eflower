<?php
include 'functions/data-connect.php';
session_start();
$sesi_id = $_SESSION['id'];
$order_id = $_GET['order'];
$query = mysqli_query($connection, "SELECT * FROM pembayaran JOIN users ON pembayaran.id_user = users.id_user
JOIN detailorder ON pembayaran.no_pembayaran = detailorder.orderid
JOIN produk ON detailorder.id_produk = produk.id_produk WHERE pembayaran.no_pembayaran = '$order_id'
");
$query_stat = mysqli_query($connection, "SELECT * FROM cart JOIN detailorder ON cart.orderid = detailorder.orderid WHERE cart.orderid = '$order_id'");

$status = mysqli_fetch_array($query_stat);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
	<head>
		<script src="assets/libs/bootstrap/js/color-modes.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
			.custom-loader {
			width: 50px;
			height: 50px;
			display: grid;
			color:#F4B916;
			background: radial-gradient(farthest-side, currentColor calc(100% - 6px),#0000 calc(100% - 5px) 0);
			-webkit-mask:radial-gradient(farthest-side,#0000 calc(100% - 13px),#000 calc(100% - 12px));
			border-radius: 50%;
			animation: s9 1s infinite linear;
			}
			.custom-loader::before,
			.custom-loader::after {    
			content:"";
			grid-area: 1/1;
			background:
				linear-gradient(currentColor 0 0) center,
				linear-gradient(currentColor 0 0) center;
			background-size: 100% 10px,10px 100%;
			background-repeat: no-repeat;
			}
			.custom-loader::after {
			transform: rotate(45deg);
			}

			@keyframes s9 { 
			100%{transform: rotate(1turn)}
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
								<a href="admin-category.html" class="dropdown-item"
									>Kategori</a
								>
								<a href="admin-product.html" class="dropdown-item">Produk</a>
								<a href="admin-order.html" class="dropdown-item">Order</a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav">
						<?php
						
						include 'functions/cart-num.php'; ?>
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
								<a href="profile.php" class="dropdown-item">Profile</a>
								<a href="orders.php" class="dropdown-item active">Orders</a>
								<a onclick="logOut()" class="dropdown-item">Logout</a>
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
								<a href="orders.php" class="non-deco active">Order</a>
							</li>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-header bg-leaf">Detail Order #<?= $data['no_pembayaran']; ?>
                            <div class="float-end">
                                <span class="badge <?php
											if($status['status'] == 'menunggu pembayaran'){
												echo 'bg-warning';
											}else if($status['status'] == 'menunggu konfirmasi'){
												echo 'bg-secondary';
											}else if($status['status'] == 'dikonfirmasi'){
												echo 'bg-primary';
											}else if($status['status'] == 'dalam pengiriman'){
												echo 'bg-info';
											}else if($status['status'] == 'selesai'){
												echo 'bg-success';
											}else if($status['status'] == 'dibatalkan'){
												echo 'bg-danger';
											}else{
												echo 'bg-light';
											}
											 ?> text-dark badge-pill rounded-pill"><?= $status['status']; ?></span>
                            </div>
                        </div>
						<div class="card-body">
                            <p>Nama Penerima: <?= $data['nama_pembeli']; ?></p>
                            <p>Telp : +62<?= $data['nmr_telp_pembeli']; ?></p>
                            <p>Alamat: <?= $data['alamat_pembeli']; ?></p>
                            <table class="table">
								<thead>
									<tr>
										<th scope="col">Produk</th>
										<th scope="col" class="text-center">Harga</th>
										<th scope="col" class="text-center">Jumlah</th>
										<th scope="col" class="text-center">Subtotal</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="row">
											<p>
											<img src="<?php
                                                    if(!empty($data['gambar'])){
                                                        echo $data['gambar'];
                                                    }else{
                                                        echo 'https://placehold.co/50x50';
                                                    }?>
                                                    " alt="" width="50" height="50" /> 
												<strong class="ms-3"><?= $data['nama_produk']; ?></strong>
											</p>
										</td>
										<td class="p-3 text-center">Rp<?= $data['harga']; ?>,-</td>
										<td class="text-center p-3">
											<?= $status['qty']; ?>
										</td>
										<td class="text-center p-3">Rp<?= $data['total_tagihan']; ?>,-</td>
										<tr>
											<td colspan="3">Ongkir</td>
											<td class="text-center">Rp<?= $data['ongkir']; ?>,-</td>
										</tr>
                                        <tr>
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td class="text-center"><strong>Rp<?php $ongkir = $data['ongkir']; 
											$tagihan = $data['total_tagihan'];
											$total_tagihan = $ongkir + $tagihan;
											echo $total_tagihan; ?>,-</strong></td>
                                        </tr>
									</tr>
								</tbody>
							</table>
						</div>
                        <div class="card-footer">
							<?php if($status['status'] == 'menunggu pembayaran' && $data['ongkir'] != NULL){ ?>
							<form action="orders-confirm.php" method="post">
								<input type="number" name="total-tagihan" style="display: none;" value="<?= $total_tagihan; ?>" readonly>
								<input type="text" name="data_order" style="display: none;" value="<?= $order_id; ?>" readonly>
								<button type="submit" class="btn btn-success">Konfirmasi Pembayaran <i class="fas fa-money-check"></i></button>
							</form>
							<?php }elseif($status['status'] == 'menunggu pembayaran'){ ?>
								<div class="container">
									
									<div class="alert alert-success alert-dismissible" id="myAlert">
										
										<div class="custom-loader float-end"></div>
										<a href="#" class="close btn btn-danger rounded-pill mb-4"><i class="fas fa-xmark"></i></a>
										<strong>Perhatian !</strong> Mohon untuk menunggu..., ongkir sedang kami proses. <span class="pt-4">Terimakasih </span>
										<p class="pt-3 float-end">@Admin</p>
									</div>
									
								</div>
								<a href="orders.php" class="btn btn-warning text-dark"><i class="fas fa-angle-left"></i> Kembali</a>
							<?php }
							else{ ?>
								<a href="orders.php" class="btn btn-warning text-dark"><i class="fas fa-angle-left"></i> Kembali</a>
                            <?php } ?>
                        </div>
					</div>
				</div>
			</div>
		</main>
		<script>
			$(document).ready(function(){
				$(".close").click(function(){
					$("#myAlert").alert("close");
				});
			});
		</script>
		<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
		<script src="assets/js-native/confirm.js"></script>
	</body>
</html>
