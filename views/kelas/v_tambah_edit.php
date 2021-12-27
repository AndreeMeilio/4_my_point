<?php

$action = 'tambah.php';
if (!empty($id_kelas)) $action = 'edit.php?id_kelas='.$id_kelas;

?>
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

<body id="page-top">


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
                    <h3><i class="fas fa-fw fa-house-user mr-3"></i> Data Kelas </h3>
                    <hr>
                    <div class="col-md-15 p-5 pt-3">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Form Kelas</h5>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="container-fluid">
                                        <form action="<?= $action ?>" method="POST">
                                            <div class="mb-3">
                                                <label for="tingkatan" class="form-label">Tingkatan</label>
                                                <select class="form-control" name="tingkatan" id="tingkatan">
                                                    <option value="" disabled selected>Pilih Tingkatan</option>
                                                    <option value="X" <?= @$kelas['tingkatan'] == 'X' ? 'selected' : '' ?>>X</option>
                                                    <option value="XI" <?= @$kelas['tingkatan'] == 'XI' ? 'selected' : '' ?>>XI</option>
                                                    <option value="XII" <?= @$kelas['tingkatan'] == 'XII' ? 'selected' : '' ?>>XII</option>
                                                    <option value="XIII" <?= @$kelas['tingkatan'] == 'XIII' ? 'selected' : '' ?>>XIII</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                                <input type="text" class="form-control" id="nama_kelas" aria-describedby="nama_kelasHelp" name="nama_kelas" value="<?= @$kelas['nama_kelas'] ?>" required>
                                                <div id="nama_kelasHelp" class="form-text">Isi dengan contoh seperti "Rekayasa Perangkat Lunak 3" atau "Ilmu Pengetahuan Alam 1" atau yang sejenisnya.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="awal_tahun_ajaran" class="form-label">Awal Tahun Ajaran</label>
                                                <input type="number" class="form-control" id="awal_tahun_ajaran" aria-describedby="awal_tahun_ajaranHelp" name="awal_tahun_ajaran" min="1900" max="2099" step="1" value="<?= @$kelas['awal_tahun_ajaran'] ?>" required>
                                                <div id="awal_tahun_ajaranHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="akhir_tahun_ajaran" class="form-label">Akhir Tahun Ajaran</label>
                                                <input type="number" class="form-control" id="akhir_tahun_ajaran" aria-describedby="akhir_tahun_ajaranHelp" name="akhir_tahun_ajaran" min="1900" max="2099" step="1" value="<?= @$kelas['akhir_tahun_ajaran'] ?>" required>
                                                <div id="akhir_tahun_ajaranHelp" class="form-text"></div>
                                            </div>
                                            <a class="btn btn-danger px-3" href="./">Back</a>
                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include '../views/logout_modal.html';?>
    
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
</body>

</html>