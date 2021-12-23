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
                <?php include 'views/navbar.html' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="col-md-15 p-5 pt-3">
                        <h3><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h3>
                        <hr>

                        <div class="row text-white">
                            <div class="card bg-primary me-5" style="width: 13rem;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-user-graduate me-2"></i>
                                    </div>
                                    <h5 class="card-title">Siswa</h5>
                                    <div class="display-10">140</div>
                                </div>
                            </div>

                            <div class="card bg-warning me-5" style="width: 13rem;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-user me-2"></i>
                                    </div>
                                    <h5 class="card-title">Admin</h5>
                                    <div class="display-10">1</div>
                                </div>
                            </div>

                            <div class="card bg-success me-5" style="width: 13rem;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-house-user me-2"></i>
                                    </div>
                                    <h5 class="card-title me-5">Kelas</h5>
                                    <div class="display-10">4</div>
                                </div>
                            </div>


                            <div class="card bg-danger" style="width: 13rem;">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="far fa-address-book me-2"></i>
                                    </div>
                                    <h5 class="card-title">Pelanggaran</h5>
                                    <div class="display-10">20</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="card me-5 text-center" style="width: 13rem;">
                                <div class="card-header">
                                    Ananda Zahira
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Point Pelanggaran</p>
                                    <p class="card-text">40</p>
                                    <a href="#" class="btn btn-primary">Lihat Pelanggaran</a>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Content Row -->



                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
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

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

    <!-- simple datatable -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
</body>

</html>