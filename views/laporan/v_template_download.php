<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pelanggaran</title>

    <style>
    </style>
</head>

<body>
    <h1>LAPORAN PELANGGARAN</h1>

    <table>
        <tr>
            <td>Tingkatan</td>
            <td> : </td>
            <td><?= @$data_kelas["tingkatan"]?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td> : </td>
            <td><?= @$data_kelas["nama_kelas"]?></td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td> : </td>
            <td><?= @$data_kelas["awal_tahun_ajaran"]. " / ". @$data_kelas["akhir_tahun_ajaran"]?></td>
        </tr>
    </table>
    <br>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
                <th>TOTAL PELANGGARAN</th>
                <th>POIN TERSISA</th>
                <!-- <th>PELANGGARAN RINGAN</th>
                <th>PELANGGARAN SEDANG</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; while ($item = $query_pelanggaran->fetch_assoc()) { ++$i?>
                <tr>
                    <td><?= @$i?></td>
                    <td><?= @$item["id"]?></td>
                    <td><?= @$item["nama"]?></td>
                    <td><?= @$item["total_pelanggaran"]?></td>
                    <td><?= @$item["poin"]?></td>
                    <!-- <td>2</td> -->
                    <!-- <td>2</td> -->
                </tr>
            <?php } ?>

        </tbody>
    </table>
</body>

</html>