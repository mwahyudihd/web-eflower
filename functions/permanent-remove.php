<?php
include 'data-connect.php';
session_start();

$produk_id = $_POST['id-produk'];

$query = "DELETE FROM detailorder WHERE id_produk = '$produk_id'";
$action = mysqli_query($connection, $query);

$query2 = "DELETE FROM produk WHERE id_produk = '$produk_id'";
$action2 = mysqli_query($connection, $query2);

if($action2){
    header('location: ../admin/admin-product.php');
}else{
    echo mysqli_error($connection);
}

?>