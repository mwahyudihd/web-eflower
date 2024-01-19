<?php
session_start();
$sesi_id_for_cart = $_SESSION['id'];
$cart = "SELECT * FROM cart 
JOIN detailorder ON cart.orderid = detailorder.orderid
JOIN produk ON detailorder.id_produk = produk.id_produk WHERE cart.status = 'Cart' AND cart.id_user = '$sesi_id_for_cart'";

$query_conn = mysqli_query($connection, $cart);
$jml_array = mysqli_num_rows($query_conn);
?>