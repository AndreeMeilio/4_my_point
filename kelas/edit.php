<?php

include '../lib/library.php';

$id_kelas = @$_GET['id_kelas'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_kelas           = @$_POST['id_kelas'];
    $tingkatan          = @$_POST['tingkatan'];
    $nama_kelas         = @$_POST['nama_kelas'];
    $awal_tahun_ajaran  = @$_POST['awal_tahun_ajaran'];
    $akhir_tahun_ajaran = @$_POST['akhir_tahun_ajaran'];

    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $tingkatan = $mysqli->escape_string($tingkatan);
    $nama_kelas = $mysqli->escape_string($nama_kelas);
    $awal_tahun_ajaran = $mysqli->escape_string($awal_tahun_ajaran);
    $akhir_tahun_ajaran = $mysqli->escape_string($akhir_tahun_ajaran);

    $sql_update_kelas = "UPDATE kelas SET
        id_kelas           = '$id_kelas',
        tingkatan          = '$tingkatan',
        nama_kelas         = '$nama_kelas',
        awal_tahun_ajaran  = '$awal_tahun_ajaran',
        akhir_tahun_ajaran = '$akhir_tahun_ajaran'
        WHERE id_kelas  = '$id_kelas'
    ";

    $query_update_kelas = $mysqli->query($sql_update_kelas) or die($mysqli->error);

    header("location:index.php");
}
if (empty($id_kelas)) header('location: index.php');

$sql_kelas = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
$query_kelas = $mysqli->query($sql_kelas);
$kelas = $query_kelas->fetch_array();

if (empty($kelas)) header('location: index.php');

include '../views/kelas/v_tambah.php';
