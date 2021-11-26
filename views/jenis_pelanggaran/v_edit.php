<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/addmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- <link rel="stylesheet" type="text/css" href="../assets/vendor/"> -->
    <title>Hello, world!</title>
</head>

<body>

    <?php include '../views/navbar.html' ?>

    <div class="row no-gutters mt-5">

        <?php include '../views/sidebar.html' ?>

        <div class="col-md-10 p-5 pt-3">
            <h4 class="mt-5">Edit Data Tata Tertib</h4>

            <div class="card">
                <div class="card-body">
                    <form action="edit.php?jenis_pelanggaran=<?php echo $data_jenis_pelanggaran['id_jenis_pelanggaran']?>" method="POST">
                        <div class="mb-3">
                            <label for="desc_pelanggaran" class="form-label">Deskripsi Pelanggaran</label>
                            <textarea class="form-control" name="desc_pelanggaran" id="desc_pelanggaran" cols="30" rows="15" required><?php echo $data_jenis_pelanggaran['desc_pelanggaran']?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/addmin.js"></script>
</body>

</html>