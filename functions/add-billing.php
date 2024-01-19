<?php

$current_time = date('Y-m-d H:i:s');
$expiry_time = date('Y-m-d H:i:s', strtotime($current_time . ' + 23 hour'));
include 'data-connect.php';
session_start();
$user_key = $_SESSION['id'];

$tagihan = $_GET['tagihan'];
$order_id = $_GET['idorder'];

$query_to_order = mysqli_query($connection, "SELECT * FROM users JOIN produk ON users.id_user = produk.id_pemilik JOIN detailorder ON produk.id_produk = detailorder.id_produk JOIN cart ON detailorder.orderid = cart.orderid WHERE cart.id_user = '$user_key' AND cart.status = 'Cart' AND detailorder.orderid = '$order_id';");
$select_data_toko = mysqli_fetch_array($query_to_order);

print_r($select_data_toko);

$no_bayar = $order_id;
$id_user_toko = $select_data_toko['13'];
$current_user = $user_key;
$rek = $select_data_toko['no_rek'];
$nama_toko = $select_data_toko['nama_user'];
$add_tagihan = mysqli_query($connection, "INSERT INTO pembayaran VALUES ('$no_bayar', '$id_user_toko', '$current_user', '$rek', '$tagihan', '$nama_toko', NOW(), '$expiry_time')");

if($add_tagihan){
    echo '<h1>Transaksi Berhasi!</h1>';
    header("location: ../checkout-success.php?no-order=$order_id");
}else{
    echo '<h1>'.mysqli_error($connection).'</h1>';
}

?>