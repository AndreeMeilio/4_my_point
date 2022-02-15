<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tata Tertib Siswa</title>

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
                    <h3><i class="far fa-address-book mr-3"></i> Data Tata Tertib </h3>
                    <hr>
                    <div class="col-md-15">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <span class="h5 m-0 font-weight-bold text-primary">Daftar Tata Tertib</span>
                                <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                    <!-- mobile -->
                                    <div class="d-inline d-sm-none">
                                        <a href="tambah.php" class="btn btn-primary" style="float:right;"><i class="fas fa-plus me-2"></i></a>
                                    </div>
                                    <!-- web -->
                                    <div class="d-none d-sm-inline">
                                        <a href="tambah.php" class="btn btn-primary" style="float:right;"><i class="fas fa-plus me-2"> Tambah Tata Tertib</i></a>
                                    </div>
                                <?php } ?>
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
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal" 
                                                        data-idjenispelanggaran="<?php echo $item['id_jenis_pelanggaran'] ?>" 
                                                        data-descpelanggaran="<?php echo $item['desc_pelanggaran'] ?>" 
                                                        >more</button>
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
                                                <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                                                    <th colspan="2" scope="col">Opsi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($result as $item)  { ?>
                                                <tr>
                                                    <th class="col-1" scope="row no-gutters m-3"><?php echo ++$i ?></th>
                                                    <td class="col-8"><?php echo $item['desc_pelanggaran'] ?></td>
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

    <!-- modal detail for mobile -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Tata Tertib</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 font-weight-bold">DEKSRIPSI PELANGGARAN</div>
                        <div class="col-12 mb-2 modal-descpelanggaran"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
                        <form class="mr-auto">
                            <button type="button" class="btn btn-danger m1 deleteData modal-delete">
                                <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                    <path fill="#fff" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
                                </svg> Delete
                            </button>
                        </form>
                        <a class="btn btn-success m-1 modal-edit px-4">
                            <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                <path fill="#fff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12H20A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4V2M18.78,3C18.61,3 18.43,3.07 18.3,3.2L17.08,4.41L19.58,6.91L20.8,5.7C21.06,5.44 21.06,5 20.8,4.75L19.25,3.2C19.12,3.07 18.95,3 18.78,3M16.37,5.12L9,12.5V15H11.5L18.87,7.62L16.37,5.12Z" />
                            </svg> Edit
                        </a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>


    <!-- Logout Modal-->
    <?php include '../views/logout_modal.html'; ?>

    <!-- FORM YANG DIPAKAI UNTUK DELETE DATA -->
    <div class="d-none">
        <form action="delete.php" method="POST">
            <input type="text" id="id_jenis_pelanggaran" name="id_jenis_pelanggaran">
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
            // const dataTable = new simpleDatatables.DataTable(".dataTable");

            $(document).on("click", ".deleteData", deleteData);

            function deleteData() {
                let id_jenis_pelanggaran = $(this).val();
                let yakin_hapus = confirm("Apakah anda yakin ingin menghapus data ini??");

                console.log(id_jenis_pelanggaran, yakin_hapus);
                if (yakin_hapus) {
                    $('#id_jenis_pelanggaran').val(id_jenis_pelanggaran);
                    $('#submit_hapus').click();
                }
            }

            $('#detailModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var idjenispelanggaran = button.data('idjenispelanggaran'); // Extract info from data-* attributes
                var descpelanggaran = button.data('descpelanggaran');

                var modal = $(this)
                modal.find('.modal-descpelanggaran').text(descpelanggaran);

                modal.find('.modal-edit').prop('href', 'edit.php?jenis_pelanggaran=' + idjenispelanggaran);
                modal.find('.modal-delete').val(idjenispelanggaran);
            })
        });
    </script>

</body>

</html>