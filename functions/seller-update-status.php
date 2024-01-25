<?php
include 'data-connect.php';
session_start();
$current_id = $_SESSION['id'];
$no_pembayaran = $_POST['orderid'];

$cek_col = mysqli_query($connection, "SELECT * FROM pembayaran JOIN cart ON pembayaran.no_pembayaran = cart.orderid WHERE cart.orderid = '$no_pembayaran'");
$produk_query = mysqli_query($connection, "SELECT * FROM detailorder WHERE orderid = '$no_pembayaran'");
$select = mysqli_fetch_array($cek_col);
$produk = mysqli_fetch_array($produk_query);
$id_produk = $produk['id_produk'];
$id_pembeli = $select['id_user'];
$qty = $produk['qty'];
$nama_pembeli = $select['nama_pembeli'];
$query_tabel_produk = mysqli_query($connection, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$get_array_produk = mysqli_fetch_array($query_tabel_produk);
$id_toko = $get_array_produk['id_pemilik'];
$get_nama_toko = mysqli_query($connection, "SELECT * FROM users WHERE id_user = '$id_toko'");
$set_nama_toko = mysqli_fetch_array($get_nama_toko);
$nama_penjual = $set_nama_toko['nama_user'];
$nama_brg = $get_array_produk['nama_produk'];
$ongkir = $select['ongkir'];
$total_tagihan = $select['total_tagihan'];
$alamat_pembeli = $select['alamat_pembeli'];
$alamat_toko = $set_nama_toko['alamat'];
$total_bersih = $total_tagihan + $ongkir;


if($select['status'] == 'menunggu konfirmasi'){
    $update_data = mysqli_query($connection, "UPDATE cart SET status = 'dikonfirmasi' WHERE orderid = '$no_pembayaran'");
    $create_invoice = mysqli_query($connection, "INSERT INTO kwitansi VALUES (NULL, '$no_pembayaran', '$id_produk', NOW(), 'LUNAS', '$id_pembeli', '$id_toko', '$qty', '$nama_pembeli', '$nama_penjual', '$nama_brg', '$ongkir', '$total_tagihan', '$alamat_pembeli', '$alamat_toko', '$total_bersih')");
    if($create_invoice){
        header("location: ../manage-orders.php?success");
    }else{
        echo mysqli_error($connection);
    }
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
