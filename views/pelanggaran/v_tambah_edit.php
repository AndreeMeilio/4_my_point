<?php

$action = "tambah.php";
if (!empty($id_pelanggaran)) $action = "edit.php?id_pelanggaran=" . $id_pelanggaran;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pelanggaran</title>

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
                    <h3><i class="fas fa-fw fa-pencil-ruler mr-3"> </i> Data Pelanggaran </h3>
                    <hr>
                    <div class="col-md-15">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Form Pelanggaran</h5>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="container-fluid">
                                        <form action="<?= @$action ?>" method="POST">
                                            <div class="mb-3">
                                                <label for="tgl_pelanggaran" class="form-label">Tanggal Pelanggaran</label>
                                                <input type="date" class="form-control" id="tgl_pelanggaran" aria-describedby="tgl_pelanggaranHelp" name="tgl_pelanggaran" value="<?= @$data_pelanggaran['tgl_pelanggaran'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id" class="form-label">Nama Siswa</label>
                                                <select class="form-control" name="id" id="id" <?= !empty(@$id_pelanggaran) ? "disabled" : "" ?>>
                                                    <?php while ($item = @$data_siswa->fetch_assoc()) { ?>
                                                        <option <?= @$item['id'] == @$data_pelanggaran['id_siswa'] ? 'selected' : ''
                                                                ?> value="<?= @$item['id'] ?>"><?= @$item['nama'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_jenis_pelanggaran" class="form-label">Pelanggaran</label>
                                                <select class="form-control" name="id_jenis_pelanggaran" id="id_jenis_pelanggaran">
                                                    <option value="" selected disabled>-- Pilih Pelanggaran --</option>
                                                    <?php while ($item = $data_jenis_pelanggaran->fetch_assoc()) { ?>
                                                        <option data-poin="<?= @$item['poin_pelanggaran'] ?>" <?= @$item['id_jenis_pelanggaran'] == @$data_pelanggaran['id_jenis_pelanggaran'] ? 'selected' : ''
                                                                                                                ?> value="<?= @$item['id_jenis_pelanggaran'] ?>"><?= @$item['desc_pelanggaran'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="poin_pelanggaran" class="form-label">Poin Pelanggaran</label>
                                                <input type="text" class="form-control" name="poin" id="poin" value="<?= @$data_pelanggaran['poin_pengurangan'] ?>" disabled>
                                                <input type="text" class="form-control" name="poin_pelanggaran" id="poin_pelanggaran" value="<?= @$data_pelanggaran['poin_pengurangan'] ?>" hidden>
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
    <?php include '../views/logout_modal.html'; ?>
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

            $("#id_jenis_pelanggaran").on("change", (event) => {
                var selected_item = $("#id_jenis_pelanggaran option:selected");

                var poin_pelanggaran = selected_item.data("poin");
                
                var poin = document.querySelector("#poin_pelanggaran");
                poin.value = poin_pelanggaran;

                var poin = document.querySelector("#poin");
                poin.value = poin_pelanggaran;

            })
        });
    </script>
</body>

</html>
<?php
$action = 'tambah.php';
if (!empty($id)) $action = 'edit.php'
?>