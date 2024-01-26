<?php
include 'functions/data-connect.php';
session_start();
if (isset($_SESSION["user_mail"]) == NULL) {
	header('location: form.php');
	exit;
	
}elseif ($_SESSION["role"] == 'admin') {
	header("location: admin/index.php");
	exit;
}
$orderid = $_POST['orderid'];
$query = mysqli_query($connection, "SELECT * FROM kwitansi JOIN users ON kwitansi.id_toko = users.id_user JOIN produk ON kwitansi.produkid = produk.id_produk WHERE kwitansi.id_order = '$orderid'");
$data = mysqli_fetch_array($query);
$query_payment = mysqli_query($connection, "SELECT * FROM konfirmasi WHERE orderid = '$orderid'");
$set = mysqli_fetch_array($query_payment);

$id_sesi = $_SESSION['id'];
$query_user = mysqli_query($connection, "SELECT * FROM users WHERE id_user = '$id_sesi'");
$dat = mysqli_fetch_array($query_user);

?>

<!DOCTYPE html>
<html lang="en">
<head>    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="assets/libs/bootstrap/js/color-modes.js"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css-native/app.css" />

    <style>
        @media print {
            body * {
                background-color: #FFFFFF;
                color: #000000;
                
            }
            #btn{
                  display: none;
                }
        }
    </style>

</head>
<body>
    <div class="card">
        <div class="card-body">
          <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
              <div class="col-xl-9">
                <p style="color: #7e8d9f;font-size: 20px;">Invoice &gt;&gt; <strong>ID: #<?= $orderid; ?></strong></p>
              </div>
            </div>
            <div class="container">
              <div class="col-md-12">
                <div class="text-center">
                  <i class="far fa-building fa-4x ms-0" style="color:#8f8061 ;"></i>
                  <p class="pt-2">EFlower</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-8">
                  <ul class="list-unstyled">
                    <li class="text-muted">Penerima: <span style="color:#8f8061 ;"><?= $data['nama_penerima']; ?></span></li>
                    <li class="text-muted">Alamat: <?= $data['alamat_pembeli']; ?></li>
                    <li class="text-muted"><i class="fas fa-phone"></i> <?= $dat['no_telp']; ?></li>
                  </ul>
                  <ul class="col-xl-4">
                    <li>Toko : <span><?= $data['nama_user']; ?></span></li>
                    <li>Alamat : <span><?= $data['alamat']; ?></span></li>
                  </ul>
                </div>
                <div class="col-xl-4">
                  <p class="text-muted">Invoice</p>
                  <ul class="list-unstyled">
                    <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061 ;"></i> <span
                        class="fw-bold">ID:</span> <?= $orderid; ?></li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061 ;"></i> <span
                        class="fw-bold">Tanggal Terbit: </span><?= $data['tgl_terbit']; ?></li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061;"></i> <span
                        class="me-1 fw-bold">Status:</span>
                        <?php if($data['status_order'] == 'LUNAS') { ?>
                        <span class="badge bg-warning text-black fw-bold">
                        LUNAS</span></li>
                        <?php }else{ ?>
                          <span class="badge bg-danger text-white fw-bold">
                        DIBATALKAN</span></li>
                        <?php } ?>
                  </ul>
                </div>
              </div>
              <div class="row my-2 mx-1 justify-content-center">
                <div class="col-md-2 mb-4 mb-md-0">
                  <div class="
                              bg-image
                              ripple
                              rounded-5
                              mb-4
                              overflow-hidden
                              d-block
                              " data-ripple-color="light">
                    <img src="<?= $data['gambar']; ?>"
                      class="w-100" height="100px" alt="Elegant shoes and shirt" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-7 mb-4 mb-md-0">
                  <p class="fw-bold"><?= $data['nama_produk']; ?></p>
                  <p class="mb-1">
                    <span class="text-muted me-2">Qty:</span><span> <?= $data['qty_pembelian']; ?></span>
                  </p>
                  <p>
                    <span class="text-muted me-2">Kategori:</span><span><?= 'daun'; ?></span>
                  </p>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                  <h5 class="mb-2">
                    <span class="align-middle">Rp<?= $data['harga'].',-'; ?></span>
                  </h5>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-8">
                  <p class="ms-3">payment information</p>
                  <p class="ms-3">Metode Pembayaran : <span><?= $set['payment']; ?></span></p>
                  <p class="ms-3">Atas nama : <span><?= $set['namarekening']; ?></span></p>
                  <p class="ms-3">Total Bayar : <span><?= $set['total_bayar']; ?></span></p>

                  <p class="ms-3">Catatan : </p>
                  <?php if($data['status_order'] == 'LUNAS') { ?>
                    
                  <?php }else{ ?>
                    <p>
                    <?= $set['catatan_penjual']; ?></p>
                  <?php } ?>
                </div>
                <div class="col-xl-3">
                  <ul class="list-unstyled">
                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>Rp <?= $data['total']; ?></li>
                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Ongkir</span>Rp <?= $data['ongkir']; ?></li>
                  </ul>
                  <p class="text-black float-start"><span class="text-black me-3"> Total </span><span
                      style="font-size: 25px;">Rp <?= $data['total_bersih']; ?></span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
  <div class="d-flex justify-content-center">
    <button id="btn" class="btn btn-primary align-self-center m-5" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
  </div>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
</html>