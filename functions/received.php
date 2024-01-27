<?php
include 'data-connect.php';
$orderid = $_POST['data_order'];

$query = mysqli_query($connection, "UPDATE cart SET status = 'barang diterima' WHERE orderid = '$orderid'");

if($query){
    header("location: ../orders.php?success-end");
}else{
    echo mysqli_error($connection);
}
?>