<?php
$action = 'tambah.php';
if (!empty($id_kelas)) $action = 'edit.php'
?>
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
            <h4 class="mt-5">Tambah Data Kelas</h4>

            <div class="card">
                <div class="card-body">
                    <form action="<?= $action ?>" method="POST">
                        <div class="mb-3">
                            <label for="tingkatan" class="form-label">Tingkatan</label>
                            <select class="form-control" name="tingkatan" id="tingkatan">
                                <option value="" disabled selected>Pilih Tingkatan</option>
                                <option value="X" <?= @$kelas['tingkatan'] == 'X' ? 'selected' : '' ?>>X</option>
                                <option value="XI" <?= @$kelas['tingkatan'] == 'XI' ? 'selected' : '' ?>>XI</option>
                                <option value="XII" <?= @$kelas['tingkatan'] == 'XII' ? 'selected' : '' ?>>XII</option>
                                <option value="XIII" <?= @$kelas['tingkatan'] == 'XIII' ? 'selected' : '' ?>>XIII</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" aria-describedby="nama_kelasHelp" name="nama_kelas" value="<?= @$kelas['nama_kelas'] ?>" required>
                            <div id="nama_kelasHelp" class="form-text">Isi dengan contoh seperti "Rekayasa Perangkat Lunak 3" atau "Ilmu Pengetahuan Alam 1" atau yang sejenisnya.</div>
                        </div>
                        <div class="mb-3">
                            <label for="awal_tahun_ajaran" class="form-label">Awal Tahun Ajaran</label>
                            <input type="number" class="form-control" id="awal_tahun_ajaran" aria-describedby="awal_tahun_ajaranHelp" name="awal_tahun_ajaran" min="1900" max="2099" step="1" value="<?= @$kelas['awal_tahun_ajaran'] ?>" required>
                            <div id="awal_tahun_ajaranHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="akhir_tahun_ajaran" class="form-label">Akhir Tahun Ajaran</label>
                            <input type="number" class="form-control" id="akhir_tahun_ajaran" aria-describedby="akhir_tahun_ajaranHelp" name="akhir_tahun_ajaran" min="1900" max="2099" step="1" value="<?= @$kelas['akhir_tahun_ajaran'] ?>" required>
                            <div id="akhir_tahun_ajaranHelp" class="form-text"></div>
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