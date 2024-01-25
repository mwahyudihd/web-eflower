<?php
include 'data-connect.php';
session_start();
$no_pembayaran = $_POST['orderid'];

$cek_col = mysqli_query($connection, "SELECT * FROM pembayaran JOIN cart ON pembayaran.no_pembayaran = cart.orderid WHERE cart.orderid = '$no_pembayaran'");
$select = mysqli_fetch_array($cek_col);

if($select['status'] == 'menunggu konfirmasi'){
    $update_data = mysqli_query($connection, "UPDATE cart SET status = 'dikonfirmasi' WHERE orderid = '$no_pembayaran'");
    $create_invoice = mysqli_query($connection, "INSERT INTO kwitansi VALUES (NULL, '$no_pembayaran', )");
    header("location: ../manage-orders.php?success");
}elseif($select['status'] == 'dikonfirmasi'){
    $update_data = mysqli_query($connection, "UPDATE cart SET status = 'dikemas' WHERE orderid = '$no_pembayaran'");
    header("location: ../manage-orders.php?success");
}elseif($select['status'] == 'dikemas'){
    $update_data = mysqli_query($connection, "UPDATE cart SET status = 'dikirim' WHERE orderid = '$no_pembayaran'");
    header("location: ../manage-orders.php?success");
}else{
    header("location: ../manage-orders.php?success");
}
?>
