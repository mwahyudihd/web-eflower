//file ini digunakan untuk latihan olah data

<?php include 'connection.php'; session_start(); ?>

<?php
echo 'data';

$query = mysqli_query($connection, "SELECT * FROM users where id_user='111101HD'");
$data = mysqli_fetch_assoc($query);
$dsimpan = $data['id_user'];
echo $dsimpan;
$query = mysqli_query($connection, "SELECT * FROM users JOIN produk ON users.id_user=produk.id_user WHERE produk.id_user='111101HD'");
$data = mysqli_fetch_assoc($query);
print_r($data);//$query = null
$query = mysqli_query($connection, "SELECT * FROM users JOIN produk ON users.id_user=produk.id_user WHERE produk.id_user='111101HD'");
$getData = mysqli_fetch_row($query);
echo $getData[8];

$sesi_id = $_SESSION['id'];

$query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$sesi_id'");
$dt_user = mysqli_fetch_row($query);
print_r($dt_user[6]);
print_r($dt_user[7]);

$sesi = $_SESSION['id'];
$sesi2 = $_SESSION["data"];
echo $sesi.'<br>';
echo $sesi2;

?>