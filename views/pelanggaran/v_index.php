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
    <title>Data Pelanggaran</title>
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
                    <h3><i class="fas fa-fw fa-pencil-ruler mr-3"> </i>Data Pelanggaran</h3>
                    <hr>
                    <div class="col-md-15">


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <span class="h5 m-0 font-weight-bold text-primary">Data Pelanggaran</span>
                                <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                    <!-- mobile -->
                                    <div class="d-inline d-sm-none">
                                        <a href="tambah.php" class="btn btn-primary" style="float:right;"><i class="fas fa-plus me-2"></i></a>
                                    </div>
                                    <!-- web -->
                                    <div class="d-none d-sm-inline">
                                        <a href="tambah.php" class="btn btn-primary" style="float:right;"><i class="fas fa-plus me-2"> Tambah Pelanggaran</i></a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <!-- tampilan mobile -->
                                <div class="table-responsive d-block d-sm-none">
                                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <!-- <th>NIS</th> -->
                                                <th>NAMA SISWA</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($result as $item) { ?>
                                                <tr>
                                                    <!-- <td class="col-4"><?php //echo $item['id'] ?></td> -->
                                                    <td class="col-9"><?php echo $item['nama'] ?></td>
                                                    <td class="col-1">
                                                        <a href="detail.php?nis=<?php echo $item['id'] ?>" class="btn btn-info m-1">
                                                            <i class="far fa-fw fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- tampilan web -->
                                <div class="table-responsive d-none d-sm-block">
                                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA SISWA</th>
                                                <th>POIN</th>
                                                <th>TOTAL PELANGGARAN</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach($result as $item) { ?>
                                                <tr>
                                                    <td class="col-1"><?php echo ++$i ?></td>
                                                    <td class="col-4"><?php echo $item['nama'] ?></td>
                                                    <td class="col-1"><?php echo $item['poin'] ?></td>
                                                    <td class="col-3"><?php echo $item['total_pelanggaran'] ?> pelanggaran</td>
                                                    <td class="col-2">
                                                        <a href="detail.php?nis=<?php echo $item['id'] ?>" class="btn btn-info m-1">
                                                            <i class="far fa-fw fa-eye"></i> Lihat Detail</a>
                                                        <!-- <form class="d-inline">
                                                            <button type="button" class="btn btn-danger m1 deleteData"  value="<?php // echo $item['id'] 
                                                                                                                                ?>">
                                                                <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                                                    <path fill="#fff" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
                                                                </svg> Delete</button>

                                                                </form> -->
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

    <script>
        $('.dataTable').DataTable();
        // $(document).ready(() => {
        //     $(document).on("click", ".deleteData",deleteData);

        //     function deleteData() {
        //         let id = $(this).val();
        //         let yakin_hapus = confirm("Apakah anda yakin ingin menghapus data ini??");

        //         console.log(id, yakin_hapus);
        //         if (yakin_hapus) {
        //             $('#id').val(id);
        //             $('#submit_hapus').click();
        //         }
        //     }
        // });
    </script>
</body>

</html>