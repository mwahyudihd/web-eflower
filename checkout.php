<?php 
session_start();
include 'functions/data-connect.php';
$user = $_SESSION['id'];
$orderid = $_GET['id_order'];
$query = mysqli_query($connection, "SELECT * FROM users WHERE id_user = '$user'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
	<head>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="assets/libs/bootstrap/js/color-modes.js"></script>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />

		<title>Checkout</title>

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
		<link rel="stylesheet" href="/assets/css-native/app.css" />
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

		<nav class="navbar navbar-expand-md fixed-top bg-success">
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
							<a class="nav-link" aria-current="page" href="#">Home</a>
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
								<a href="/admin-product.html" class="dropdown-item">Produk</a>
								<a href="/admin-order.html" class="dropdown-item">Order</a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<?php include 'functions/cart-num.php'; ?>
							<a href="cart.php" class="nav-link active"
								><i class="fas fa-shopping-cart"></i>Cart (<span><?= $jml_array; ?></span>)</a
							>
						</li>
						<li class="nav-item dropdown">
							<a
								href="#"
								class="nav-link dropdown-toggle"
								id="dropdown-2"
								data-bs-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
								>User</a
							>
							<div href="#" class="dropdown-menu" aria-labelledby="dropdown-2">
								<a href="/profile.html" class="dropdown-item">Profile</a>
								<a href="/orders.html" class="dropdown-item">Orders</a>
								<a href="#" class="dropdown-item">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main role="main" class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header bg-leaf">Formulir Alamat Pengiriman</div>
						<div class="card-body">
							<form action="functions/check-out.php" method="get" enctype="multipart/form-data">
								<input type="text" name="order-data" value="<?= $orderid; ?>" style="display: none;" readonly>
								
								<div class="form-group">
									<label for="">Nama</label>
									<input
										type="text"
										class="form-control"
										name="name"
										value="<?= $data['nama_lengkap'] ?>"
										placeholder="Masukkan nama penerima" />
										<?php if(empty($data['nama_lengkap'])) { ?>
									<small class="form-text text-danger"
										>Kolom ini Wajib diisi*</small>
										<?php } ?>
								</div>
								<div class="form-group">
									<label for="">Alamat</label
									><textarea
										name="address"
										id=""
										cols="30"
										rows="5"
										class="form-control"><?= $data['alamat'] ?></textarea>
										<?php if(empty($data['alamat'])) { ?>
                                        <small class="form-text text-danger">Alamat Wajib diisi*</small>
										<?php } ?>
								</div>
                                <div class="form-group">
									<label for="">No. Telepon</label>
									<input
										type="number"
										class="form-control"
										value="<?php echo $data['no_telp'] ?>"
										name="phone"
										placeholder="Masukkan no telp aktif penerima" />
										<?php if(empty($data['no_telp'])) { ?>
									<small class="form-text text-danger"
										>Kolom ini Wajib diisi*</small
									> <?php } ?>
								</div>
                                <button class="btn btn-success" type="submit">Simpan <i class="fas fa-money-check"></i></button>
							
						</div>
					</div>
				</div>

				<!-- right side -->
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<div class="card mb-3">
								<div class="card-header bg-leaf">Cart</div>
								<div class="card-body">
                                    <table class="table">
										<thead>
											<tr>
												<th>Produk</th>
												<th>Qty</th>
												<th>Harga</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$orderid = $_GET['id_order'];
											$total = 0;
											$query = mysqli_query($connection, "SELECT * FROM detailorder JOIN produk ON detailorder.id_produk = produk.id_produk WHERE detailorder.orderid = '$orderid'");
											$query2 = mysqli_query($connection, "SELECT * FROM detailorder WHERE detailorder.orderid = '$orderid'");
											$data2 = mysqli_fetch_array($query2);

											if(mysqli_num_rows($query) > 0 ) {
												while ($data = mysqli_fetch_array($query)) {
													$nama_produk = $data['nama_produk'];
													$qty = $data2['qty'];
													$harga = $data['harga'];
													$subtotal = $harga * $qty ;
													$total += $subtotal;
											?>
													<tr>
														<td><?= $nama_produk; ?></td>
														<td><?= $qty; ?></td>
														<td>Rp<?= number_format($harga, 0, ',', '.'); ?>,-</td>
													</tr>
											<?php
												}}
											?>
											<tr>
												<td colspan="2"><strong>Subtotal</strong></td>
												<td>Rp<?= number_format($total, 0, ',', '.'); ?>,-</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="2"><strong>Total</strong></th>
												<td><strong>Rp<?= number_format($total, 0, ',', '.'); ?>,-</strong></td>
											</tr>
										</tfoot>
									</table>
									<input type="text" name="tagihan" value="<?= $total; ?>" style="display: none;" readonly>
									</form>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
	</body>
</html>
