<?php
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

include '../functions/data-connect.php';

$sesi_id = $_SESSION['id'];

$query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$sesi_id'");
$dt_user = mysqli_fetch_row($query);
$nama_lengkap = $dt_user[7];
$telp = $dt_user[6];
$link_poto = $dt_user[5];
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
    <title>Admin Beranda</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="../assets/libs/fontawesome/css/all.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css-native/app.css" />

    <style>
        .progress {
        width: 211.2px;
        height: 38.7px;
        border-radius: 35.2px;
        color: #fcd006;
        border: 3.5px solid #252122;
        position: relative;
        }

        .progress::before {
        content: "";
        position: absolute;
        margin: 3.5px;
        inset: 0 100% 0 0;
        border-radius: inherit;
        background: currentColor;
        animation: progress-pf82op 2.4s infinite;
        }

        @keyframes progress-pf82op {
        100% {
            inset: 0;
        }
        }

        .dots {
        width: 25.1px;
        height: 25.1px;
        position: relative;
        }

        .dots::before,
        .dots::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: #fcd006;
        }

        .dots::before {
        box-shadow: -42.2px 0 #fcd006;
        animation: dots-dm1l1chg 0.36s infinite linear;
        }

        .dots::after {
        transform: rotate(0deg) translateX(42.2px);
        animation: dots-dh1qq5hg 0.36s infinite linear;
        }

        @keyframes dots-dm1l1chg {
        100% {
            transform: translateX(42.2px);
        }
        }

        @keyframes dots-dh1qq5hg {
        100% {
            transform: rotate(-180deg) translateX(42.2px);
        }
        }
		.centered {				
            position: relative;
			top: 250px;
			left: 50%;
			padding: 9.5px;
			}
            @media (max-width: 890px) {
                .centered {
                    position: relative;
                    top: 550px;
                    left: 50%;
                    padding: 9.5px;
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

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-success py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
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
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
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
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
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
            <a class="navbar-brand text-leaf fw-bolder" href="#">E<span class="text-white">flower</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=".">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-1" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Manage</a>
                        <div href="#" class="dropdown-menu" aria-labelledby="dropdown-1">
                            <a href="/admin-category.html" class="dropdown-item">Kategori</a>
                            <a href="admin-product.php" class="dropdown-item">Produk</a>
                            <a href="/admin-order.html" class="dropdown-item">Order</a>
                            <a href="/admin-users.html" class="dropdown-item">Pengguna</a>
                        </div>
                    </li>
                </ul>
                   <ul class="navbar-nav">
                        <li class="nav-item">
                            <img src="
                            <?php
                            if (empty($link_poto)) {
                                echo '../assets/img/profile/user-profile.png';
                            } else {
                                echo "../".$link_poto;
                            }
                            ?>" width="15px" height="20px" class="card-img-top rounded-pill">
                        </li>
                        <li class="nav-item">
                            
                            <a class="nav-link" href="../profile.php"><?php echo $_SESSION['nama'] ?></a>
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
                                <a onclick="logOutAdmin()" class="dropdown-item point">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main role="main" class="container">
            <?php if(isset($_GET['admin'])): ?>
            <script>
                alert('Selamat Datang Admin!');
                var currentURL = window.location.href;
                var urlWithoutAdmin = currentURL.split('?')[0];

                window.location.href = urlWithoutAdmin;
            </script>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 bg-ktg-leaf">
                                <div class="card-body">
                                    Kategori: <strong>Semua Jenis</strong>
                                    <span class="float-end">
                                        Urutkan Harga:
                                        <a href="#" class="badge bg-success non-deco rounded-pill"
                                            >Termurah</a
                                        >
                                        |
                                        <a href="#" class="badge bg-success non-deco rounded-pill"
                                            >Termahal</a
                                        >
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
					$katalog = mysqli_query($connection, "SELECT * FROM users JOIN produk WHERE users.id_user = produk.id_user");
					$row = mysqli_num_rows($katalog);
					?>

                    <div class="row catalog-data">
                        <div class="row">
                            <?php if($row > 0){
                                while($data = mysqli_fetch_array($katalog)){
                                    ?>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <img
                                        src="<?php if(empty($data['gambar'])){
                                            echo 'https://placeholder.co/100x70';
                                        }else{
                                            echo '../'.$data['gambar'];
                                        }
                                        ?>
                                        "
                                        alt=""
                                        class="card-img-top" width="300px" height="300px"/>
                                    <div class="card-body bg-blur">
                                        <h5 class="card-title"><?= $data['nama_produk'] ?></h5>
                                        <p class="card-text"><strong>Rp <?= $data['harga'] ?>,-</strong></p>
                                        <p class="card-text"><strong>Penjual :</strong><?= $data['nama_user'] ?></p>
                                        <p class="card-text">
                                            <?php echo substr($data['deskripsi'], 0, 100); ?>
                                        </p>
                                        </p>
                                        <a href="#" class="badge <?php if($set_kategori == 'daun'){
                                                        echo 'bg-warning'.' '.'text-dark';
                                                    }else if($data['kategori'] == 'diair'){
                                                        echo 'bg-primary';
                                                    }else if ($data['kategori'] == 'berduri'){
                                                        echo 'bg-success';
                                                    }else if($data['kategori'] == 'bunga'){
                                                        echo 'bg-info';
                                                    }else{
                                                        echo 'bg-secondary';
                                                    } ?> non-deco"
                                            ><i class="fas fa-tags"></i> <?= $data['kategori'] ?></a
                                        >
                                        <span class="d-flex justify-content-center">STOK : <?= $data['qty']; ?></span>
                                        <p class="float-end"><strong>Kota : <?= $data['kota'] ?></strong></p>
                                    </div>
                                    <div class="card-footer bg-leaf text-dark">
                                        Dibuat pada :
                                        <?= $data['tgl_buat'] ?>
                                        <p class="float-end mt-2 text-dark">
                                            Terakhir Diedit : 
                                            <?= $data['di_edit']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php	}}?>
                        </div>
                    </div>
					

                    <!-- pagination area -->
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <span class="page-link">2</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <?php

                $option = mysqli_query($connection, "SELECT DISTINCT kategori FROM produk");
                
                $count_data = mysqli_num_rows($option);

                ?>
                
                <!-- right side -->
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header bg-leaf">Pencarian</div>
                                <div class="card-body">
                                    <div class="input-group">
										<input type="text" class="form-control" id="set-value" value="" />
										<div class="input-group-append" id="search-data">
											<button class="btn btn-success" >
												<i class="fas fa-search"></i>
											</button>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header bg-leaf">Kategori</div>
                                <div class="card-body">
                                    <div class="input-group">
										<select name="kategori" id="kategori" class="form-control">
											<option value="" disabled selected >Semua Jenis</option>
                                            <?php 
                                            if($count_data > 0){
                                                while($interface = mysqli_fetch_assoc($option)){ ?>
								        			<option value="<?= $interface['kategori']; ?>"><?= ucfirst($interface['kategori']); ?></option>
                                            <?php }} ?>
										</select>
										<div class="input-group-append" id="btn-kategori">
										<button class="btn btn-success">
												<i class="fas fa-angle-right"></i>
											</button>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

		<script>
			$(document).ready(function(){
					$("#btn-kategori").click(function(){
						var selectedOption = $("#kategori").val();
						if(selectedOption) {					
							$.ajax({
								url:"../functions/admin-filtered-catalog.php",
								type:"POST",
								data:"request=" + selectedOption,
								beforeSend:function(){
									$(".catalog-data").html('<div class="dots col-md-12 centered"></div>');
								},
								success:function(data){
									$(".catalog-data").html(data);
								}
							});
						}else {
							alert("Please select an option first.");
						}
					});
				});
		</script>

        <script>
			$(document).ready(function(){
					$("#search-data").click(function(){
						var inputData = $("#set-value").val();
						if(inputData) {					
							$.ajax({
								url:"../functions/admin-search-data.php",
								type:"POST",
								data:"data-req=" + inputData,
								beforeSend:function(){
									$(".catalog-data").html('<div class="progress col-md-12 centered"></div>');
								},
								success:function(data){
									$(".catalog-data").html(data);
								}
							});
						}else {
							alert("Anda Belum memasukkan kata pencarian.");
						}
					});
				});
		</script>

        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/jquery/jquery-3.7.1.min.js"></script>
        <script src="../assets/js-native/confirm.js"></script>
    </body>
</html>
