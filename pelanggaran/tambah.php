<?php

include '../lib/library.php';
cekLogin();

include '../auth/authorization.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $tgl_pelanggaran = @$_POST['tgl_pelanggaran'];
    $id = @$_POST['id'];
    // $kategori_pelanggaran = @$_POST['kategori_pelanggaran'];
    $id_jenis_pelanggaran   = @$_POST['id_jenis_pelanggaran'];
    $poin_pelanggaran = @$_POST['poin_pelanggaran'];


    // Escape string untuk menghindari terjadinya teknik hacking SQL Injection
    $id_pelanggaran = uniqid("plgrn");
    $tgl_pelanggaran = $mysqli->escape_string($tgl_pelanggaran);
    $id = $mysqli->escape_string($id);
    $id_jenis_pelanggaran = $mysqli->escape_string($id_jenis_pelanggaran);
    // $kategori_pelanggaran = $mysqli->escape_string($kategori_pelanggaran);
    $poin_pengurangan = $poin_pelanggaran;
    $id_entity_penambah = $_SESSION["id_entity"];
    $datetime       = date('Y-m-d H:i:s');

    //Store data siswa ke dalam table siswa
    $sql_pelanggaran = "INSERT INTO pelanggaran VALUES(
        '$id_pelanggaran', '$id_jenis_pelanggaran', '$id', '$id_entity_penambah', '$poin_pengurangan',
        '$tgl_pelanggaran', '$datetime', '$datetime'
    )";

    $query_pelanggaran = $mysqli->query($sql_pelanggaran) or die($mysqli->error);

    $sql_current_poin = "SELECT poin FROM siswa WHERE id = '". $id. "'";
    $query_current_poin = $mysqli->query($sql_current_poin) or die($mysqli->error);
    $current_poin = $query_current_poin->fetch_assoc();
    
    $poin_setelah_dikurang = $current_poin['poin'] - $poin_pengurangan;

    $sql_update_poin_siswa = "UPDATE siswa SET poin = ". $poin_setelah_dikurang ." WHERE id = '". $id ."';";

    $query_update_poin_siswa = $mysqli->query($sql_update_poin_siswa) or die($mysqli->error);

    header("location:index.php");
    
}

$sql_jenis_pelanggaran = "SELECT * FROM jenis_pelanggaran";
$data_jenis_pelanggaran = $mysqli->query($sql_jenis_pelanggaran) or die($mysqli->error);

$sql_siswa = "SELECT * FROM siswa";
$data_siswa = $mysqli->query($sql_siswa) or die($mysqli->error);


include '../views/pelanggaran/v_tambah_edit.php';

?>