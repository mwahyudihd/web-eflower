<?php
sleep(2.5);
include 'data-connect.php';
session_start();
$currentid = $_SESSION['id'];
if(isset($_POST['data'])){
    $requestData = $_POST['data'];

    $query = "SELECT * FROM produk JOIN users ON produk.id_pemilik = users.id_user WHERE nama_produk LIKE '%$requestData%' AND produk.id_pemilik = '$currentid' AND produk.status = 'aktif' OR kategori LIKE '%$requestData%' AND produk.id_pemilik = '$currentid' AND produk.status = 'aktif'";
    $result = mysqli_query($connection, $query);
    $set = mysqli_num_rows($result);
}else{
    echo mysqli_error($connection);
}
?>
<?php
if ($set) {
    while ($array_produk = mysqli_fetch_array($result)) {
        $img_produk = $array_produk['gambar'];
        $nama_produk = $array_produk['nama_produk'];
        $set_kategori = $array_produk['kategori'];
        $price = $array_produk['harga'];
        $idproduk = $array_produk['id_produk'];
        $stok_barang = $array_produk['qty'];
?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td>
                <p>
                    <img src="<?php
                                if (!empty($img_produk)) {
                                    echo $img_produk;
                                } else {
                                    echo 'https://placehold.co/70x70';
                                } ?>" alt="" width="70" height="70" /> <?php
                                                                    echo $nama_produk ?>
                </p>
            </td>
            <td>
                <span class="badge <?php
                                    if ($set_kategori == 'daun') {
                                        echo 'bg-warning' . ' ' . 'text-dark';
                                    } else if ($set_kategori == 'diair') {
                                        echo 'bg-primary';
                                    } else if ($set_kategori == 'berduri') {
                                        echo 'bg-success';
                                    } else if ($set_kategori == 'bunga') {
                                        echo 'bg-info';
                                    } else {
                                        echo 'bg-secondary';
                                    } ?>"><i class="fas fa-tags"></i> <?= $set_kategori ?></span>
            </td>
            <td>Rp.<?= $price; ?></td>
            <td><?= $stok_barang; ?></td>
            <td>
                <form action="edit-product.php" method="get">
                    <input type="text" value="<?= $idproduk; ?>" name="id-produk" id="" style="display: none;">
                    <a href="edit-product.php">
                        <button class="btn btn-sm">
                            <i class="fas fa-edit text-info"></i>
                        </button>
                    </a>
                </form>
                <form action="functions/del-product.php" method="get">
                    <input type="text" value="<?= $idproduk; ?>" name="id-produk" id="" style="display: none;">
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk?')" class="btn btn-sm">
                        <i class="fas fa-circle-xmark text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
<?php
    }
} else {
?>
    <tr>
        <td colspan="5" class="text-center">
            <h2>Belum ada <span class="text-leaf">Produk</span> yang anda masukkan!</h2>
        </td>
    </tr>
<?php
}
?>
