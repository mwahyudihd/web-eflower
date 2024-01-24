<?php
include 'data-connect.php';

$status = $_POST['status'];
$orderid = $_POST['orderid'];

$set_query = "UPDATE cart SET status = '$status' WHERE orderid = '$orderid'";
$query = mysqli_query($connection, $set_query);

if($query){
    header("location: ../admin/admin-order.php?success");
}else{
    echo mysqli_error($connection);
}
?>