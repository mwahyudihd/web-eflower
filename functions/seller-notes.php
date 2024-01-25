<?php
include 'data-connect.php';
session_start();
$orderid = $_POST['orderid'];
$notes = $_POST['note'];

$query = mysqli_query($connection, "UPDATE konfirmasi SET catatan_penjual = '$notes' WHERE orderid = '$orderid'");

if($query){
    header("location: ../manage-orders.php?success");
}else{
    echo mysqli_error($connection);
}
?>