<?php
include 'data-connect.php';
session_start();

$user_key = $_SESSION['id'];
$order_id = $_GET['order-data'];
$nama_lengkap = $_GET['name'];
$alamat = $_GET['address'];
$no_telp = $_GET['phone'];
$bill = $_GET['tagihan'];

$query = "UPDATE users SET no_telp = '$no_telp', nama_lengkap = '$nama_lengkap', alamat = '$alamat' WHERE id_user = '$user_key'";
$query_to_users = mysqli_query($connection, $query);

if($query_to_users){
    header("location: add-billing.php?idorder=$order_id&tagihan=$bill");
    exit;
}else {
    echo mysqli_error($connection);
}
?>
