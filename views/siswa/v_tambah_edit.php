<?php

$action = "tambah.php";
if (!empty($id_siswa)) $action = "edit.php?nis=". $id_siswa;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Siswa</title>

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
                <?php include '../views/navbar.html' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h3><i class="far fa-address-book me-2"></i> Data Siswa </h3>
                    <hr>
                    <div class="col-md-15 p-5 pt-3">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Form Siswa</h5>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="container-fluid">
                                    <form action="<?= @$action?>" method="POST">
                                            <div class="mb-3">
                                                <label for="nis" class="form-label">Nis Siswa</label>
                                                <input type="text" class="form-control" id="nis" aria-describedby="nisHelp" name="nis" value="<?= @$data_siswa['id_siswa'] ?>" required>
                                                <div id="nisHelp" class="form-text">Nis dipakai sebagai password default untuk akun siswa</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Siswa</label>
                                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= @$data_siswa['email'] ?>" required>
                                                <div id="emailHelp" class="form-text">Email ini juga akan dipakai jika siswa ingin login</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Siswa</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= @$data_siswa['nama'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_kelas" class="form-label">Kelas Siswa</label>
                                                <select class="form-control" name="id_kelas" id="id_kelas">
                                                    <?php while ($item = $data_kelas->fetch_assoc()) { ?>
                                                        <option <?= @$item['id_kelas'] == @$data_siswa['id_kelas'] ? 'selected' : '' ?> value="<?= @$item['id_kelas'] ?>"><?= @$item['tingkatan'] . ' ' . @$item['nama_kelas'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= @$data_siswa['tempat_lahir'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal_lahir" class="form-label">Tanggal_lahir</label>
                                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('Y-m-d', strtotime(@$data_siswa['tanggal_lahir'])) ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin1" class="form-label d-block">Jenis Kelamin</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L" <?= @$data_siswa['jenis_kelamin'] == 'L' ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="jenis_kelamin1">
                                                        Laki-laki
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P" <?= @$data_siswa['jenis_kelamin'] == 'P' ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="jenis_kelamin2">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="agama" class="form-label">Agama</label>
                                                <select name="agama" id="agama" class="form-control">
                                                    <option <?= @$data_siswa['agama'] == 'islam' ? 'selected' : '' ?> value="islam">Islam</option>
                                                    <option <?= @$data_siswa['agama'] == 'kristen_protestan' ? 'selected' : '' ?> value="kristen_protestan">Kristen Protestan</option>
                                                    <option <?= @$data_siswa['agama'] == 'kristen_katolik' ? 'selected' : '' ?> value="kristen_katolik">Kristen Katolik</option>
                                                    <option <?= @$data_siswa['agama'] == 'hindu' ? 'selected' : '' ?> value="hindu">Hindu</option>
                                                    <option <?= @$data_siswa['agama'] == 'budha' ? 'selected' : '' ?> value="budha">Budha</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" required><?= @$data_siswa['alamat'] ?></textarea>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
</body>

</html>
<?php
$action = 'tambah.php';
if (!empty($id_guru)) $action = 'edit.php'
?>