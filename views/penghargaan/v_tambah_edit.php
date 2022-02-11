<?php

$action = "tambah.php";
if (!empty($id_penghargaan)) $action = "edit.php?id_penghargaan=" . $id_penghargaan;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penghargaan</title>

    <!-- Custom fonts for this template -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- simple datatable -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                    <h3><i class="fas fa-fw fa-trophy mr-3"></i> Data Penghargaan </h3>
                    <hr>
                    <div class="col-md-15">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Form Penghargaan</h5>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="container-fluid">
                                        <form action="<?= @$action ?>" method="POST">
                                            <div class="mb-3">
                                                <label for="id" class="form-label">Nama Siswa</label>
                                                <select class="form-control" name="id" id="id" <?= !empty(@$id_penghargaan) ? "disabled" : "" ?>>
                                                    <?php while ($item = @$data_siswa->fetch_assoc()) { ?>
                                                        <option <?= @$item['id'] == @$data_penghargaan['id_siswa'] ? 'selected' : ''
                                                                ?> value="<?= @$item['id'] ?>"><?= @$item['nama'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_penghargaan" class="form-label">Nama Penghargaan</label>
                                                <input type="text" class="form-control" id="nama_penghargaan" aria-describedby="nama_penghargaanHelp" name="nama_penghargaan" value="<?= @$data_penghargaan['nama_penghargaan'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                                <input type="text" class="form-control" id="penyelenggara" aria-describedby="penyelenggaraHelp" name="penyelenggara" value="<?= @$data_penghargaan['penyelenggara'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tingkat" class="form-label">Tingkat</label>
                                                <select class="form-control" name="tingkat" id="tingkat">
                                                    <option <?= @$data_penghargaan["tingkat"] == "kota" ? "selected" : "" ?> value="kota">Kota</option>
                                                    <option <?= @$data_penghargaan["tingkat"] == "provinsi" ? "selected" : "" ?> value="provinsi">Provinsi</option>
                                                    <option <?= @$data_penghargaan["tingkat"] == "nasional" ? "selected" : "" ?> value="nasional">Nasional</option>
                                                    <option <?= @$data_penghargaan["tingkat"] == "international" ? "selected" : "" ?> value="international">Internasional</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="peringkat" class="form-label">Peringkat</label>
                                                <input type="text" class="form-control" id="peringkat" aria-describedby="peringkatHelp" name="peringkat" value="<?= @$data_penghargaan['peringkat'] ?>" required>
                                                <div class="form-text" id="peringkatHelp">Contoh: Satu, Harapan Satu</div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> 
    <script>
        $(document).ready(() => {
            $("#id").select2();
        });
    </script>
</body>

</html>
<?php
$action = 'tambah.php';
if (!empty($id)) $action = 'edit.php'
?>