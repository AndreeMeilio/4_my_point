<?php

include '../lib/library.php';
cekLogin();

$id = @$_GET["nis"];

$sql_siswa = "SELECT siswa.*, kelas.* FROM siswa
            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            WHERE id = '". $id. "'";

$query_siswa = $mysqli->query($sql_siswa) or die();

$data_siswa = $query_siswa->fetch_assoc();

$sql_penghargaan = "SELECT * FROM penghargaan
                    WHERE id_siswa = '". $id."'";
$query_penghargaan = $mysqli->query($sql_penghargaan) or die($mysqli->error);

$sql_jumlah_penghargaan = "SELECT COUNT(id_siswa) as total_penghargaan, 
                        (SELECT COUNT(id_siswa) FROM penghargaan WHERE tingkat='kota' AND id_siswa='". $id ."') as tingkat_kota, 
                        (SELECT COUNT(id_siswa) FROM penghargaan WHERE tingkat='provinsi' AND id_siswa='". $id ."') as tingkat_provinsi, 
                        (SELECT COUNT(id_siswa) FROM penghargaan WHERE tingkat='nasional' AND id_siswa='". $id ."') as tingkat_nasional, 
                        (SELECT COUNT(id_siswa) FROM penghargaan WHERE tingkat='international' AND id_siswa='". $id ."') as tingkat_internasional
                        FROM penghargaan WHERE id_siswa = '". $id ."';";

$query_jumlah_penghargaan = $mysqli->query($sql_jumlah_penghargaan) or die($mysqli->error);
$data_jumlah_penghargaan = $query_jumlah_penghargaan->fetch_assoc();

$result = [];
while ($res = $query_penghargaan->fetch_assoc()){
    $result[] = $res;
}

include '../views/penghargaan/v_detail.php';
