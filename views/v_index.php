<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/addmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" type="text/css" href="../assets/vendor/"> -->
    <title>Hello, world!</title>
</head>

<body>


    <?php include 'navbar.html'?>

    <div class="row no-gutters mt-5">
        
        <?php include 'sidebar.html'?>

        <div class="col-md-10 p-5 pt-3">
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
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/addmin.js"></script>
</body>

</html>