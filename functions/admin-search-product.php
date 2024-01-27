<?php
sleep(2.5);
include 'data-connect.php';
session_start();
if(isset($_POST['data'])){
    $requestData = $_POST['data'];

    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$requestData%' OR kategori LIKE '%$requestData%'";
    $result = mysqli_query($connection, $query);
    $set = mysqli_num_rows($result);
}else{
    echo mysqli_error($connection);
}
?>
<?php 
$no = 1;
if ($set) {
    while ($array_data = mysqli_fetch_array($result)) {
        $img = $array_data['gambar'];
        $nama = $array_data['nama_produk'];
        $kategori = $array_data['kategori'];
        $price = $array_data['harga'];
        $idprdk = $array_data['id_produk'];
        $stok = $array_data['qty'];
        $milik = $array_data['nama_user'];
        $status = $array_data['status'];
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td>
        <p>
            <img src="../<?php
                if (!empty($img)) {
                    echo $img;
                } else {
                    echo 'https://placehold.co/70x70';
                }?>" alt="" width="70" height="70" /> <?php
                    echo $nama; ?>
        </p>
    </td>
    <td><?php echo $milik; ?></td>
    <td>
        <span class="badge <?php
            if ($kategori == 'daun') {
                echo 'bg-warning'.' '.'text-dark';
            } else if ($kategori == 'diair') {
                echo 'bg-primary';
            } else if ($kategori == 'berduri') {
                echo 'bg-success';
            } else if ($kategori == 'bunga') {
                echo 'bg-info';
            } else {
                echo 'bg-secondary';
            } ?>">
            <i class="fas fa-tags"></i> <?= $kategori ?>
        </span>
    </td>
    <td>Rp.<?= $price; ?></td>
    <td><?= $stok_barang; ?></td>
    <td>
        <form action="../functions/product-manage.php" method="post">
            <input type="text" name="id_produk" id="" value="<?= $idprdk; ?>" hidden readonly>
            <button type="submit" class="btn btn">
                <span class="badge <?php
                    if ($status == 'aktif') {
                        echo 'bg-warning'.' '.'text-dark';
                    } else {
                        echo 'bg-danger';
                    } ?>">
                    <i class="fas 
                        <?php
                        if ($status == 'aktif') {
                            echo 'fa-toggle-on';
                        } else {
                            echo 'fa-toggle-off';
                        } ?>">
                    </i> 
                    <?php
                    if ($status == 'aktif') {
                        echo 'Aktif';
                    } else {
                        echo 'Non-Aktif';
                    } ?>
                </span>
            </button>
        </form>
    </td>
    <td>
        <form action="../functions/permanent-remove.php" method="post">
            <input type="text" value="<?= $idprdk; ?>" name="id-produk" id="" style="display: none;">
            <button type="submit" onclick="return confirm('Yakin ingin menghapus produk secara permanent?')" class="btn btn-sm">
                <i class="fas fa-trash text-danger"></i>
            </button>
        </form>
    </td>
</tr>

<?php
    }
} else {
?>

<tr>
    <td colspan="7" class="text-center fw-300">Data tidak ditemukan!</td>
</tr>

<?php
}
?>
