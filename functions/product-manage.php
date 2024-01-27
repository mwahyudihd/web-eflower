<?php
include 'data-connect.php';
session_start();
$id_produk = $_POST['id_produk'];

$query = mysqli_query($connection, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$data_selection = mysqli_fetch_array($query);
if($data_selection['status'] == 'aktif'){
    $update = mysqli_query($connection, "UPDATE produk SET status = 'nonaktif' WHERE id_produk = '$id_produk'");
    header("location: ../admin/admin-product.php?success");
}else{
    $update = mysqli_query($connection, "UPDATE produk SET status = 'aktif' WHERE id_produk = '$id_produk'");
    header("location: ../admin/admin-product.php?success");
}

?>