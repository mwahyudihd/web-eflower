<?php
include 'data-connect.php';
session_start();

$orderid = $_POST['id-order'];
$query_update = mysqli_query($connection, "SELECT * FROM detailorder WHERE orderid = '$orderid'");
$get_produk = mysqli_fetch_array($query_update);
$qty_produk = $get_produk['qty'];
$id_produk = $get_produk['id_produk'];

$restok = mysqli_query($connection, "UPDATE produk SET qty = qty + '$qty_produk' WHERE id_produk = '$id_produk'");

$query = "DELETE FROM detailorder WHERE orderid = '$orderid'";
$action = mysqli_query($connection, $query);

$query2 = "DELETE FROM cart WHERE orderid = '$orderid'";
$action2 = mysqli_query($connection, $query2);

if($action2){
    header('location: ../cart.php');
}else{
    echo mysqli_error($connection);
}

?>