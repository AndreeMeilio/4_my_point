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

            <a href="tambah.php" class="btn btn-primary mb-4 mt-4" style="float:right;"><i class="fas fa-plus me-2"></i> Tambah Data Siswa</a>
            <table class="table table-striped table-bordered mt-5" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    while ($item = $data_siswa->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo $item['id_guru'] ?></td>
                            <td><?php echo $item['nama'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id_guru=<?php echo $item['id_guru'] ?>">Detail</a>
                                <a class="btn btn-success" href="edit.php?id_guru=<?php echo $item['id_guru'] ?>">Edit</a>
                                <form action="delete.php" method="POST">
                                    <button type="submit" class="btn btn-danger" name="id_guru" value="<?php echo $item['id_guru'] ?>">Delete</button>
                                </form>
                                <!-- <button type="button" class="btn btn-danger deleteData" value="<?php $item['id_siswa'] ?>">Delete</button> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/addmin.js"></script>
    <!-- <script>
        $(document).ready(() => {
            $('.deleteData').on('click', () => {
                const id_siswa = $(this).val();
                const yakin_hapus = confirm("Menghapus data ini juga menghapus akun yang terkait, yakin??");

                if (yakin_hapus){
                    window.localtion.href = "delete.php?id_siswa=" + id_siswa;
                }
            });
        });
    </script> -->
</body>

</html>