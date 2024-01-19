<?php
include 'data-connect.php';
session_start();

$orderid = $_POST['id-order'];

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