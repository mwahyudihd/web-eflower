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
		<title>Product</title>

		<link
			rel="canonical"
			href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

		<link
			href="../assets/libs/bootstrap/css/bootstrap.min.css"
			rel="stylesheet" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<!-- fontawesome CSS -->
		<link rel="stylesheet" href="../assets/libs/fontawesome/css/all.min.css" />

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="../assets/css-native/app.css" />

		<style>
			.spinner {
			width: 88px;
			height: 88px;
			display: grid;
			border: 7px solid #0000;
			border-radius: 50%;
			border-color: #5eff00 #0000;
			animation: spinner-e04l1k 1s infinite linear;
			}

			.spinner::before,
			.spinner::after {
			content: "";
			grid-area: 1/1;
			margin: 3.5px;
			border: inherit;
			border-radius: 50%;
			}

			.spinner::before {
			border-color: #947c2d #0000;
			animation: inherit;
			animation-duration: 0.5s;
			animation-direction: reverse;
			}

			.spinner::after {
			margin: 14px;
			}

			@keyframes spinner-e04l1k {
			100% {
				transform: rotate(1turn);
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

		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
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
							<a class="nav-link active" aria-current="page" href=".">Home</a>
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
								class="nav-link dropdown-toggle"
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
				<div class="container-fluid">
					<div class="col-md-10 mx-auto">
						<div class="card float-center">
							<div class="card-header bg-leaf">
								<span>Produk</span>
								<div class="float-end">
										<div class="input-group">
											<input
												type="text"
												class="form-control form-control-sm text-center"
												id="get-value"
												value=""
												placeholder="Cari" />
											<div class="input-group-append" id="search-data">
												<button type="submit" class="btn btn-secondary btn-sm">
													<i class="fas fa-search"></i>
												</button>	
											</div>
											<button type="reset" class="btn btn-danger btn-sm" id="clear">
												<i class="fas fa-eraser"></i>
											</button>
										</div>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Produk</th>
											<th scope="col">Pemilik</th>
											<th scope="col">Kategori</th>
											<th scope="col">Harga</th>
											<th scope="col">Stok</th>
											<th scope="col">Status</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody class="product-data">
									<?php 
                                        $data = $_SESSION['id'];
										$batas = 10;
										$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
										$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                                        $display_produk = mysqli_query($connection, "SELECT * FROM produk JOIN users WHERE produk.id_pemilik = users.id_user LIMIT $halaman_awal, $batas");
										$previous = $halaman - 1;
										$next = $halaman + 1;
										$data_conn = mysqli_query($connection,"SELECT * FROM produk JOIN users WHERE produk.id_pemilik = users.id_user");
										$jumlah_data = mysqli_num_rows($data_conn);
										$total_halaman = ceil($jumlah_data / $batas);
										$no = 1;
                                        $row = mysqli_num_rows($display_produk);
                                        if($row > 0) {
                                            while($array_produk = mysqli_fetch_array($display_produk)){
                                                $img_produk = $array_produk['gambar'];
                                                $nama_produk = $array_produk['nama_produk'];
                                                $set_kategori = $array_produk['kategori'];
                                                $price = $array_produk['harga'];
                                                $idproduk = $array_produk['id_produk'];
                                                $stok_barang = $array_produk['qty'];
												$pemilik = $array_produk['nama_user'];
												$status_produk = $array_produk['status'];
                                            
                                            ?>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <p>
                                                    <img src="../<?php
                                                    if(!empty($img_produk)){
                                                        echo $img_produk;
                                                    }else{
                                                        echo 'https://placehold.co/70x70';
                                                    }?>
                                                    " alt="" width="70" height="70" /> <?php
                                                    echo $nama_produk ?>
                                                </p>
                                            </td>
											<td>
												<?php echo $pemilik; ?>
											</td>
                                            <td>
                                                <span class="badge <?php if($set_kategori == 'daun'){
                                                    echo 'bg-warning'.' '.'text-dark';
                                                }else if($set_kategori == 'diair'){
                                                    echo 'bg-primary';
                                                }else if ($set_kategori == 'berduri'){
                                                    echo 'bg-success';
                                                }else if($set_kategori == 'bunga'){
                                                    echo 'bg-info';
                                                }else{
                                                    echo 'bg-secondary';
                                                } ?>"><i class="fas fa-tags"></i> <?= $set_kategori ?></span>
                                            </td>
                                            <td>Rp.<?= $price; ?></td>
                                            <td><?= $stok_barang; ?></td>
											<td>
												<form action="../functions/product-manage.php" method="post">
													<input type="text" name="id_produk" id="" value="<?= $idproduk; ?>" hidden readonly>
													<button type="submit" class="btn btn"><span class="badge <?php if($status_produk == 'aktif'){
														echo 'bg-warning'.' '.'text-dark';
													}else{
														echo 'bg-danger';
													} ?>"><i class="fas 
													<?php if($status_produk == 'aktif'){
														echo 'fa-toggle-on';
													}else{
														echo 'fa-toggle-off';
													} ?>"></i> 
													<?php if($status_produk == 'aktif'){
														echo 'Aktif';
													}else{
														echo 'Non-Aktif';
													} ?>
													</span></button>
												</form>
											
											</td>
                                            <td>
                                                <form action="../functions/permanent-remove.php" method="post">
                                                    <input type="text" value="<?= $idproduk; ?>" name="id-produk" id="" style="display: none;">
                                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk secara permanent?')"
                                                        class="btn btn-sm">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php }} else{ ?>
                                            <td>data tidak ditemukan!</td>
                                            <td>data tidak ditemukan!</td>
                                            <td>data tidak ditemukan!</td>
                                            <td>data tidak ditemukan!</td>
                                            <td>data tidak ditemukan!</td>
											<td>data tidak ditemukan!</td>
											<td>data tidak ditemukan!</td>
                                        <?php } ?>
									</tbody>
								</table>
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item">
											<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
										</li>
										<?php 
										for($x=1;$x<=$total_halaman;$x++){
											?> 
										<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
											<?php
										}
										?>				
										<li class="page-item">
											<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php include '../footer.php'; ?>
		<script>
			$(document).ready(function(){
				$("#search-data").click(function(){
					var Data = $("#get-value").val();
					if(Data) {			
						$.ajax({
							url:"../functions/admin-search-product.php",
							type:"POST",
							data: {data: Data},
							beforeSend:function(){
								$(".product-data").html('<td colspan="7"><center><div class="spinner m-5"></div></center></td>');
							},
							success:function(data){
								$(".product-data").html(data);
							}
						});
					}else {
						alert("Anda Belum memasukkan kata pencarian.");
					}
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				var inputColumn = $("#get-value");
				var btnRemove = $("#clear");
				btnRemove.on('click', function(){
					inputColumn.val('');
				});
			});
		</script>
		<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/libs/jquery/jquery-3.7.1.min.js"></script>
		<script src="../assets/js-native/confirm.js"></script>
	</body>
</html>
