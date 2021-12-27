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
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- simple datatable -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">


    <!-- <link rel="stylesheet" type="text/css" href="../assets/vendor/"> -->
    <title>Laporan</title>
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
                    <h3><i class="fas fa-fw fa-download mr-3"></i>Laporan</h3>
                    <hr>
                    <div class="col-md-15 p-5 pt-3">


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Laporan - <?= date("F", strtotime($tanggal_awal))?></h5>
                            </div>
                            <div class="card-body">
                                <form action="index.php">
                                    <label>Pilih Bulan</label>
                                    <div class="row">
                                        <select name="bulan" aria-controls="dataTable" class="form-control form-control-sm col-4 ml-2 mr-3">
                                            <option <?= @$bulan == "01" ? "selected" : ""?> value="01">Januari</option>
                                            <option <?= @$bulan == "02" ? "selected" : ""?> value="02">Februari</option>
                                            <option <?= @$bulan == "03" ? "selected" : ""?> value="03">Maret</option>
                                            <option <?= @$bulan == "04" ? "selected" : ""?> value="04">April</option>
                                            <option <?= @$bulan == "05" ? "selected" : ""?> value="05">Mei</option>
                                            <option <?= @$bulan == "06" ? "selected" : ""?> value="06">Juni</option>
                                            <option <?= @$bulan == "07" ? "selected" : ""?> value="07">Juli</option>
                                            <option <?= @$bulan == "08" ? "selected" : ""?> value="08">Agustus</option>
                                            <option <?= @$bulan == "09" ? "selected" : ""?> value="09">September</option>
                                            <option <?= @$bulan == "10" ? "selected" : ""?> value="10">Oktober</option>
                                            <option <?= @$bulan == "11" ? "selected" : ""?> value="11">November</option>
                                            <option <?= @$bulan == "12" ? "selected" : ""?> value="12">Desember</option>
                                        </select>
                                        <button class="btn btn-success btn-sm col-1">Submit</button>
                                    </div>

                                    <hr>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA KELAS</th>
                                                <th>TOTAL SISWA</th>
                                                <th>TOTAL PELANGGARAN</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            while ($item = $query_kelas->fetch_assoc()) { ?>
                                                <tr>
                                                    <td class="col-1"><?php echo ++$i ?></td>
                                                    <td class="col-4"><?php echo $item['nama_kelas'] ?></td>
                                                    <td class="col-2"><?php echo $item['total_siswa'] ?> siswa</td>
                                                    <td class="col-3"><?php echo $item['total_pelanggaran'] ?> pelanggaran</td>
                                                    <td class="col-2">

                                                        <a class="btn btn-info" href="download.php?id_kelas=<?= @$item["id_kelas"] ?>"><i class="fas fa-fw fa-file-download"></i> Download</a>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
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
            <input type="text" id="id" name="id">
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

    <!-- <script>
        $(document).ready(() => {
            $(document).on("click", ".deleteData",deleteData);

            function deleteData() {
                let id = $(this).val();
                let yakin_hapus = confirm("Apakah anda yakin ingin menghapus data ini??");

                console.log(id, yakin_hapus);
                if (yakin_hapus) {
                    $('#id').val(id);
                    $('#submit_hapus').click();
                }
            }
        });
    </script> -->
</body>

</html>