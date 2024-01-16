<?php
session_start();
include 'functions/data-connect.php';
if (isset($_SESSION["user_mail"]) == NULL) {
    header('location: form.php');
    exit;
} else if ($_SESSION["role"] == 'admin') {
    header("location: admin/index.php");
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="assets/libs/bootstrap/js/color-modes.js"></script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <title>Product</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css-native/app.css" />
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

    <nav class="navbar navbar-expand-md fixed-top bg-leaf">
        <div class="container-fluid container">
            <a class="navbar-brand text-leaf fw-bolder" href=".">E<span class="text-white">flower</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href=".">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-1" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Manage</a>
                        <div href="#" class="dropdown-menu" aria-labelledby="dropdown-1">
                            <a href="/admin-category.html" class="dropdown-item">Kategori</a>
                            <a href="/admin-product.html" class="dropdown-item">Produk</a>
                            <a href="/admin-order.html" class="dropdown-item">Order</a>
                            <a href="/admin-users.html" class="dropdown-item">Pengguna</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="cart.html" class="nav-link"><i class="fas fa-shopping-cart"></i>Cart
                            (<span>0</span>)</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">User</a>
                        <div href="#" class="dropdown-menu" aria-labelledby="dropdown-2">
                            <a href="profile.php" class="dropdown-item">Profile</a>
                            <a href="orders.php" class="dropdown-item">Orders</a>
                            <a onclick="logOut()" class="dropdown-item point">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">
        <?php if(isset($_GET['success'])): ?>
            <script>
                alert("Perubahan data telah berhasil dilakukan!")
            </script>
        <?php endif ?>
        <?php if(isset($_GET['success-info'])): ?>
            <script>
                alert("Perubahan data telah berhasil dilakukan! harap login kembali untuk melihat perubahan")
            </script>
        <?php endif ?>
        <div class="container-fluid">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="form-group" id="id-nama-toko">
                            NAMA TOKO :
                            <h4 class="text-center mt-2" id="nama-toko">
                                <?php
                                if(!empty($_SESSION['nama'])){
                                        echo $_SESSION['nama'];
                                    } else {
                                        echo 'Anda Belum Membuka Toko';
                                    }
                                     ?></h4>

                            <h4 class="text-center mt-2" id="kota-toko">
                            <?php
                                    if(!empty($_SESSION['kota'])){
                                        echo $_SESSION['kota'];
                                    } else {
                                        echo NULL;
                                    }
                                     ?>
                            </h4>

                            <h4 class="text-center mt-2" id="alamat-toko">
                                    <?php
                                    if(!empty($_SESSION['alamat'])){
                                        echo $_SESSION['alamat'];
                                    } else {
                                        echo NULL;
                                    }
                                     ?>
                            </h4>
                            <a href="javascript:void(0);" class="btn btn-secondary mt-2" onclick="toggleEditForm()">
                            <?php if(empty($_SESSION['nama'])): ?>
                                <i class="fas fa-file-pen"> BUKA</i>
                            <?php else : ?>
                                <i class="fas fa-file-pen"> EDIT</i>
                            <?php endif ?>
                            </a>
                        </div>

                        <div id="edit-form" style="display: none;">
                            <form method="post" action="name-form.php">
                                <div class="form-group">
                                    <label for="toko">MASUKKAN INFORMASI TOKO </label>
                                    <label for="namatoko">NAMA TOKO : </label>
                                    <input class="form-control text-center" type="text" name="toko" id="edited-nama-toko" value="<?php
                                    if(!empty($_SESSION['nama'])){
                                        echo $_SESSION['nama'];
                                    } else {
                                        echo NULL;
                                    }
                                     ?>" <required>
                                </div>
                                <div class="form-group">
                                     </required>
                                     <label for="kota">KOTA : </label>
                                     <input class="form-control text-center" type="text" name="kota" id="edited-nama-toko" value="<?php
                                    if(!empty($_SESSION['kota'])){
                                        echo $_SESSION['kota'];
                                    } else {
                                        echo NULL;
                                    }
                                     ?>" required>
                                </div>
                                <div class="form-group">
                                     <label for="kota">ALAMAT LENGKAP : </label>
                                     <input class="form-control text-center" type="text" name="alamat" id="edited-nama-toko" value="<?= $_SESSION['alamat']; ?>" required>
                                </div>
                                <button type="button" class="m-3 btn btn-danger" onclick="toggleEditForm()"><i class="fas fa-angle-left"></i></button>
                                <button type="submit" class="m-3 btn btn-secondary float-end"><i class="fas fa-floppy-disk"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-10 mx-auto">
                    <div class="card float-center">
                        <div class="card-header bg-leaf">
                            <span>Produk</span>
                            <a href="products-form.php" class="btn btn-sm btn-secondary">
                                <i class="fas fa-square-plus"></i>
                            </a>
                            <div class="float-end">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center"
                                            placeholder="Cari" />
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <a href="#" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php 
                                        $data = $_SESSION['id'];
                                        $display_produk = mysqli_query($connection, "SELECT * FROM produk WHERE id_user = '$data' AND status = 'aktif' ");
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
                                            
                                            ?>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <p>
                                                    <img src="<?php
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
                                                <form action="edit-product.php" method="get">
                                                    <input type="text" value="<?= $idproduk; ?>" name="id-produk" id="" style="display: none;">
                                                    <a href="edit-product.php">
                                                        <button class="btn btn-sm">
                                                            <i class="fas fa-edit text-info"></i>
                                                        </button>
                                                    </a>
                                                </form>
                                                <form action="functions/del-product.php" method="get">
                                                    <input type="text" value="<?= $idproduk; ?>" name="id-produk" id="" style="display: none;">
                                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk?')"
                                                        class="btn btn-sm">
                                                        <i class="fas fa-circle-xmark text-danger"></i>
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
                                        <?php } ?>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php if(isset($_GET['warning'])): ?>
        <script>
            alert('Anda Belum membuka toko! , Harap daftarkan nama toko anda.')
        </script>
    <?php endif; ?>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/js-native/confirm.js"></script>
    <script src="assets/js-native/shop-name.js"></script>
</body>

</html>