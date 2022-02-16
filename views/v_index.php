<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- simple datatable -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">


    <!-- <link rel="stylesheet" type="text/css" href="assets/vendor/"> -->
    <title>Dashboard</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'views/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'navbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="col-md-15">
                        <h3><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h3>
                        <hr>
                        <!-- Jumlah Tiap Data -->
                        <!-- Content Row -->
                        <div class="row">

                            <?php if ($_SESSION['nama_hak_akses'] === "admin" || $_SESSION['nama_hak_akses'] === "guru") { ?>
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total Data Tata Tertib</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= @$jumlah_tata_tertib ?> Tata Tertib</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-book-reader"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Total Pelanggaran Seluruh Siswa</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= @$pelanggaran ?> Pelanggaran</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-pencil-ruler"> </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Penghargaan Seluruh Siswa
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= @$penghargaan ?> Penghargaan</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-trophy"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($_SESSION['nama_hak_akses'] === "siswa") { ?>
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Poin Anda Saat Ini
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= @$jumlah_poin ?> Poin</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-coins"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pelanggaran Anda
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= @$jumlah_pelanggaran ?> Pelanggaran</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-times"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Poin yang Berkurang
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= @$jumlah_poin_berkurang ?> Poin</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-minus"></i>&nbsp;<i class="fas fa-2x fa-coins"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Penghargaan Anda
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= @$jumlah_penghargaan ?> Penghargaan</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-trophy"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Poin yang Bertambah
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= @$jumlah_poin_bertambah ?> Poin</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-2x fa-plus"></i>&nbsp;<i class="fas fa-2x fa-coins"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>


                        <div class="row">

                            <!-- Pie Chart -->
                            <div class="col-xl-6 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Pelanggaran</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-line pt-4 pb-2">
                                            <canvas id="myLineChart" height="133"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$januari ?> id="januari" />
                                                <!-- <i class="fas fa-circle text-success"></i> Januari -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$februari ?> id="februari" />
                                                <!-- <i class="fas fa-circle text-info"></i> Februari -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$maret ?> id="maret" />
                                                <!-- <i class="fas fa-circle text-info"></i> Maret -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$april ?> id="april" />
                                                <!-- <i class="fas fa-circle text-info"></i> April -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$mei ?> id="mei" />
                                                <!-- <i class="fas fa-circle text-info"></i> Mei -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$juni ?> id="juni" />
                                                <!-- <i class="fas fa-circle text-info"></i> Juni -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$juli ?> id="juli" />
                                                <!-- <i class="fas fa-circle text-info"></i> Juli -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$agustus ?> id="agustus" />
                                                <!-- <i class="fas fa-circle text-info"></i> Agustus -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$september ?> id="september" />
                                                <!-- <i class="fas fa-circle text-info"></i> September -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$oktober ?> id="oktober" />
                                                <!-- <i class="fas fa-circle text-info"></i> Oktober -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$november ?> id="november" />
                                                <!-- <i class="fas fa-circle text-info"></i> November -->
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$desember ?> id="desember" />
                                                <!-- <i class="fas fa-circle text-info"></i> Desember -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-6 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Penghargaan</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart2"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$kota ?> id="kota" />
                                                <i class="fas fa-circle text-warning"></i> Kota
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$provinsi ?> id="provinsi" />
                                                <i class="fas fa-circle text-info"></i> Provinsi
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$nasional ?> id="nasional" />
                                                <i class="fas fa-circle text-primary"></i> Nasional
                                            </span>
                                            <span class="mr-2">
                                                <input type="number" class="d-none" value=<?= @$international ?> id="internasional" />
                                                <i class="fas fa-circle text-success"></i> Internasional
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($_SESSION['nama_hak_akses'] === "admin" || $_SESSION['nama_hak_akses'] === "guru") { ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelas Dan Jumlah Pelanggarannya</h6>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Kelas</th>
                                                <th>Jumlah Pelanggaran</th>
                                                <th>Jumlah Penghargaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($item = $query_kelas->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?= @$item['tingkatan'] . @$item['nama_kelas'] ?> </td>
                                                    <td><?= @$item['total_pelanggaran'] ?> Pelanggaran</td>
                                                    <td><?= @$item['total_penghargaan'] ?> Penghargaan</td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($_SESSION['nama_hak_akses'] === 'siswa') { ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tata Tertib Siswa</h6>
                                </div>

                                <div class="card-body">
                                    <!-- tampilan mobile -->
                                    <div class="table-responsive d-block d-sm-none">
                                        <table class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Deskripsi</th>
                                                    <th colspan="2" scope="col">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($result as $item) { ?>
                                                    <tr>
                                                        <td class="col-8"><?php echo $item['desc_pelanggaran'] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal" data-idjenispelanggaran="<?php echo $item['id_jenis_pelanggaran'] ?>" data-descpelanggaran="<?php echo $item['desc_pelanggaran'] ?>">more</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- tampilan web -->
                                    <div class="table-responsive d-none d-sm-block">
                                        <table class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Poin Pelanggaran</th>
                                                    <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                                        <th colspan="2" scope="col">Opsi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($result as $item) { ?>
                                                    <tr>
                                                        <th class="col-1" scope="row no-gutters m-3"><?php echo ++$i ?></th>
                                                        <td class="col-8"><?php echo $item['desc_pelanggaran'] ?></td>
                                                        <td class="col-1"><?php echo $item['poin_pelanggaran'] ?> poin</td>
                                                        <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                                            <td class="col-3"> <a href="edit.php?jenis_pelanggaran=<?php echo $item['id_jenis_pelanggaran'] ?>" class="btn btn-success px-4">
                                                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                                                        <path fill="#fff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12H20A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4V2M18.78,3C18.61,3 18.43,3.07 18.3,3.2L17.08,4.41L19.58,6.91L20.8,5.7C21.06,5.44 21.06,5 20.8,4.75L19.25,3.2C19.12,3.07 18.95,3 18.78,3M16.37,5.12L9,12.5V15H11.5L18.87,7.62L16.37,5.12Z" />
                                                                    </svg>Edit </a>
                                                                <form class="d-inline">
                                                                    <button type="button" class="btn btn-danger deleteData" value="<?php echo $item['id_jenis_pelanggaran'] ?>"><svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                                                            <path fill="#fff" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
                                                                        </svg> Delete</button>
                                                                </form>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <!-- Content Row -->

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer> -->
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/4_my_point/auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>
    <script src="assets/js/demo/chart-line-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

    <!-- simple datatable -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
</body>

</html>