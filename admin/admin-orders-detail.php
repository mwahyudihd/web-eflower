<?php
include '../functions/data-connect.php';
session_start();
if (isset($_SESSION["user_mail"]) != NULL) {
    if ($_SESSION["role"] != 'admin') {
        header("location: ../index.php");
        exit;
    }
}
else if (isset($_SESSION["user_mail"]) == NULL){
    header('location: ../index.php');
    exit;
}
$get_order_id = $_GET['orderid'];
$query_set = mysqli_query($connection, "SELECT * FROM pembayaran JOIN detailorder ON pembayaran.no_pembayaran = detailorder.orderid
JOIN users ON pembayaran.id_user_toko = users.id_user
JOIN produk ON detailorder.id_produk = produk.id_produk
JOIN cart ON pembayaran.no_pembayaran = cart.orderid WHERE pembayaran.no_pembayaran = '$get_order_id'");

$konfirmasi_get_data = mysqli_query($connection, "SELECT * FROM konfirmasi WHERE orderid = '$get_order_id'");

$data_bukti = mysqli_fetch_array($konfirmasi_get_data);
$data = mysqli_fetch_array($query_set);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
	<head>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="../assets/libs/bootstrap/js/color-modes.js"></script>

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
			href="../assets/libs/bootstrap/css/bootstrap.min.css"
			rel="stylesheet" />

		<!-- fontawesome CSS -->
		<link rel="stylesheet" href="../assets/libs/fontawesome/css/all.min.css" />

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="../assets/css-native/app.css" />
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

		<nav class="navbar navbar-expand-md fixed-top bg-dark navbar-dark">
			<div class="container-fluid container">
				<a class="navbar-brand text-leaf fw-bolder" href="."
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
								<a href="admin-product.php" class="dropdown-item">Produk</a>
								<a href="admin-order.php" class="dropdown-item">Order</a>
								<a href="admin-users.php" class="dropdown-item">Pengguna</a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<p class="nav-link">Hi, Admin <?php echo $_SESSION['nama_lengkap'] ?></p>
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
								<a href="../profile.php" class="dropdown-item">Profile</a>
								<a onclick="logOutAdmin()" class="dropdown-item">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main role="main" class="container">
			<div class="row">
				<div class="col-md-10 mx-auto">
                    <div class="col-md-12">
						<div class="card">
                            <div class="card-header bg-leaf">Detail Order #<?= $data['orderid']; ?>
                            <div class="float-end">
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
									 ?> badge-pill rounded-pill"><?= $data['status']; ?></span>
                            </div>
                        </div>
						<div class="card-body">
							<div class="d-flex">
								<div class="col-md-5 card-body border">
									<p>Nama Pemesan: <?= $data['nama_pembeli']; ?></p>
									<p>Telp : <?= $data['nmr_telp_pembeli']; ?></p>
									<p>Alamat: <?= $data['alamat_pembeli']; ?></p>
								</div>
								<div class="col-md-6 float-end mb-5 m-3">
									<p class="text-left">Nama Penjual: <?= $data['nama_user'];?></p>
									<p class="text-left">Alamat Penjual: <?= $data['alamat'];?></p>
								</div>
							</div>
							
							
                            
                            <table class="table">
								<thead>
									<tr>
										<th scope="col">Produk</th>
										<th scope="col" class="text-center">Harga</th>
										<th scope="col" class="text-center">Jumlah</th>
										<th scope="col" class="text-center">Subtotal</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="row">
											<p><a href="../<?= $data['gambar']; ?>">
												<?php if(empty($data['gambar'])) { ?>
													<img src="https://placehold.co/50x50" alt="produk" />
												<?php } else { ?>
													<img src="../<?= $data['gambar']; ?>" height="70"width="70" alt="produk">
												<?php } ?>
												</a>
												<strong class="ms-3"><?= $data['nama_produk']; ?></strong>
											</p>
										</td>
										<td class="p-3 text-center">Rp<?= $data['harga']; ?>,-</td>
										<td class="text-center p-3">
											<?= $data['15']; ?>
										</td>
										<td class="p-3 text-center">
											<p>Rp.<?= $data['total_tagihan']; ?>,-</p>
										</td>
										<tr>
											<td colspan="3"><strong>Ongkir</strong></td>
											<td class="text-center p-3">Rp<?= $data['ongkir']; ?>,-</td>
										</tr>
										
                                        <tr>
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td class="text-center"><strong>Rp<?= $data['total_tagihan'] + $data['ongkir']; ?>,-</strong></td>
                                        </tr>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="card-footer">
							<form action="../functions/update-status-order.php" method="post">
								<div class="input-group">
									<input type="text" name="orderid" hidden readonly value="<?= $get_order_id; ?>">
									<select name="status" id="" class="form-control" required>
										<option value="" disabled selected><?= $data['status']; ?></option>
										<option value="menunggu pembayaran">Menunggu pembayaran</option>
										<option value="selesai">Selesai</option>
										<option value="dibatalkan admin">Dibatalkan Admin</option>
										<option value="menunggu konfirmasi">Menunggu Konfirmasi</option>
									</select>
									<div class="input-group p-2">
										<button type="submit" class="btn btn-success">Update<i class="fas fa-paper-plane p-1"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>

                    <div class="row mb-3">
                        <div class="col-md-8 mt-2">
							<div class="card">
								<div class="card-header">
									Bukti Pembayaran
								</div>
								<?php if(isset($data_bukti) != NULL){ ?>
									<div class="card-body m-4">
										<p>Dari Rekening : <?= $data_bukti['no_rek_pembayar']; ?></p>
										<p>Atas Nama : <?= $data_bukti['namarekening']; ?></p>
										<p>Nominal : Rp.<?= $data_bukti['total_bayar']; ?>,-</p>
										<p>catatan : <?= $data_bukti['catatan']; ?></p>
									</div>
								<?php } else { ?>
									<div class="card-body"><h3 class="text-center m-5">Pembeli Belum Mengkonfirmasi Pembayaran</h3></div>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-4 mt-2">
							<div class="card">
								<div class="card-body">
									<a href="../<?= $data_bukti['bukti']; ?>">
									<?php if(empty($data_bukti['bukti'])) { ?>
										<img src="https://placehold.co/255x260" alt="produk" />
									<?php } else { ?>
										<img src="../<?= $data_bukti['bukti']; ?>" height="260"width="220" class="m-2" alt="produk">
									<?php } ?>
									</a>
								</div>
							</div>
							
						</div>
                    </div>
				</div>
			</div>
		</main>
		<?php include '../footer.php'; ?>
		<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/libs/jquery/jquery-3.7.1.min.js"></script>
		<script src="../assets/js-native/confirm.js"></script>
	</body>
</html>
