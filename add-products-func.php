<?php

include 'data-connect.php';

session_start();
$time_data = time();

$id_users = $_SESSION['id'];

$id_generate = bin2hex(random_bytes(4));
$id_product = strtoupper($id_generate);

$nama = $_POST['product'];
$kategori = $_POST['category'];
$harga = $_POST['price'];
$stok = $_POST['stock'];
$slug_data = $_POST['slug'];
$desc = $_POST['description'];

$tgl = date('y-m-d',$time_data);

$targetDir = "assets/img/product/";
$fileName = basename($_FILES['image']["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = $_FILES['image']['type'];
$file_size = $_FILES['image']['size'];



$query = mysqli_query($connection, "INSERT INTO produk VALUES ( '$id_product', '$nama', '$id_users', '$kategori', '$desc', '$harga', '$targetFilePath', 0, NOW(), '$stok', '$slug_data')");

if($query){
    header("location: manage.php?success");
} else {
    echo "Error: " . $query . "<br>". "<h1>" . mysqli_error($connection) . "</h1>";
}


?>