<?php
include 'data-connect.php';

$produk = $_GET['id-produk'];

$set_query = mysqli_query($connection, "UPDATE produk SET status = 'nonaktif' WHERE id_produk = '$produk'");

if($set_query){
    header("location: manage.php?success");
}else{
    echo 'ERROR : '.mysqli_error($connection);
}

?>