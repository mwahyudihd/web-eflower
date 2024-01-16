<?php
					$katalog = mysqli_query($connection, "SELECT * FROM users JOIN produk WHERE users.id_user = produk.id_user");
					$row = mysqli_num_rows($katalog);
					?>
					<div class="row">
						<?php if($row > 0){
							while($data = mysqli_fetch_array($katalog)){
								?>
						<div class="col-md-6">
							<div class="card mb-3">
								<img
									src="<?php if(empty($data['gambar'])){
										echo 'https://placeholder.co/100x70';
									}else{
										echo $data['gambar'];
									}
									?>
									"
									alt=""
									class="card-img-top" width="300px" height="300px"/>
								<div class="card-body bg-blur">
									<h5 class="card-title"><?= $data['nama_produk'] ?></h5>
									<p class="card-text"><strong>Rp <?= $data['harga'] ?>,-</strong></p>
									<p class="card-text"><strong>Penjual :</strong><?= $data['nama_user'] ?></p>
									<p class="card-text">
										<?php echo substr($data['deskripsi'], 0, 100); ?>
									</p>
									<a href="#" class="badge bg-success non-deco"
										><i class="fas fa-tags"></i> <?php $data['kategori'] ?></a
									>
								</div>
								<div class="card-footer bg-ktg-leaf">
									<form action="cart.php" method="get">
										<div class="input-group">
											<input
												type="number"
												name="jumlah"
												id=""
												class="form-control"
												pattern="[0-9]" />
											<div class="input-group-append">
												<button class="btn btn-success">
													<i class="fas fa-cart-plus"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php	}}?>
					</div>