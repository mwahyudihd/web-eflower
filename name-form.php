<?php

include 'data-connect.php';
session_start();
$set_id = $_SESSION['id'];
$nama_tk = $_POST['edited-nama-toko'];


$send_data = mysqli_query($connection, "UPDATE users SET nama_user = '$nama' WHERE id_user = '$iduser'");


if($send_data){
    header("location: manage.php?success+info");
    $send_data = mysqli_query($connection, "UPDATE users SET nama_user = '$nama' WHERE id_user = '$iduser'");
}else{
    echo mysqli_error($connection);
}
?>