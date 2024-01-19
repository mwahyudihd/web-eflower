<?php
					$katalog = mysqli_query($connection, "SELECT * FROM users JOIN produk WHERE users.id_user = produk.id_pemilik AND produk.status = 'aktif' AND produk.id_pemilik != '$sesi_id'");
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
									<p class="card-text"><strong>Penjual : </strong><?= $data['nama_user'] ?></p>
									<p class="card-text">
										<?php echo substr($data['deskripsi'], 0, 100); ?>
									</p>
									<a href="#" class="badge <?php if($data['kategori'] == 'daun'){
                                                    echo 'bg-warning'.' '.'text-dark';
                                                }else if($data['kategori'] == 'diair'){
                                                    echo 'bg-primary';
                                                }else if ($data['kategori'] == 'berduri'){
                                                    echo 'bg-success';
                                                }else if($data['kategori'] == 'bunga'){
                                                    echo 'bg-info';
                                                }else{
                                                    echo 'bg-secondary';
                                                } ?> non-deco"
										><i class="fas fa-tags"></i> <?= $data['kategori'] ?></a
									> <span class="d-flex justify-content-center">STOK : <?= $data['qty'] ?></span>
                                    <p class="float-end"><strong>Kota : <?= $data['kota'] ?></strong></p>
								</div>
								<div class="card-footer bg-ktg-leaf">
									<form action="functions/insert-to-cart.php" method="get">
										<div class="input-group">
                                            <input type="text" style="display: none;" value="<?= $data['id_produk'] ?>" name="id-produk" id="">
											<input
												type="number"
												name="jumlah"
                                                value="1"
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