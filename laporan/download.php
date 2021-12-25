<?php

include '../lib/library.php';
cekLogin();

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_pelanggaran.xls");

$id_kelas = @$_GET["id_kelas"];

$sql_kelas = "SELECT * FROM kelas WHERE id_kelas = '". $id_kelas. "'";
$query_kelas = $mysqli->query($sql_kelas) or die($mysqli->error);
$data_kelas = $query_kelas->fetch_assoc();

$sql_pelanggaran = "SELECT siswa.*, pelanggaran.id_pelanggaran, 
COUNT(pelanggaran.id_pelanggaran) as total_pelanggaran
FROM siswa
LEFT JOIN pelanggaran ON pelanggaran.id_siswa = siswa.id
WHERE siswa.id_kelas = '". $id_kelas ."' GROUP BY siswa.id ORDER BY siswa.id ASC;";

$query_pelanggaran = $mysqli->query($sql_pelanggaran) or die($mysqli->error);

include '../views/laporan/v_template_download.php';

?>