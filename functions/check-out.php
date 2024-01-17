<?php
include 'data-connect.php';
session_start();

$user_key = $_SESSION['id'];
$order_id = $_GET['order-data'];
$nama_lengkap = $_GET['name'];
$alamat = $_GET['address'];
$no_telp = $_GET['phone'];
$bill = $_GET['tagihan'];

echo mysqli_error($connection);

$query = "UPDATE users SET nama_lengkap = $nama_lengkap, alamat = $alamat, no_telp = $no_telp WHERE id_user = $user_key";
$query_to_users = mysqli_query($connection, $query);
$data_user = mysqli_fetch_array($query_to_users);

if(!$query_to_users){
    header("location: add-billing.php?idorder=<?php echo $order_id; ?>&tagihan=<?php echo $bill; ?>");
}else {
    echo mysqli_error($connection);
}

?>