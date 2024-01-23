<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="assets/libs/bootstrap/js/color-modes.js"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css-native/app.css" />

</head>
<body>
    <div class="card">
        <div class="card-body">
          <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
              <div class="col-xl-9">
                <p style="color: #7e8d9f;font-size: 20px;">Invoice &gt;&gt; <strong>ID: #<?= 'Orderid'; ?></strong></p>
              </div>
            </div>
            <div class="container">
              <div class="col-md-12">
                <div class="text-center">
                  <i class="far fa-building fa-4x ms-0" style="color:#8f8061 ;"></i>
                  <p class="pt-2">Company Name</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-8">
                  <ul class="list-unstyled">
                    <li class="text-muted">Penerima: <span style="color:#8f8061 ;"><?php ?></span></li>
                    <li class="text-muted">Kota: <?php ?></li>
                    <li class="text-muted">Alamat: Country</li>
                    <li class="text-muted"><i class="fas fa-phone"></i> <?= '123-456-789'; ?></li>
                  </ul>
                </div>
                <div class="col-xl-4">
                  <p class="text-muted">Invoice</p>
                  <ul class="list-unstyled">
                    <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061 ;"></i> <span
                        class="fw-bold">ID:</span>#php echo orderid</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061 ;"></i> <span
                        class="fw-bold">Tanggal Terbit: </span>Jun 23,2021</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061;"></i> <span
                        class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                        LUNAS/DIBATALKAN</span></li>
                  </ul>
                </div>
              </div>
              <div class="row my-2 mx-1 justify-content-center">
                <div class="col-md-2 mb-4 mb-md-0">
                  <div class="
                              bg-image
                              ripple
                              rounded-5
                              mb-4
                              overflow-hidden
                              d-block
                              " data-ripple-color="light">
                    <img src="<?php ?>>"
                      class="w-100" height="100px" alt="Elegant shoes and shirt" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-7 mb-4 mb-md-0">
                  <p class="fw-bold"><?= 'Nama produk'; ?></p>
                  <p class="mb-1">
                    <span class="text-muted me-2">Qty:</span><span><?= 8 ?></span>
                  </p>
                  <p>
                    <span class="text-muted me-2">Kategori:</span><span><?= 'daun'; ?></span>
                  </p>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                  <h5 class="mb-2">
                    <span class="align-middle">Rp<?= '0000,-'; ?></span>
                  </h5>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-8">
                  <p class="ms-3">Add additional notes and payment information</p>
                  <p class="ms-3">Catatan dari penjual</p>
                </div>
                <div class="col-xl-3">
                  <ul class="list-unstyled">
                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1050</li>
                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Ongkir</span>$15</li>
                  </ul>
                  <p class="text-black float-start"><span class="text-black me-3"> Total </span><span
                      style="font-size: 25px;">$1065</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
</html>