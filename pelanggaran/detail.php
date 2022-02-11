<?php

include '../lib/library.php';
cekLogin();

$id = @$_GET["nis"];

$sql_siswa = "SELECT siswa.*, kelas.* FROM siswa
            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            WHERE id = '". $id. "'";

$query_siswa = $mysqli->query($sql_siswa) or die();

$data_siswa = $query_siswa->fetch_assoc();

$sql_pelanggaran = "SELECT pelanggaran.*, jenis_pelanggaran.* FROM pelanggaran
                    LEFT JOIN jenis_pelanggaran ON pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran
                    WHERE pelanggaran.id_siswa = '". $id."'";
$query_pelanggaran = $mysqli->query($sql_pelanggaran) or die($mysqli->error);

$sql_jumlah_pelanggaran = "SELECT COUNT(id_siswa) as total_pelanggaran, 
                        (SELECT COUNT(id_siswa) FROM pelanggaran WHERE kategori_pelanggaran='ringan' AND id_siswa='". $id ."') as pelanggaran_ringan, 
                        (SELECT COUNT(id_siswa) FROM pelanggaran WHERE kategori_pelanggaran='sedang' AND id_siswa='". $id ."') as pelanggaran_sedang FROM pelanggaran WHERE id_siswa = '". $id ."';";

$query_jumlah_pelanggaran = $mysqli->query($sql_jumlah_pelanggaran) or die($mysqli->error);
$data_jumlah_pelanggaran = $query_jumlah_pelanggaran->fetch_assoc();

$result_pelanggaran = [];
while ($res = $query_pelanggaran->fetch_assoc()){
    $result_pelanggaran[] = $res;
}

include '../views/pelanggaran/v_detail.php';
