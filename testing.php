//file ini digunakan untuk latihan olah data

<?php include 'data-connect.php'; session_start(); ?>

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

$dat = mysqli_query($connection, "SELECT * FROM users JOIN produk WHERE users.id_user = '$data'");
$set_data = mysqli_fetch_array($dat);
echo '<br>';
echo '<h2>';
print_r($set_data);
echo '</h2>';
?>