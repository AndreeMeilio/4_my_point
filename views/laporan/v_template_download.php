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
            <td><?= @$data_kelas["tingkatan"] ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td> : </td>
            <td><?= @$data_kelas["nama_kelas"] ?></td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td> : </td>
            <td><?= @$data_kelas["awal_tahun_ajaran"] . " / " . @$data_kelas["akhir_tahun_ajaran"] ?></td>
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
            <?php $i = 0;
            foreach ($hasil as $item) {
                ++$i ?>
                <tr>
                    <td><strong><?= @$i ?></strong></td>
                    <td><strong><?= @$item["nis"] ?></strong></td>
                    <td><strong><?= @$item["nama"] ?></strong></td>
                    <td><strong><?= count(@$item["detail_pelanggaran"]) ?></strong></td>
                    <td><strong><?= @$item["poin"] ?></strong></td>
                    <!-- <td>2</td> -->
                    <!-- <td>2</td> -->
                </tr>
                <hr>
                <tr>
                    <td>Tanggal</td>
                    <td colspan="2">Deskripsi</td>
                    <td>Poin Pengurangan</td>
                </tr>
                <?php foreach ($item['detail_pelanggaran'] as $item_pelanggaran) { ?>
                    <tr>
                        <td><?= @$item_pelanggaran['tgl_pelanggaran'] ?></td>
                        <td  colspan="2"><?= @$item_pelanggaran["desc_pelanggaran"] ?></td>
                        <td><?= @$item_pelanggaran["poin_pengurangan"] ?> poin</td>
                    </tr>
                <?php } ?>
                <hr>
            <?php } ?>

        </tbody>
    </table>
</body>

</html>