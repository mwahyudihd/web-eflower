<?php
session_start();
include 'data-connect.php';
if (isset($_SESSION["user_mail"]) == NULL) {
    header('location: ../form.php?info');
    exit;
}
$user_id = $_SESSION['id'];
$id_produk = $_GET['id-produk'];
$qty = $_GET['jumlah'];

if(isset($_GET['jumlah']) <= 0 ){
    header("location: ../home.php?error");
}

$id_generate = bin2hex(random_bytes(5));
$id_main = strtoupper($id_generate);

$id_generate2 = bin2hex(random_bytes(4));
$id_order = strtolower($id_generate2);




$query = mysqli_query($connection, "INSERT INTO detailorder VALUES ('$id_main', '$id_order', '$id_produk', '$qty')");
$query_cart = mysqli_query($connection, "INSERT INTO cart VALUES (NULL, '$id_order', '$user_id', NOW(), 'Cart')");

if($query_cart){
    header("location: ../cart.php");
}else{
    echo mysqli_error($connection);
}

?>