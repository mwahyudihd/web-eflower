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
$id_data = $_SESSION['id'];

$query = mysqli_query($connection, "SELECT * FROM kwitansi JOIN produk ON kwitansi.produkid = produk.id_produk WHERE kwitansi.id_toko = '$id_data' AND kwitansi.status_order = 'DIBATALKAN'");
$row = mysqli_num_rows($query);

$sum = mysqli_query($connection, "SELECT SUM(qty_pembelian) AS totally FROM kwitansi WHERE id_toko = '$id_data' AND status_order = 'DIBATALKAN'");
$array_qty = mysqli_fetch_assoc($sum);
$total_qty = $array_qty['totally'];

$sum2 = mysqli_query($connection, "SELECT SUM(total) AS total_data FROM kwitansi WHERE id_toko = '$id_data' AND status_order = 'DIBATALKAN'");
$array_total = mysqli_fetch_assoc($sum2);
$total_tagihan = $array_total['total_data'];

$sum3 = mysqli_query($connection, "SELECT SUM(total_bersih) AS total_final FROM kwitansi WHERE id_toko = '$id_data' AND status_order = 'DIBATALKAN'");
$array_final = mysqli_fetch_assoc($sum3);
$total_final = $array_final['total_final'];

$current_time = date('y-m-d');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="assets/libs/bootstrap/js/color-modes.js"></script>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<title>Report</title>

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
            @media print{
                #report-data{
                    color: black;
                    background: #ffff;
                    border: 15px solid #0000;
                }
                #btn, #btn2, #btn3{
                    display: none;
                }
            }
        </style>

</head>
<body>
    <div class="card container" >
        <div class="card-header container mb-5 bg-dark">
            <a href="report.php" class="btn btn-secondary" id="btn2"> Laporan Pesanan Untung </a>
            <span><a href="report-cenceled.php" class="float-end btn btn-warning" id="btn3" disabled="disabled"> Laporan Pesanan Batal </a></span>
            <h3 class="text-center">LAPORAN PEMBATALAN</h3>
            
        </div>
    </div>
    <div class="continer" id="report-data">
        <div class="container card">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">ID</th>
                        <th scope="col">NAMA PEMBELI</th>
                        <th scope="col">NAMA PRODUK</th>
                        <th scope="col">QTY</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">TOTAL BAYAR</th>
                        <th scope="col">ONGKIR</th>
                        <th scope="col">TOTAL BERSIH</th>
                        <th scope="col">TANGGAL</th>
                    </tr>
                </thead>
                <?php
                $num = 0;
                if($row > 0){
                    while($data = mysqli_fetch_array($query)) {
                        $num++;
                        ?>
        <tbody>
            <tr class="text-center">
                <th scope="row"><?= $num; ?></th>
                <td><?= $data['id_order']; ?></td>
                <td><?= $data['nama_penerima']; ?></td>
                <td><?= $data['nama_barang']; ?></td>
                <td><?= $data['qty_pembelian']; ?></td>
                <td>Rp.<?= $data['harga']; ?>,-</td>
                <td>Rp.<?= $data['total']; ?>,-</td>
                <td>Rp.<?= $data['ongkir']; ?>,-</td>
                <td>Rp.<?= $data['total_bersih']; ?>,-</td>
                <td><?= $data['tgl_terbit']; ?></td>
            </tr>
        </tbody>
        <?php }}else{ ?>
            <tr>
                <td class="text-center" colspan="10">Belum Ada Pesanan</td>
            </tr> 
        <?php } ?>
        <tr class="text-center">
            <th colspan="4">TOTAL : </th>
            <td><?= $total_qty; ?></td>
            <td>|</td>
            <td>Rp.<strong><?= $total_tagihan; ?>,-</strong></td>
            <td>|</td>
            <td>Rp.<strong><?= $total_final; ?>,-</strong></td>
            <td></td>
        </tr>
        </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="." class="btn btn-warning float-start m-5"><i class="fas fa-angle-left"></i> Kembali</a>
        <button id="btn" class="btn btn-primary align-self-center m-5" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
    </div>
</body>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</html>