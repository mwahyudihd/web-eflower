<?php
session_start();
sleep(2.5);
include 'data-connect.php';
if(isset($_POST['request'])){
    $request = $_POST['request'];

    $query = "SELECT * FROM pembayaran JOIN cart ON pembayaran.no_pembayaran = cart.orderid WHERE cart.status = '$request'";
    $result = mysqli_query($connection, $query);
    $set = mysqli_num_rows($result);
}

echo mysqli_error($connection);
?>

<?php
if ($set) {
    while ($set_data = mysqli_fetch_array($result)) {
?>
        <tr>
            <td>
                <a class="non-deco" href="admin-orders-detail.php?orderid=<?= $set_data['no_pembayaran']; ?>">
                    #<?= $set_data['no_pembayaran']; ?>
                </a>
            </td>
            <td><?= $set_data['time_info']; ?></td>
            <td>Rp<?= $set_data['total_tagihan'] + $set_data['ongkir']; ?>,-</td>
            <td>
                <span class="badge <?php
                    if ($set_data['status'] == 'menunggu pembayaran') {
                        echo 'bg-warning text-dark';
                    } elseif ($set_data['status'] == 'menunggu konfirmasi') {
                        echo 'bg-secondary text-white';
                    } elseif ($set_data['status'] == 'dikonfirmasi') {
                        echo 'bg-primary text-white';
                    } elseif ($set_data['status'] == 'dalam pengiriman') {
                        echo 'bg-info text-dark';
                    } elseif ($set_data['status'] == 'selesai') {
                        echo 'bg-success text-white';
                    } elseif ($set_data['status'] == 'dibatalkan' || $set_data['status'] == 'dibatalkan admin' || $data['status'] == 'dibatalkan penjual') {
                        echo 'bg-danger text-white';
                    } else {
                        echo 'bg-light text-dark';
                    }
                ?> rounded-pill text-dark"><?= $set_data['status']; ?></span>
            </td>
            <form action="../functions/send-ongkir.php" method="post">
                <div class="input-group">
                    <td>
                        <input type="text" name="nobayar" value="<?= $set_data['no_pembayaran'] ?>" id="" hidden readonly>
                        <input type="number" class="form-control" name="ongkir" value="<?= $set_data['ongkir']; ?>">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success"><i class="fas fa-circle-check"></i></button>
                    </td>
                </div>
            </form>
        </tr>
<?php
    }
}
?>
