<?php
session_start();
include 'data-connect.php';
$current_id = $_SESSION['id'];

$current_date = date('Y-m-d H:i:s');

$kode_transaksi = $_POST['order-id'];
$payment_method = $_POST['payment'];
$tgl_bayar = $_POST['tgl-bayar'];
$payyer = $_POST['atasnama'];
$total_bayar = $_POST['total'];
$total_tagihan = $_POST['total-tagihan-data'];
$note = $_POST['description'];
$id_generate = bin2hex(random_bytes(4));
$id_konfirmasi = strtoupper($id_generate);

$get_product = mysqli_query($connection, "SELECT * FROM detailorder JOIN produk ON detailorder.id_produk = produk.id_produk WHERE detailorder.orderid = '$kode_transaksi'");
$set_product = mysqli_fetch_array($get_product);

$produkid = $set_product['id_produk'];
$id_pemilik_produk = $set_product['id_pemilik'];

$targetDir = "assets/img/payment/";
$fileName = basename($_FILES['set-image']["name"]);
$targetFilePath = $targetDir . $fileName;
$targetFilePathData = '../' . $targetDir . $fileName;
$fileType = $_FILES['set-image']['type'];
$file_size = $_FILES['set-image']['size'];

$query = "INSERT INTO konfirmasi VALUES ('$id_konfirmasi', '$kode_transaksi', '$current_id', '$payment_method', '$payyer', '$tgl_bayar', '$current_date', '$produkid', '$targetFilePath', '$note', '$id_pemilik_produk', '$total_bayar', '$total_tagihan')";

if(move_uploaded_file($_FILES['set-image']["tmp_name"], $targetFilePathData)){
    $send_data = mysqli_query($connection, $query);
    header("location: ../orders.php?success");
}else{
    echo '<h1>';
    echo mysqli_error($connection);
    echo '</h1>';
}
?>