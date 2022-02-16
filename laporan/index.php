<?php

include '../lib/library.php';
cekLogin();

$semester = @$_GET["semester"] !== null ? @$_GET["semester"] : 'ganjil';
$tahun = @$_GET["tahun"] !== null ? @$_GET["tahun"] : date("Y");

// $bulan = @$_GET["bulan"] != null ? @$_GET["bulan"] : date("m");

// $tanggal_awal = date("Y"). $bulan. "01";
// $tanggal_akhir = date("Y"). $bulan. "31";

// $sql_kelas = "SELECT kelas.*, siswa.id, pelanggaran.tgl_pelanggaran, 
//             COUNT(siswa.id) as total_siswa, COUNT(pelanggaran.id_pelanggaran) as total_pelanggaran
//             FROM kelas 
//             LEFT JOIN siswa ON siswa.id_kelas = kelas.id_kelas 
//             LEFT JOIN pelanggaran ON pelanggaran.id_siswa = siswa.id
//             WHERE pelanggaran.tgl_pelanggaran BETWEEN '". $tanggal_awal ."' AND '". $tanggal_akhir ."'
//             GROUP BY kelas.id_kelas;";

// $query_kelas = $mysqli->query($sql_kelas) or die();

include '../views/laporan/v_index.php';

?>