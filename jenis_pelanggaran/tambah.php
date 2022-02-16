<?php
include '../lib/library.php';
cekLogin();

if($_SESSION["nama_hak_akses"] === "guru" || $_SESSION["nama_hak_akses"] === "siswa"){
    header("location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_jenis_pelanggaran   = uniqid('jplgrn');
    $desc_pelanggaran       = @$_POST['desc_pelanggaran'];
    $poin_pelanggaran       = @$_POST['poin_pelanggaran'];
    $datetime               = date("Y-m-d H:i:s");
    $id_entity_penambah     = $_SESSION['id_entity'];


    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $desc_pelanggaran       = $mysqli->escape_string($desc_pelanggaran);
    $poin_pelanggaran       = $mysqli->escape_string($poin_pelanggaran);
    
    $sql_tambah_pelanggaran = "INSERT INTO jenis_pelanggaran VALUES(
        '$id_jenis_pelanggaran', '$id_entity_penambah', '$desc_pelanggaran', '$poin_pelanggaran', '$datetime', '$datetime'
    )";

    $query_tambah_pelanggaran = $mysqli->query($sql_tambah_pelanggaran) or die($mysqli->error);

    header("location:index.php");
}

include '../views/jenis_pelanggaran/v_tambah_edit.php';

?>