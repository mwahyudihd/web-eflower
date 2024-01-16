<?php

include 'data-connect.php';
session_start();
$set_id = $_SESSION['id'];
$nama_tk = $_POST['toko'];


$send_data = mysqli_query($connection, "UPDATE users SET nama_user = '$nama_tk' WHERE id_user = '$set_id'");


if($send_data){
    header("location: manage.php?success-info");
}else{
    echo mysqli_error($connection);
}
?>