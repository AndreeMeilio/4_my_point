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
    <title>Data Siswa</title>
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
                    <h3><i class="fas fa-fw fa-user-graduate mr-3"></i>Data Siswa</h3>
                    <hr>
                    <div class="col-md-15 p-5 pt-3">


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Data Siswa</h5>
                                <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                    <a href="tambah.php" class="btn btn-primary mb-1 mt-1" style="float:right;"><i class="fas fa-plus me-2"></i>Tambah Siswa</a>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <form action="index.php">
                                    <label>Pilih kelas</label>
                                    <div class="row">
                                        <select name="id_kelas" aria-controls="dataTable" class="form-control form-control-sm col-4 ml-2 mr-3">
                                            <?php while ($item = $data_kelas->fetch_assoc()) {?>
                                                <option value="<?= @$item["id_kelas"]?>"><?= @$item["tingkatan"]. " ". @$item["nama_kelas"]?></option>    
                                            <?php }?>
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
                                                <th>NISN</th>
                                                <th>NAMA</th>
                                                <th>POIN</th>
                                                <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                                    <th>OPSI</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            while ($item = $data_siswa->fetch_assoc()) { ?>

                                                <tr>
                                                    <td class="col-1"><?php echo ++$i ?></td>
                                                    <td class="col-3"><?php echo $item['id'] ?></td>
                                                    <td class="col-4"><?php echo $item['nama'] ?></td>
                                                    <td class="col-1"><?php echo $item['poin'] ?></td>
                                                    <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                                        <td class="col-3">
                                                            <a href="edit.php?nis=<?php echo $item['id'] ?>" class="btn btn-success m-1">
                                                                <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                                                    <path fill="#fff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12H20A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4V2M18.78,3C18.61,3 18.43,3.07 18.3,3.2L17.08,4.41L19.58,6.91L20.8,5.7C21.06,5.44 21.06,5 20.8,4.75L19.25,3.2C19.12,3.07 18.95,3 18.78,3M16.37,5.12L9,12.5V15H11.5L18.87,7.62L16.37,5.12Z" />
                                                                </svg> Edit</a>
                                                            <form class="d-inline">
                                                                <button type="button" class="btn btn-danger m1 deleteData" value="<?php echo $item['id'] ?>">
                                                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
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
        $(document).ready(() => {
            $(document).on("click", ".deleteData", deleteData);

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
    </script>
</body>

</html>