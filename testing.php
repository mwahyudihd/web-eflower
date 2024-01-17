//file ini digunakan untuk latihan olah data

<?php include 'functions/data-connect.php'; 
session_start(); ?>

<?php
// echo 'data';

// $query = mysqli_query($connection, "SELECT * FROM users where id_user='111101HD'");
// $data = mysqli_fetch_assoc($query);
// $dsimpan = $data['id_user'];
// echo $dsimpan;
// $query = mysqli_query($connection, "SELECT * FROM users JOIN produk ON users.id_user=produk.id_user WHERE produk.id_user='111101HD'");
// $data = mysqli_fetch_assoc($query);
// print_r($data);//$query = null
// $query = mysqli_query($connection, "SELECT * FROM users JOIN produk ON users.id_user=produk.id_user WHERE produk.id_user='111101HD'");
// $getData = mysqli_fetch_row($query);
// echo $getData[8];

// $sesi_id = $_SESSION['id'];

// $query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$sesi_id'");
// $dt_user = mysqli_fetch_row($query);
// print_r($dt_user[6]);
// print_r($dt_user[7]);

// $sesi = $_SESSION['id'];



// $sesi_id = $_SESSION['id'];
// // echo $sesi_id;

// $query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$sesi_id'");
// $dt_user = mysqli_fetch_array($query);

// 
// //array id sesi
// <?php
// print_r($dt_user);
// $s = $dt_user['no_rek'];
// echo $s;

// $display_produk = mysqli_query($connection, "SELECT * FROM produk WHERE id_user = '$sesi_id'");

// $array_data = mysqli_fetch_array($display_produk);

// if(!empty($array_data)){
//     echo '<h1>';
//     print_r ($array_data);
//     echo '</h1>';
// }else{
//     echo '<h1>'.'Produk Dengan ID'.'<strong>'.$sesi_id.'</strong>'.'TIDAK TERSEDIA'.'</h1>';
// }


// $id_generate = bin2hex(random_bytes(4));
// $id_generate = strtoupper($id_generate);
// echo '<h1>'.$id_generate.'</h1>';

// $data = $_SESSION['id'];
// $display_produk = mysqli_query($connection, "SELECT * FROM produk WHERE id_user = '$data'");
// $no = 1;
// while($array_produk = mysqli_fetch_array($display_produk)){
//     $img_produk = $array_produk['gambar'];
//     $nama_produk = $array_produk['nama_produk'];
//     $set_kategori = $array_produk['kategori'];
//     $price = $array_produk['harga'];
//     $stok_barang = $array_produk['qty'];
// }

// $jml_data = mysqli_num_rows($array_produk);
// echo $jml_data;

$data = $_SESSION['nama'];

$id_data = $_SESSION['id'];

// $id_generate = bin2hex(random_bytes(5));
// $id_main = strtoupper($id_generate);
// $id_generate2 = bin2hex(random_bytes(4));
// $id_order = strtolower($id_generate2);

// $idgenerate = bin2hex(random_bytes(4));

// $id_cart = strtoupper($id_generate);

// $dat = mysqli_query($connection, "SELECT * FROM users JOIN produk WHERE users.id_user = '$data'");
// $set_data = mysqli_fetch_array($dat);

// $query = mysqli_query($connection, "SELECT * FROM detailorder 
// JOIN cart ON detailorder.orderid = cart.orderid 
// JOIN produk ON produk.id_produk = detailorder.id_produk 
// WHERE cart.id_user = '964F05A1'");

// $query2 = mysqli_query($connection, "SELECT * FROM detailorder 
// JOIN cart ON detailorder.orderid = cart.orderid 
// WHERE cart.id_user = '964F05A1'");

// $data = mysqli_fetch_array($query);
// $data2 = mysqli_fetch_array($query2);
// $cek_row = mysqli_num_rows($query);



// echo '<br>';
// echo '<h2>';
// print_r($set_data);
// echo '</h2>';
// echo '<br>'.'<h1>'. $id_main . '\n' .'</h1>';
// echo '<br>'.'<h6>';
// if($cek_row > 0){
//     print_r($data); 
// }

$query = mysqli_query($connection, "SELECT * FROM pembayaran WHERE no_pembayaran='27a7a276'");
$data = mysqli_fetch_array($query);

echo '</h6>';
echo '<br>'.'<h3>';
print_r($data) ;
echo '</h3>';
?>