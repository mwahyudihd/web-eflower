<?php
include 'data-connect.php';
session_start();

$ongkir = $_POST['ongkir'];
$orderid = $_POST['nobayar'];

$query_text = "UPDATE pembayaran SET ongkir = '$ongkir' WHERE no_pembayaran = '$orderid'";
$send_query = mysqli_query($connection, $query_text);

if($send_query){
    header("location: ../manage-orders.php?success");
}else{
    echo mysqli_error($connection);
}

?>