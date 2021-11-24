<?php

include '../lib/library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kelas = uniqid('kls');
    $tingkatan = @$_POST['tingkatan'];
    $nama_kelas = @$_POST['nama_kelas'];
    $awal_tahun_ajaran = @$_POST['awal_tahun_ajaran'];
    $akhir_tahun_ajaran = @$_POST['akhir_tahun_ajaran'];

    $sql = "INSERT INTO kelas (id_kelas, tingkatan, nama_kelas, awal_tahun_ajaran, akhir_tahun_ajaran) 
            VALUES ('$id_kelas', '$tingkatan', '$nama_kelas', '$awal_tahun_ajaran', '$akhir_tahun_ajaran')";

    $mysqli->query($sql) or die($mysqli->error);

    header("location:../index.php");
}

$sql = "SELECT * FROM kelas";
$dataKelas = $mysqli->query($sql) or die($mysqli->error);

include '../index.php';
