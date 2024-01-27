<?php
session_start();
$sesi_id = $_SESSION['id'];
sleep(2.5);
include 'data-connect.php';
if(isset($_POST['request'])){
    $request = $_POST['request'];

    $query = "SELECT * FROM pembayaran JOIN cart ON pembayaran.no_pembayaran = cart.orderid WHERE pembayaran.id_user_toko = '$sesi_id' AND cart.status = '$request'";
    $result = mysqli_query($connection, $query);
    $set = mysqli_num_rows($result);
}

echo mysqli_error($connection);
?>
<?php
if ($set) {
    $numbers = 0;

    while ($set_data = mysqli_fetch_array($result)) {
        $numbers++;
?>
        <tr class="card-body">
            <td rowspan="2"><?= $numbers; ?></td>
            <td><?= $set_data['nama_pembeli']; ?></td>
            <td>
                <a class="btn btn-primary" href="detail-order-manage.php?orderid=<?= $set_data['no_pembayaran']; ?>">
                    <i class="fas"> <?= $set_data['no_pembayaran']; ?></i>
                </a>
            </td>
            <td><?= $set_data['time_info']; ?></td>
            <td>Rp<?= $set_data['total_tagihan'] + $set_data['ongkir']; ?>,-</td>
            <td>
                <span class="badge <?php
                                    if ($set_data['status'] == 'menunggu pembayaran') {
                                        echo 'bg-warning text-dark';
                                    } else if ($set_data['status'] == 'menunggu konfirmasi') {
                                        echo 'bg-secondary text-white';
                                    } else if ($set_data['status'] == 'dikonfirmasi') {
                                        echo 'bg-primary text-white';
                                    } else if ($set_data['status'] == 'dalam pengiriman') {
                                        echo 'bg-info text-dark';
                                    } else if ($set_data['status'] == 'selesai') {
                                        echo 'bg-success text-white';
                                    } else if ($set_data['status'] == 'dibatalkan' || $set_data['status'] == 'dibatalkan admin' || $set_data['status'] == 'dibatalkan penjual') {
                                        echo 'bg-danger text-white';
                                    } else {
                                        echo 'bg-light text-dark';
                                    } ?> rounded-pill text-dark"><?= $set_data['status']; ?></span>
            </td>
            <td><?= $set_data['alamat_pembeli']; ?></td>
        </tr>
        <tr class="card-footer">
            <th scope="col">Ongkir</th>
            <form action="functions/toko-send-ongkir.php" method="post">
                <div class="input-group">
                    <td>
                        <input type="text" name="nobayar" value="<?= $set_data['no_pembayaran'] ?>" hidden readonly>
                        <input type="number" class="form-control" name="ongkir" value="<?= $set_data['ongkir']; ?>">
                    </td>
                    <td>
                        <?php if ($set_data['status'] == 'menunggu konfirmasi') { ?>
                            <button type="submit" class="btn btn-success"><i class="fas fa-circle-check"></i></button>
                        <?php } else { ?>
                            <button disabled="disabled" class="btn btn-success"><i class="fas fa-circle-check"></i></button>
                        <?php } ?>
                    </td>
                </div>
            </form>
            <td>
                <form action="functions/seller-update-status.php" method="post">
                    <input type="text" name="orderid" id="" value="<?= $set_data['no_pembayaran']; ?>" hidden>
                    <?php if ($set_data['status'] == 'menunggu konfirmasi') { ?>
                        <button type="submit" onclick="return confirm('Anda yakin? \ndata yang telah disubmit tidak bisa diubah kembali.')" class="btn btn-primary"><i class="fas fa-clipboard-check"> konfirmasi</i></button>
                    <?php } elseif ($set_data['status'] == 'dikonfirmasi') { ?>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-receipt"> </i>Set Dikemas</button>
                    <?php } elseif ($set_data['status'] == 'dikemas') { ?>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-truck-fast"> </i>Set Dikirim</button>
                    <?php } elseif ($set_data['status'] == 'barang diterima') { ?>
                        <button disabled="disabled" class="btn rounded-pill bg-warning text-dark"><i class="fas fa-hand-holding"> </i>Diterima</button>
                    <?php } elseif ($set_data['status'] == 'dibatalkan' || $set_data['status'] == 'dibatalkan penjual' || $set_data['status'] == 'dibatalkan admin') { ?>
                        <button disabled="disabled" class="btn btn-danger text-white">Dibatalkan</button>
                    <?php } ?>
                </form>
            </td>
            <td>
                <form action="functions/cenceling-order.php" method="post">
                    <input type="text" name="orderid" id="" value="<?= $set_data['no_pembayaran']; ?>" readonly hidden>
                    <?php if ($set_data['status'] == 'dibatalkan' || $set_data['status'] == 'dibatalkan penjual' || $set_data['status'] == 'dibatalkan admin' || $set_data['status'] == 'barang diterima' || $set_data['status'] == 'selesai' || $set_data['status'] == 'dikirim') { ?>
                        <button disabled="disabled" class="btn btn-danger text-white">dibatalkan</button>
                    <?php } else { ?>
                        <button type="submit" onclick="return confirm('Yakin ingin membatalkan?')" class="btn btn-danger"><i class="fas fa-ban"> </i>batalkan</button>
                    <?php } ?>
                </form>
            </td>
        </tr>
<?php
    }
}
?>
