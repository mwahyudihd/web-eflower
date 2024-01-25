<?php
include 'data-connect.php';
session_start();

$get_number = $_POST['orderid'];

$query = mysqli_query($connection, "UPDATE cart SET status = 'dibatalkan penjual' WHERE orderid = '$get_number'");

if($query){
    header("location: ../manage-orders.php?success");
}else{
    echo mysqli_error($connection);
}

?>