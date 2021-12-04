<?php
$action = 'tambah.php';
if (!empty($id_guru)) $action = 'edit.php'
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
            <h4 class="mt-5">Tambah Data Guru</h4>

            <div class="card">
                <div class="card-body">
                    <form action="<?= $action ?>" method="POST">
                        <div class="mb-3">
                            <label for="id_guru" class="form-label">NIP/NUPTK Guru</label>
                            <input type="text" class="form-control" id="id_guru" aria-describedby="id_guruHelp" name="id_guru" value="<?= @$guru['id_guru']?>" required>
                            <div id="id_guruHelp" class="form-text">NIP/NUPTK dipakai sebagai password default untuk akun guru</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Guru</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= @$guru['email']?>" required>
                            <div id="emailHelp" class="form-text">Email ini juga akan dipakai jika siswa ingin login</div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= @$guru['nama']?>" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= @$guru['tempat_lahir']?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal_lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= @$guru['tanggal_lahir']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin1" class="form-label d-block">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L" <?= @$guru['jenis_kelamin'] == 'L' ? 'checked' : '' ?> required>
                                <label class="form-check-label" for="jenis_kelamin1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P" <?= @$guru['jenis_kelamin'] == 'P' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="jenis_kelamin2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="" selected disabled>Pilih Agama</option>
                                <option value="islam" <?= @$guru['agama'] == 'islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="kristen_protestan" <?= @$guru['agama'] == 'kristen_protestan' ? 'selected' : '' ?>>Kristen Protestan</option>
                                <option value="kristen_katolik" <?= @$guru['agama'] == 'kristen_katolik' ? 'selected' : '' ?>>Kristen Katolik</option>
                                <option value="hindu" <?= @$guru['agama'] == 'hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="budha" <?= @$guru['agama'] == 'budha' ? 'selected' : '' ?>>Budha</option>
                                <option value="konghucu" <?= @$guru['agama'] == 'konghucu' ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" min="0" value="<?= @$guru['no_telepon']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" required><?= @$guru['alamat']?></textarea>
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