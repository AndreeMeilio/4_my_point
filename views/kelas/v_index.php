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
            <h4 class="mt-5">Data Kelas</h4>

            <a href="tambah.php" class="btn btn-primary mb-4 mt-4" style="float:right;"><i class="fas fa-plus me-2"></i> Tambah Data Kelas</a>
            <table class="table table-striped table-bordered mt-5" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tingkatan </th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    while ($item = $data_kelas->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo $item['tingkatan'] ?></td>
                            <td><?php echo $item['nama_kelas'] ?></td>
                            <td><?php echo $item['awal_tahun_ajaran'] . '/' . $item['akhir_tahun_ajaran'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id_kelas=<?php echo $item['id_kelas'] ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <form action="delete.php" method="POST">
                                <button type="button" class="btn btn-danger deleteData" value="<?php echo $item['id_kelas']?>"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- FORM YANG DIPAKAI UNTUK DELETE DATA -->
    <div class="d-none">
        <form action="delete.php" method="POST">
            <input type="text" id="id_kelas" name="id_kelas">
            <button type="submit" id="submit_hapus"></button>
        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/addmin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(() => {
            $('.deleteData').click(deleteData);

            function deleteData(){
                let id_kelas = $(this).val();
                let yakin_hapus = confirm("Apakah anda yakin ingin menghapus data ini??");

                console.log(id_kelas, yakin_hapus);
                if (yakin_hapus){
                    $('#id_kelas').val(id_kelas);
                    $('#submit_hapus').click();
                }
            }
        });
    </script>
</body>

</html>