<?php
sleep(2.5);
include 'data-connect.php';
session_start();
$current_id = $_SESSION['id'];
if(isset($_POST['data'])){
    $requestData = $_POST['data'];

    $query = "SELECT * FROM users WHERE nama_lengkap LIKE '%$requestData%' AND id_user != '$current_id' OR nama_user LIKE '%$requestData%' AND id_user != '$current_id'";
    $result = mysqli_query($connection, $query);
    $set = mysqli_num_rows($result);
}else{
    echo mysqli_error($connection);
}
?>
<?php
	$num_row = 0; 
	if($set){
		while($data_set = mysqli_fetch_assoc($result)) {
			$num_row++;
?>
<tr>
	<td><?= $num_row; ?></td>
	<td>
		<p>
		    <img src="<?php if(empty($data_set['foto'])) { ?> ../assets/img/profile/user-profile.png <?php } else { ?> ../<?= $data_set['foto']; ?> <?php } ?>" width="70" height="70" alt="profil" class="rounded-pill" /> <?= $data_set['nama_lengkap']; ?>
		</p>
	</td>
	<td><?php if(empty($data_set['nama_user'])) {
		echo 'Belum Membuka Toko';
		} else {
			echo $data_set['nama_user'];
		} ?>
    </td>
	<td><?= $data_set['user_mail']; ?></td>
	<td>
		<form action="../functions/update-user.php" method="post">
			<input type="text" name="id_user" readonly value="<?= $data_set['id_user']; ?>" hidden>
			<div class="input-group">
					<select class="form-control" name="role" id="">
						<option value="" disabled selected><?= $data_set['role']; ?></option>
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				<div class="input-group-append">
				    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
			    </div>
		    </div>										
		</form>
	</td>
	<td>
		<form action="../functions/update-user.php" method="post">
			<input type="text" name="id_user" readonly value="<?= $data_set['id_user']; ?>" hidden>
			<div class="input-group">
				<select class="form-control" name="stat" id="">
					<option value="" disabled selected><?= $data_set['status_user']; ?></option>
					<option value="aktif">Aktif</option>
					<option value="nonaktif">Non-Aktif</option>	
				</select>
				<div class="input-group-append">
					<button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
				</div>
			</div>
	    </form>
	</td>
</tr>
<?php }}else{
    echo '<td colspan="6"><h3 class="text-center">User Tidak Ditemukan</h3></td>';
} ?>