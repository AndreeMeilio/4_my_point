<?php

include '../lib/library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kelas           = uniqid('kls');
    $tingkatan          = @$_POST['tingkatan'];
    $nama_kelas         = @$_POST['nama_kelas'];
    $awal_tahun_ajaran  = @$_POST['awal_tahun_ajaran'];
    $akhir_tahun_ajaran = @$_POST['akhir_tahun_ajaran'];

    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $tingkatan = $mysqli->escape_string($tingkatan);
    $nama_kelas = $mysqli->escape_string($nama_kelas);
    $awal_tahun_ajaran = $mysqli->escape_string($awal_tahun_ajaran);
    $akhir_tahun_ajaran = $mysqli->escape_string($akhir_tahun_ajaran);

    $sql = "INSERT INTO kelas (id_kelas, tingkatan, nama_kelas, awal_tahun_ajaran, akhir_tahun_ajaran) 
            VALUES ('$id_kelas', '$tingkatan', '$nama_kelas', '$awal_tahun_ajaran', '$akhir_tahun_ajaran')";

    $mysqli->query($sql) or die($mysqli->error);

    header("location:index.php");
}

include '../views/kelas/v_tambah_edit.php';
