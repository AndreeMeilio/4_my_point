<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kelas</title>

    <!-- Custom fonts for this template -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- simple datatable -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../views/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../views/navbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h3><i class="far fa-address-book me-2"></i>Profile</h3>
                    <hr />
                    <div class="col-md-15 p-5 pt-3">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary"> Data Profile </h5>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="py-3">
                                        <span class="d-block text-gray-900">
                                            <?= @$data_profile['nama'] . "-" . strtoupper(@$_SESSION["nama_hak_akses"]); ?>
                                        </span>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-4 mb-2">
                                            <span class="text-gray-800">Email</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-gray-800"> : <?= @$data_profile["email"] ?></span>
                                        </div>
                                        <?php if ($_SESSION['nama_hak_akses'] === "siswa") { ?>
                                            <div class="col-4 mb-2">
                                                <span class="text-gray-800">Kelas</span>
                                            </div>
                                            <div class="col-8">
                                                <span class="text-gray-800">
                                                    :
                                                    <?= @$data_profile['tingkatan'] . " " . @$data_profile["nama_kelas"] ?>

                                                </span>
                                            </div>
                                        <?php } ?>
                                        <div class="col-4 mb-2">
                                            <span class="text-gray-800">Tempat Lahir</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-gray-800"> : <?= @$data_profile['tempat_lahir'] ?></span>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <span class="text-gray-800">Tanggal Lahir</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-gray-800"> : <?= date("j F Y", strtotime(@$data_profile['tanggal_lahir'])) ?></span>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <span class="text-gray-800">Jenis Kelamin</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-gray-800"> : <?= @$data_profile['jenis_kelamin'] === "L" ? "Laki laki" : "Perempuan" ?></span>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <span class="text-gray-800">Agama</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-gray-800"> : <?= ucwords(@$data_profile["agama"]) ?></span>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <span class="text-gray-800">Nomor Telepon</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-gray-800"> : <?= @$data_profile["no_telepon"] ?></span>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <span class="text-gray-800">Alamat</span>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-gray-800"> : <?= @$data_profile["alamat"] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-info px-4" href="edit.php?id_entity=<?= @$data_profile["id_entity"] ?>">Edit Profile</a>
                                <a class="btn btn-info" href="change_password.php?id_entity=<?= @$data_profile["id_entity"] ?>">Ganti Password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include '../views/logout_modal.html'; ?>
    <!-- FORM YANG DIPAKAI UNTUK DELETE DATA -->
    <div class="d-none">
        <form action="delete.php" method="POST">
            <input type="text" id="id_kelas" name="id_kelas">
            <button type="submit" id="submit_hapus"></button>
        </form>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

    <!-- simple datatable -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

</body>

</html>